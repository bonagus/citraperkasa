<?php include "z_db.php";?>
<!doctype html>
<html class="no-js" lang="en">
<?php
    $rrs=mysqli_query($con,"SELECT * FROM section_title Where id=1");
    $rs = mysqli_fetch_array($rrs);
    $test_title = "$rs[test_title]";
    $test_text="$rs[test_text]";
    $enquiry_title="$rs[enquiry_title]";
    $enquiry_text="$rs[enquiry_text]";
    $enquiry_text="$rs[enquiry_text]";
    $contact_title="$rs[contact_title]";
    $contact_text="$rs[contact_text]";
    $dest_title="$rs[dest_title]";
    $dest_text="$rs[dest_text]";
    // $service_title="$rs[service_title]";
    // $service_text="$rs[service_text]";
    $why_title="$rs[why_title]";
    $why_text="$rs[why_text]";
    $about_title="$rs[about_title]";
    $about_text="$rs[about_text]";
?>



<?php
    $rt=mysqli_query($con,"SELECT * FROM sitecontact where id=1");
    $tr = mysqli_fetch_array($rt);
    $phone1 = "$tr[phone1]";
    $phone2 = "$tr[phone2]";
    $email1 = "$tr[email1]";
    $email2 = "$tr[email2]";
    $longitude = "$tr[longitude]";
    $latitude = "$tr[latitude]";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Description -->
    <meta name="description" content="">
    <meta name="author" content="Bonagus">
    <?php
        $rr=mysqli_query($con,"SELECT * FROM siteconfig where id=1");
        $r = mysqli_fetch_array($rr);
        $site_title = "$r[site_title]";
        $site_about = "$r[site_about]";
        $site_footer = "$r[site_footer]";
        $follow_text = "$r[follow_text]";
    ?>
    <!-- Title  -->
    <title>Citra Perkasa Tour - <?php print $site_title ?></title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"><div class="custom-loader"></div></div>

        <!-- main header -->
        <header class="main-header header-one white-menu menu-absolute">
            <!--Header-Upper-->
            <div class="header-upper py-30 rpy-0">
                <div class="container-fluid clearfix">
                    
                    <?php
                        $rt=mysqli_query($con,"SELECT ufile FROM logo where id=1");
                        $tr = mysqli_fetch_array($rt);
                        $ufile = "$tr[ufile]";
                    ?>

                    <div class="header-inner rel d-flex align-items-center">
                        <div class="logo-outer">
                            <div class="logo"><a href="index.html"><img src="dashboard/uploads/logo/<?php print $ufile?>" alt="Logo" title="Logo"></a></div>
                        </div>

                        <div class="nav-outer mx-lg-auto ps-xxl-5 clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                   <div class="mobile-logo">
                                       <a href="index.html">
                                            <img src="dashboard/uploads/logo/<?php print $ufile?>" alt="Logo" title="Logo">
                                       </a>
                                   </div>
                                   
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="home">Home</a></li>  
                                        <li><a href="destination">Destination</a></li>   
                                        <li><a href="services">Service</a></li>                               </li>
                                        <li class="dropdown"><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog List</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about">About Us</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        
                        <!-- Nav Search -->
                        <div class="nav-search">
                            <button class="far fa-search"></button>
                            <form action="#" class="hide">
                                <input type="text" placeholder="Search" class="searchbox" required="">
                                <button type="submit" class="searchbutton far fa-search"></button>
                            </form>
                        </div>
                        
                        <!-- Menu Button -->
                        <div class="menu-btns py-10">
                            <a href="contact" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Book Now">Contact</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            <!-- menu sidbar -->
                            <div class="menu-sidebar">
                                <button class="bg-transparent">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>


        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4><?php print $contact_title ?></h4>
                    <p class="d-none d-sm-block mt-4"><?php print $contact_text ?></p>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <?php
                        $status = "OK"; //initial status
                        $msg="";

                        if(ISSET($_POST['save'])) {
                            $name = mysqli_real_escape_string($con,$_POST['name']);
                            $email = mysqli_real_escape_string($con,$_POST['email']);
                            $phone = mysqli_real_escape_string($con,$_POST['phone']);
                            $message = mysqli_real_escape_string($con,$_POST['message']);

                            if ( strlen($name) < 5 ) {
                                $msg=$msg."Name Must Be More Than 5 Char Length.<BR>";
                                $status= "NOT-OK";
                            }
                            if ( strlen($email) < 9 ) {
                                $msg=$msg."Email Must Be More Than 10 Char Length.<BR>";
                                $status= "NOT-OK";
                            }
                            if ( strlen($message) < 10 ) {
                                $msg=$msg."Message Must Be More Than 10 Char Length.<BR>";
                                $status= "NOT-OK";
                            }
                            if ( strlen($phone) < 8 ) {
                                $msg=$msg."Phone Must Be More Than 8 Char Length.<BR>";
                                $status= "NOT-OK";
                            }
                            if($status=="OK") {
                                $recipient="awolu_faith@live.com";
                                $formcontent="NAME:$name \n EMAIL: $email  \n PHONE: $phone  \n MESSAGE: $message";
                                $subject = "New Enquiry from Vogue Website";
                                $mailheader = "From: noreply@vogue.com \r\n";
                                $result= mail($recipient, $subject, $formcontent);
                                
                                if($result) {
                                    $errormsg= "
                                        <div class='alert alert-success alert-dismissible alert-outline fade show'>
                                        Enquiry Sent Successfully. We shall get back to you ASAP. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>
                                        "; //printing error if found in validation

                                }
                            }
                            elseif ($status!=="OK") {
                                    $errormsg= "
                                    <div class='alert alert-danger alert-dismissible alert-outline fade show'> ".$msg." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>"; //printing error if found in validation
                                    //  
                            }
                            else {
                                    $errormsg= "
                                        <div class='alert alert-danger alert-dismissible alert-outline fade show'> Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>"; //printing error if found in validation
                            }
                        }
                    ?>
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            print $errormsg;
                        }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" value="" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn style-two">
                                <span data-hover="Submit now">Submit now</span>
                                <i class="fal fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <?php
                        $q="SELECT * FROM  social ORDER BY id DESC LIMIT 5";
                        $r123 = mysqli_query($con,$q);

                        while($ro = mysqli_fetch_array($r123))
                        {

                            $id="$ro[id]";
                            $fa="$ro[fa]";
                            $social_link="$ro[social_link]";

                        print "
                        <a href='$social_link'><i class='fab $fa'></i></a>
                        ";
                        }
                    ?>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->