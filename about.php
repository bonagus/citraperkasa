<?php 
    include "header.php";
    $pageTitle = "About";
    $headerImage = getHeaderImage($con, $pageTitle); 
?>         
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(<?= $headerImage ?>);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- About Area start -->
        <section class="about-area-two py-100 rel z-1">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <span class="subtitle mb-35">About Citra Perkasa</span>
                    </div>
                    <div class="col-xl-9">
                        <div class="about-page-content" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="row">
                                <div class="col-lg-8 pe-lg-5 me-lg-5">
                                    <div class="section-title mb-25">
                                        <h2>Visi & Misi</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>Visi</h4>
                                </div>
                                <div class="col-md-10">
                                    <p>Menjadi perusahaan Tour, Travel, dan Transportasi pilihan dengan layanan yang ramah, sopan, ceria danberkesan positif bagi klien.</p>
                                </div>
                                <div class="col-md-2">
                                    <h4>Misi</h4>
                                </div>
                                <div class="col-md-10">
                                    <p>Membangun jaringan hubungan jangka panjang dengan klien kami, serta menyediakan pelayanan yang luarbiasa dibidang Pariwisata, MICE, dan Transportasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area end -->



        <!-- About Us Area start -->
        <section class="about-us-area pt-70 pb-100 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-25">
                                <h2><?php print $about_title?></h2>
                            </div>
                            <p><?php print $about_text;?>.</p>
                            <a href="destination" class="theme-btn mt-10 style-two">
                                <span data-hover="Explore Destinations">Explore Destinations</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-us-page">
                            <img src="assets/images/original/visimisi.png" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area end -->

<?php include "footer.php"; ?>
