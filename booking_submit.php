<?php
//echo '<pre>'; print_r($_POST); echo '</pre>'; exit;

require_once 'z_db.php'; // pastikan $con aktif (mysqli)

function genBookingCode() {
    return 'CP' . date('ymd') . strtoupper(substr(bin2hex(random_bytes(3)), 0, 4));
}

// --- Batasi akses
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Ambil input dasar
$name  = trim($_POST['name'] ?? 'Umum');
$phone = trim($_POST['phone'] ?? '-');
$email = trim($_POST['email'] ?? '-');

$destination_id = intval($_POST['destination_id'] ?? 0);

// Lokasi bisa array (dari destination_detail.php) atau single (dari destination.php)
if (isset($_POST['locations']) && is_array($_POST['locations'])) {
    // versi detail (checkbox)
    $location_ids = array_filter(array_map('intval', $_POST['locations']));
} else {
    // versi ringkas (dropdown tunggal)
    $lid = intval($_POST['location_id'] ?? 0);
    $location_ids = $lid > 0 ? [$lid] : [];
}

$transport_id = intval($_POST['transport_id'] ?? 0);
$hotel_id     = intval($_POST['hotel_id'] ?? 0);
$meal_id      = intval($_POST['meal_id'] ?? 0);
$travel_date  = $_POST['travel_date'] ?? '';
$pax          = max(1, intval($_POST['pax'] ?? 1));
$note         = trim($_POST['note'] ?? '');

//echo '<pre>'; print_r($location_ids); echo '</pre>'; exit;
// Validasi minimal
if (!$destination_id || empty($location_ids) || !$travel_date) {
        echo "<script>
        alert('Mohon isi semua data penting: destinasi, lokasi, dan tanggal.');
        window.location.href = 'destination.php';
    </script>";
    exit;
}

// ---------- fungsi bantu ----------
function getPrice($con, $table, $id, $col = 'unit_price') {
    if (!$id) return 0;
    $q = mysqli_query($con, "SELECT $col FROM `$table` WHERE id=$id");
    $r = mysqli_fetch_assoc($q);
    return $r ? floatval($r[$col]) : 0;
}

function getTitle($con, $table, $id, $col = 'name') {
    if (!$id) return '';
    $q = mysqli_query($con, "SELECT $col FROM `$table` WHERE id=$id");
    $r = mysqli_fetch_assoc($q);
    return $r ? $r[$col] : '';
}

// ---------- Ambil harga ----------
$dest_price  = getPrice($con, 'destination', $destination_id, 'price'); // biaya perjalanan
$trans_price = getPrice($con, 'facility', $transport_id, 'unit_price');
$hotel_price = getPrice($con, 'facility', $hotel_id, 'unit_price');
$meal_price  = getPrice($con, 'facility', $meal_id, 'unit_price');

// Total tiket lokasi (karena bisa lebih dari satu)
$loc_total = 0;
foreach ($location_ids as $lid) {
    $loc_total += getPrice($con, 'location', $lid, 'price');
}

// Hitung total: transport sekali, lainnya per orang
$total = $dest_price + $loc_total + $trans_price + (($hotel_price + $meal_price) * $pax);

// ---------- Simpan ke database ----------
$booking_code = genBookingCode();

$transport_name = getTitle($con, 'facility', $transport_id);
$hotel_name     = getTitle($con, 'facility', $hotel_id);
$meal_name      = getTitle($con, 'facility', $meal_id);

// gabungkan nama lokasi jadi satu string
$location_names = [];
foreach ($location_ids as $lid) {
    $location_names[] = getTitle($con, 'location', $lid);
}
$location_list = implode(', ', $location_names);

$stmt = $con->prepare("INSERT INTO booking 
(booking_code, name, phone, email, destination_id, location_id, travel_date, pax, transport, accommodation, meal, note, estimated_price, status, details)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'new', ?)");

$first_location = $location_ids[0] ?? 0;
$details_json = json_encode([
    'locations' => $location_names,
    'note' => $note
], JSON_UNESCAPED_UNICODE);

$stmt->bind_param(
    "ssssiisissssds",
    $booking_code,
    $name,
    $phone,
    $email,
    $destination_id,
    $first_location,
    $travel_date,
    $pax,
    $transport_name,
    $hotel_name,
    $meal_name,
    $note,
    $total,
    $details_json
);

if (!$stmt->execute()) {
    die("Gagal menyimpan data: " . htmlspecialchars($stmt->error));
}

// ---------- Redirect ke WhatsApp ----------
$destination = getTitle($con, 'destination', $destination_id, 'dest_title');
$waAdmin = '6285747138766'; // ubah ke nomor kamu

$msg = "Halo, saya ingin melakukan pemesanan wisata:\n"
     . "Kode Booking: $booking_code\n"
     . "Nama: $name\n"
     . "Telepon: $phone\n"
     . "Destinasi: $destination\n"
     . "Lokasi: $location_list\n"
     . "Tanggal: $travel_date\n"
     . "Jumlah Peserta: $pax\n"
     . "Transportasi: $transport_name\n"
     . "Penginapan: $hotel_name\n"
     . "Konsumsi: $meal_name\n"
     . "Catatan: $note\n"
     . "Estimasi Harga: Rp " . number_format($total, 0, ',', '.');

$waUrl = "https://wa.me/$waAdmin?text=" . urlencode($msg);
header("Location: $waUrl");
exit;
?>
