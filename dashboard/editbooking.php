<?php

    include"header.php";
    $todo=  mysqli_real_escape_string($con,$_GET['id']);
    include"sidebar.php";

    // ambil ID booking dari URL    $todo = intval($_GET['id'] ?? 0);
    // ambil data booking
    $qb = mysqli_query($con, "SELECT * FROM booking WHERE id='$todo'");
    $row = mysqli_fetch_assoc($qb);

    if (!$row) {
        die("<div class='alert alert-danger'>Data booking tidak ditemukan.</div>");
    }

    // inisialisasi variabel untuk menghindari undefined
    extract($row);

    // --- PROSES UPDATE ---
    $status = "OK";
    $msg = "";

?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
 <div class="page-content">
       <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Edit Booking</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                        <li class="breadcrumb-item active">Booking</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php
                        if (isset($_POST['save'])) {
                            $name            = mysqli_real_escape_string($con, $_POST['name']);
                            $phone           = mysqli_real_escape_string($con, $_POST['phone']);
                            $email           = mysqli_real_escape_string($con, $_POST['email']);
                            $travel_date     = mysqli_real_escape_string($con, $_POST['travel_date']);
                            $pax             = intval($_POST['pax']);
                            $transport       = mysqli_real_escape_string($con, $_POST['transport']);
                            $accommodation   = mysqli_real_escape_string($con, $_POST['accommodation']);
                            $meal            = mysqli_real_escape_string($con, $_POST['meal']);
                            $note            = mysqli_real_escape_string($con, $_POST['note']);
                            $estimated_price = floatval($_POST['estimated_price']);
                            $status_b        = mysqli_real_escape_string($con, $_POST['status']);

                            if ($status == "OK") {
                                $query = "UPDATE booking SET 
                                            name='$name',
                                            phone='$phone',
                                            email='$email',
                                            travel_date='$travel_date',
                                            pax='$pax',
                                            transport='$transport',
                                            accommodation='$accommodation',
                                            meal='$meal',
                                            note='$note',
                                            estimated_price='$estimated_price',
                                            status='$status_b'
                                        WHERE id='$todo'";

                                $update = mysqli_query($con, $query);

                                if ($update) {
                                    $errormsg = "<div class='alert alert-success alert-dismissible alert-outline fade show'>
                                        Booking updated successfully.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                    </div>";
                                    header( "refresh:2;url=oldbook" );
                                } else {
                                    $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                        Gagal memperbarui data: " . mysqli_error($con) . "
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                    </div>";
                                }
                            } else {
                                $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                                    $msg
                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                </div>";
                            }
                        }
                    ?>

                    <div class="row">
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#editBooking" role="tab" aria-selected="false">
                                                <i class="fas fa-edit"></i> Edit Booking
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="editBooking" role="tabpanel">
                                            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $errormsg; ?>

                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Pemesan</label>
                                                            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($name) ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nomor Telepon</label>
                                                            <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($phone) ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal Keberangkatan</label>
                                                            <input type="date" class="form-control" name="travel_date" value="<?= htmlspecialchars($travel_date) ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Jumlah Peserta</label>
                                                            <input type="number" class="form-control" name="pax" min="1" value="<?= htmlspecialchars($pax) ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Transportasi</label>
                                                            <select class="form-select" name="transport">
                                                                <option value="">-- Pilih Transportasi --</option>
                                                                <?php
                                                                $f = mysqli_query($con, "SELECT * FROM facility WHERE category_id=1");
                                                                while ($x = mysqli_fetch_assoc($f)) {
                                                                    $selected = ($x['name'] == $transport) ? 'selected' : '';
                                                                    echo "<option value='{$x['name']}' $selected>{$x['name']}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Akomodasi</label>
                                                            <select class="form-select" name="accommodation">
                                                                <option value="">-- Pilih Akomodasi --</option>
                                                                <?php
                                                                $f = mysqli_query($con, "SELECT * FROM facility WHERE category_id=2");
                                                                while ($x = mysqli_fetch_assoc($f)) {
                                                                    $selected = ($x['name'] == $accommodation) ? 'selected' : '';
                                                                    echo "<option value='{$x['name']}' $selected>{$x['name']}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label class="form-label">Konsumsi</label>
                                                            <select class="form-select" name="meal">
                                                                <option value="">-- Pilih Paket Makanan --</option>
                                                                <?php
                                                                $f = mysqli_query($con, "SELECT * FROM facility WHERE category_id=3");
                                                                while ($x = mysqli_fetch_assoc($f)) {
                                                                    $selected = ($x['name'] == $meal) ? 'selected' : '';
                                                                    echo "<option value='{$x['name']}' $selected>{$x['name']}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Catatan / Note</label>
                                                            <textarea class="form-control" name="note" rows="2"><?= htmlspecialchars($note) ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Estimasi Harga</label>
                                                            <input type="number" step="0.01" class="form-control" name="estimated_price" value="<?= htmlspecialchars($estimated_price) ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select" name="status">
                                                                <?php
                                                                $statuses = ['new' => 'Baru', 'followup' => 'Menunggu', 'confirmed' => 'Dikonfirmasi', 'cancelled' => 'Dibatalkan'];
                                                                foreach ($statuses as $val => $label) {
                                                                    $sel = ($status == $val) ? 'selected' : '';
                                                                    echo "<option value='$val' $sel>$label</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" name="save" class="btn btn-primary">Update Booking</button>
                                                            <a href="dashboard" class="btn btn-soft-secondary">Kembali</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- end tab-pane -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

<?php include"footer.php";?>
