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
                                        <li><a href="index">Home</a></li>  
                                        <li><a href="destination">Destination</a></li>   
                                        <li><a href="service">Service</a></li>                               </li>
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
