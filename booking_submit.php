<?php
require_once 'z_db.php'; // koneksi $con (mysqli)

function genBookingCode() {
    return 'CP' . date('ymd') . strtoupper(substr(bin2hex(random_bytes(3)), 0, 4));
}

// Pastikan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Ambil input
$destination_id = intval($_POST['destination_id'] ?? 0);
$location_id    = intval($_POST['location_id'] ?? 0);
$transport_id   = intval($_POST['transport_id'] ?? 0);
$hotel_id       = intval($_POST['hotel_id'] ?? 0);
$meal_id        = intval($_POST['meal_id'] ?? 0);
$travel_date    = $_POST['travel_date'] ?? '';
$pax            = max(1, intval($_POST['pax'] ?? 1));

// Validasi minimal
if (!$destination_id || !$location_id || !$travel_date) {
    die("Mohon isi semua data yang diperlukan.");
}

// Ambil harga dari tabel
function getPrice($con, $table, $id, $col = 'unit_price') {
    if (!$id) return 0;
    $q = mysqli_query($con, "SELECT $col FROM $table WHERE id=$id");
    $r = mysqli_fetch_assoc($q);
    return $r ? floatval($r[$col]) : 0;
}
$dest_price = getPrice($con, 'destination', $destination_id, 'price');  // bensin/perjalanan
$loc_price  = getPrice($con, 'location', $location_id, 'price');         // tiket masuk
$trans_price = getPrice($con, 'facility', $transport_id, 'unit_price');
$hotel_price = getPrice($con, 'facility', $hotel_id, 'unit_price');
$meal_price  = getPrice($con, 'facility', $meal_id, 'unit_price');

// Hitung total estimasi
// kendaraan hanya dihitung sekali, fasilitas lain per orang
$total = $dest_price + $loc_price + $trans_price + (($hotel_price + $meal_price) * $pax);

// Simpan ke tabel booking
$booking_code = genBookingCode();

$ins = $con->prepare("INSERT INTO booking 
(booking_code, name, phone, email, destination_id, location_id, travel_date, pax, transport, accommodation, meal, estimated_price, status) 
VALUES (?, 'Umum', '-', '-', ?, ?, ?, ?, ?, ?, ?, ?, 'new')");

$transport_name = getTitle($con, 'facility', $transport_id);
$hotel_name = getTitle($con, 'facility', $hotel_id);
$meal_name = getTitle($con, 'facility', $meal_id);

$ins->bind_param(
    "siiissssd",
    $booking_code,
    $destination_id,
    $location_id,
    $travel_date,
    $pax,
    $transport_name,
    $hotel_name,
    $meal_name,
    $total
);

if (!$ins->execute()) {
    die("Gagal menyimpan data: " . htmlspecialchars($ins->error));
}

// Ambil info untuk WA
$destination = getTitle($con, 'destination', $destination_id, 'dest_title');
$location = getTitle($con, 'location', $location_id);
$waAdmin = '6285747138766'; // ubah dengan nomor admin (format internasional tanpa +)

$msg = "Halo, saya ingin melakukan pemesanan wisata:\n"
     . "Kode: $booking_code\n"
     . "Destinasi: $destination\n"
     . "Lokasi: $location\n"
     . "Tanggal: $travel_date\n"
     . "Jumlah Peserta: $pax\n"
     . "Transportasi: $transport_name\n"
     . "Penginapan: $hotel_name\n"
     . "Konsumsi: $meal_name\n"
     . "Estimasi Total: Rp " . number_format($total, 0, ',', '.');

$waUrl = "https://wa.me/$waAdmin?text=" . urlencode($msg);

// Arahkan ke WhatsApp
header("Location: $waUrl");
exit;


// ---------- fungsi bantu ----------
function getTitle($con, $table, $id, $col = 'name') {
    if (!$id) return '';
    $q = mysqli_query($con, "SELECT $col FROM $table WHERE id=$id");
    $r = mysqli_fetch_assoc($q);
    return $r ? $r[$col] : '';
}
?>
