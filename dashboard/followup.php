<?php
require_once 'z_db.php'; // pastikan variabel $con sudah terkoneksi

// Pastikan ada parameter id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID booking tidak valid.");
}

$id = intval($_GET['id']);

// Ambil data booking
$q = mysqli_query($con, "
    SELECT b.*, d.dest_title 
    FROM booking b 
    LEFT JOIN destination d ON b.destination_id = d.id
    WHERE b.id = $id
");

if (!$q || mysqli_num_rows($q) == 0) {
    die("Data booking tidak ditemukan.");
}

$booking = mysqli_fetch_assoc($q);

// Ambil data penting
$booking_code = $booking['booking_code'];
$name         = $booking['name'];
$phone        = $booking['phone'];
$destination  = $booking['dest_title'];
$travel_date  = $booking['travel_date'];
$pax          = $booking['pax'];
$transport    = $booking['transport'];
$hotel        = $booking['accommodation'];
$meal         = $booking['meal'];
$note         = $booking['note'];
$total        = $booking['estimated_price'];

// Ubah format nomor telepon ke +62
function normalizePhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone); // hanya angka
    if (substr($phone, 0, 1) === '0') {
        $phone = '62' . substr($phone, 1);
    } elseif (substr($phone, 0, 2) !== '62') {
        $phone = '62' . $phone;
    }
    return $phone;
}

$waNumber = normalizePhone($phone);

// Format tanggal
$formatted_date = date('d F Y', strtotime($travel_date));

// Susun pesan WhatsApp
$msg = "Halo *$name*,\n\n"
     . "Terima kasih telah melakukan pemesanan wisata di Citra Perkasa Tour & Travel. Berikut detail pemesanan Anda:\n\n"
     . "✅ *Kode Booking:* $booking_code\n"
     . "✅ *Destinasi:* $destination\n"
     . "✅ *Tanggal:* $formatted_date\n"
     . "✅ *Jumlah Peserta:* $pax orang\n"
     . "✅ *Transportasi:* $transport\n"
     . "✅ *Penginapan:* $hotel\n"
     . "✅ *Konsumsi:* $meal\n"
     . "✅ *Catatan:* $note\n"
     . "✅ *Total Harga:* Rp " . number_format($total, 0, ',', '.') . "\n\n"
     . "Kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.\n"
     . "_Terima kasih telah mempercayakan perjalanan Anda kepada kami._ 😊";

// Redirect ke WhatsApp
$waUrl = "https://wa.me/$waNumber?text=" . urlencode($msg);
header("Location: $waUrl");
exit;
?>
