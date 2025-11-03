<?php
$msg = $_GET['msg'] ?? 'Terjadi kesalahan.';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="2;url=destination.php">
<script>
window.onload = function() {
    alert("<?= htmlspecialchars($msg) ?>");
    window.location.href = "destination.php";
};
</script>
</head>
<body>
<p>Mengalihkan kembali ke halaman pemesanan...</p>
</body>
</html>
