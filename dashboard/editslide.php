<?php include"header.php";
    $todo=  mysqli_real_escape_string($con,$_GET['id']);
    include"sidebar.php";
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
                        <li class="breadcrumb-item"><a href="location">Slider</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>

            <?php
                $query="SELECT * FROM slider where id='$todo' ";
                $result = mysqli_query($con,$query);
                $i=0;
                while($row = mysqli_fetch_array($result))
                {
                    $id="$row[id]";
                    $slide_title="$row[slide_title]";
                    $slide_text="$row[slide_text]";
                    // $ufile="$row[ufile]";
                }
            ?>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="false">
                                <i class="fas fa-home"></i> Edit Slider
                            </a>
                        </li>
                    </ul>
                </div>

                <?php
                    $status = "OK"; //initial status
                    $msg="";
                    if(ISSET($_POST['save'])){
                        $slide_title = mysqli_real_escape_string($con,$_POST['slide_title']);
                        $slide_text = mysqli_real_escape_string($con,$_POST['slide_text']);
                        // $ufile = mysqli_real_escape_string($con,$_POST['ufile']);
                        /*
                            $uploads_dir = 'uploads';
                            $tmp_name = $_FILES["ufile"]["tmp_name"];
                            // basename() may prevent filesystem traversal attacks;
                            // further validation/sanitation of the filename may be appropriate
                            $name = basename($_FILES["ufile"]["name"]);
                            $random_digit=rand(0000,9999);
                            $new_file_name=$random_digit.$name;
                            move_uploaded_file($tmp_name, "$uploads_dir/$new_file_name");
                        */
                            
                        if($status=="OK"){
                            // $qb=mysqli_query($con,"update slider set slide_title='$slide_title', slide_text='$slide_text', ufile='$ufile' where id='$todo'");
                            $qb=mysqli_query($con,"update slider set slide_title='$slide_title', slide_text='$slide_text' where id='$todo'");
                            if($qb){
                                $errormsg= "<div class='alert alert-success alert-dismissible alert-outline fade show'> Slide Updated successfully. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"; //printing error if found in validation
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
                                            <label for="firstnameInput" class="form-label"> Slide Title</label>
                                            <input type="text" class="form-control" id="firstnameInput" name="slide_title" value="<?php print $slide_title ?>" placeholder="Enter Slide Title" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label"> Slide Text</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea5" name="slide_text" rows="2"><?php print $slide_text ?></textarea>
                                        </div>
                                    </div>

                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" name="save" class="btn btn-primary">Update Slide</button>

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