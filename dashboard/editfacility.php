<?php
    include"header.php";
    $todo=  mysqli_real_escape_string($con,$_GET['id']);
    include"sidebar.php";
    //$todo = intval($_GET['id']);
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><a href="javascript:history.go(-1)"><i class="ri-arrow-left-line"></i> Kembali</a></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="facility">Layanan</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <!-- end page title -->
            <?php
                $q = mysqli_query($con, "SELECT * FROM facility WHERE id=$todo");
                if (mysqli_num_rows($q) == 0) die("Facility not found.");
                $data = mysqli_fetch_assoc($q);
            ?>

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                    <i class="fas fa-home"></i> Edit Layanan
                                </a>
                            </li>
                        </ul>
                    </div>

                    <?php
                        $status = "OK";
                        $msg = "";

                        if (isset($_POST['save'])) {
                            $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
                            $name = mysqli_real_escape_string($con, $_POST['name']);
                            $description = mysqli_real_escape_string($con, $_POST['description']);
                            $unit_price = mysqli_real_escape_string($con, $_POST['unit_price']);

                            if (strlen($name) < 3) {
                                $msg .= "Facility name must be at least 3 characters.<br>";
                                $status = "NOTOK";
                            }

                            if ($status == "OK") {
                                $qb = mysqli_query($con, "UPDATE facility SET category_id='$category_id', name='$name', description='$description', unit_price='$unit_price' WHERE id=$todo");
                                if ($qb) {
                                    $errormsg = "<div class='alert alert-success alert-dismissible fade show'>
                                        Facility updated successfully.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                        </div>";
                                    $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM facility WHERE id=$todo"));
                                }
                            } else {
                                $errormsg = "<div class='alert alert-danger alert-dismissible fade show'>
                                    $msg <button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
                            }
                        }
                    ?>
                    <div class="card-body p-4">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $errormsg; ?>
                        <form method="post">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category_id" required>
                                <option value="">-- Select Category --</option>
                                <?php
                                $qcat = mysqli_query($con, "SELECT * FROM facility_category ORDER BY name ASC");
                                while ($r = mysqli_fetch_assoc($qcat)) {
                                    $selected = ($r['id'] == $data['category_id']) ? 'selected' : '';
                                    echo "<option value='{$r['id']}' $selected>{$r['name']}</option>";
                                }
                                ?>
                            </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                            <label class="form-label">Facility Name</label>
                            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($data['name']) ?>">
                            </div>

                            <div class="col-lg-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="2"><?= htmlspecialchars($data['description']) ?></textarea>
                            </div>

                            <div class="col-lg-6 mb-3">
                            <label class="form-label">Unit Price</label>
                            <input type="number" step="0.01" class="form-control" name="unit_price" value="<?= $data['unit_price'] ?>">
                            </div>

                            <div class="col-lg-12 text-end">
                            <button type="submit" name="save" class="btn btn-primary">Update Facility</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
</div>
<!-- end main content-->
<?php include"footer.php";?>