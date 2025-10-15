<?php
  require 'z_db.php';
  $id = intval($_GET['id']);
  $loc = "SELECT * FROM `location` WHERE destination_id = $id";
  $qloc = mysqli_query($con, $loc);

  echo "<option value=''>--Pilih Lokasi--</option>";
  while ($lrow = mysqli_fetch_array($qloc)) {
    echo "<option value='{$lrow['id']}'>{$lrow['name']}</option>";
  }
?>