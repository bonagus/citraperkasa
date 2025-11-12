<?php include"header.php";?>
<?php include"sidebar.php";?>

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
                        <li class="breadcrumb-item"><a href="location">Lokasi</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                Tambah Lokasi Wisata
                            </a>
                        </li>
                    </ul>
                </div>

                <?php
                    $status = "OK"; //initial status
                    $msg="";
                    if(ISSET($_POST['save'])){
                        $destination_id = mysqli_real_escape_string($con,$_POST['destination_id']);
                        $name = mysqli_real_escape_string($con,$_POST['name']);
                        $description = mysqli_real_escape_string($con,$_POST['description']);
                        $price = mysqli_real_escape_string($con,$_POST['price']);
                        if ( empty($destination_id) ){
                            $msg=$msg."Destination must be select<BR>";
                            $status= "NOTOK";
                        }
                        if ( strlen($name) < 5 ){
                            $msg=$msg."Location Title Must Be More Than 5 Char Length.<BR>";
                            $status= "NOTOK";
                        }
                        if($status=="OK"){
                            $qb=mysqli_query($con,"INSERT INTO `location` (`destination_id`, `name`, `description`, `price`) VALUES ('$destination_id', '$name', '$description', '$price')");
                            if($qb){
                                $errormsg= "<div class='alert alert-success alert-dismissible alert-outline fade show'>
                                            Location has been added successfully.
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>"; //printing error if found in validation
                            }
                        }
                        elseif ($status!=="OK") {
                            $errormsg= "<div class='alert alert-danger alert-dismissible alert-outline fade show'>".$msg." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>"; //printing error if found in validation
                        }
                        else{
                            $errormsg= "<div class='alert alert-danger alert-dismissible alert-outline fade show'>Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"; //printing error if found in validation
                        }
                    }
                ?>
                
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    print $errormsg;
                                }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label"> Location Name</label>
                                            <input type="text" class="form-control" id="firstnameInput" name="name" placeholder="Enter Location Name">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="destinationSelect" class="form-label">Destination</label>
                                            <select class="form-select" id="destinationSelect" name="destination_id" required>
                                            <option value="">-- Destinasi --</option>
                                            <?php
                                                $q = mysqli_query($con, "SELECT id, dest_title FROM destination ORDER BY dest_title ASC");
                                                while ($r = mysqli_fetch_assoc($q)) {
                                                echo "<option value='{$r['id']}'>" . htmlspecialchars($r['dest_title']) . "</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label"> Short Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="description" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label"> Estimation Price</label>
                                            <input type="number" class="form-control" id="firstnameInput" name="price" placeholder="Enter Estimation Price">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" name="save" class="btn btn-primary">Add Location</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include"footer.php";?>