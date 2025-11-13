<?php 
    include "header.php";
    $pageTitle = "Gallery";
    $headerImage = getHeaderImage($con, $pageTitle); 
?> 

        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(<?= $headerImage ?>);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Gallery</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Gallery Area start -->
        <section class="gallery-slider-area py-100 rel z-1">
            <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <h2>Photo Gallery</h2>
            </div>
            <div class="gallery-slider-active">
                <?php $q = mysqli_query($con, "SELECT * FROM gallery WHERE `type`='photo' ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($q)) { ?>
                    <div class="gallery-three-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="image">
                            <img src="dashboard/uploads/gallery/<?= htmlspecialchars($row['ufile']) ?>" alt="Gallery"  height="250">
                        </div>
                        <div class="content">
                            <h5><?= htmlspecialchars($row['title']) ?></h5>
                            <span class="category"><?= htmlspecialchars($row['desc']) ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <!-- Gallery Area end -->
         
        <!-- Features Area start -->
        <section class="about-feature-two bgc-black pt-100 pb-45 rel z-1">
            <div class="container">
                <div class="section-title text-center text-white counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Video Gallery</h2>
                </div>
                <div class="row">
                    <div class="gallery-slider-active">
                        <?php $qv = mysqli_query($con, "SELECT * FROM gallery WHERE `type`='video' ORDER BY id DESC");
                            while ($rowv = mysqli_fetch_array($qv)) { ?>
                                <div class="video-wrap" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                                    <img src="assets/images/video/video-bg.jpg" alt="Video">
                                    <a href="<?= htmlspecialchars($rowv['ufile']) ?>" class="mfp-iframe video-play" tabindex="-1"><i class="fas fa-play"></i> <?= htmlspecialchars($rowv['title']) ?></a>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="assets/images/video/shape1.png" alt="shape">
            </div>
        </section>
        <!-- Features Area end -->
        
        
        <!-- Client Logo Area start -->
        <div class="client-logo-area mb-100">
            <div class="container">
                <div class="client-logo-wrap pt-60 pb-55">
                    <div class="text-center mb-40" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                        <h6>We’re recommended by:</h6>
                    </div>
                    <div class="client-logo-active">
                        <div class="client-logo-item" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/client-logos/client-logo1.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/client-logos/client-logo2.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/client-logos/client-logo3.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/client-logos/client-logo4.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/client-logos/client-logo5.png" alt="Client Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client Logo Area end -->

<?php include "footer.php"; ?>