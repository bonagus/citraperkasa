<?php include "header.php"; ?>       
        
        <!-- Hero Area Start -->
        <section class="hero-area bgc-black pt-200 rpt-120 rel z-2">
            <div class="container-fluid">
                <h1 class="hero-title" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">tour & Travel</h1>
                <div class="main-hero-image bgs-cover" style="background-image: url(assets/images/original/hero-head.jpeg);"></div>
            </div>
            <div class="container container-1400">
                <div class="search-filter-inner" data-aos="zoom-out-down" data-aos-duration="1500" data-aos-offset="50">
                    <div class="filter-item clearfix">
                        <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                        <span class="title">Destinations</span>
                        <select name="city" id="city">
                            <option value="value1">City or Region</option>
                            <option value="value2">City</option>
                            <option value="value2">Region</option>
                        </select>
                    </div>
                    <div class="filter-item clearfix">
                        <div class="icon"><i class="fal fa-flag"></i></div>
                        <span class="title">All Activity</span>
                        <select name="activity" id="activity">
                            <option value="value1">Choose Activity</option>
                            <option value="value2">Daily</option>
                            <option value="value2">Monthly</option>
                        </select>
                    </div>
                    <div class="filter-item clearfix">
                        <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                        <span class="title">Departure Date</span>
                        <select name="date" id="date">
                            <option value="value1">Date from</option>
                            <option value="value2">10</option>
                            <option value="value2">20</option>
                        </select>
                    </div>
                    <div class="filter-item clearfix">
                        <div class="icon"><i class="fal fa-users"></i></div>
                        <span class="title">Guests</span>
                        <select name="cuests" id="cuests">
                            <option value="value1">0</option>
                            <option value="value2">1</option>
                            <option value="value2">2</option>
                        </select>
                    </div>
                    <div class="search-button">
                        <button class="theme-btn">
                            <span data-hover="Search">Search</span>
                            <i class="far fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Area End -->
        
        <?php 
            $rr=mysqli_query($con,"SELECT * FROM static");
            $r = mysqli_fetch_row($rr);
            $stitle = $r[1];
            $stext=$r[2];
        ?>     

        <!-- Why Us start -->
        <section class="features-area-two pt-100 pb-45 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="features-two-content mb-25 z-2 rel" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title counter-text-wrap mb-50">
                                <h2><?php print $stitle?></h2>
                                <p><?php print $stext?></p>
                            </div>
                            <div class="features-wrap-two">
                                <div class="row">
                                    <?php
                                        $q="SELECT * FROM  why_us ORDER BY id";
                                        $r123 = mysqli_query($con,$q);
                                        while($ro = mysqli_fetch_array($r123))
                                        {

                                            $title="$ro[title]";
                                            //$detail="$ro[detail]";
                                            $detail = strlen($ro['detail']) > 15 ? substr($ro['detail'], 0, 15) . '...' : $ro['detail'];

                                        print "
                                        <div class='col-xxl-4 col-xl-5 col-md-6'>
                                            <div class='feature-item style-two'>
                                                <div class='content'>
                                                    <h5><a href='#'>$title</a></h5>
                                                    <p>$detail</p>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="features-image-two text-lg-end mb-55">
                            <img src="assets/images/original/legal-cp.jpg" alt="Features">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Us end -->

        <!-- Meet Team start -->
        <section class="about-us-area pt-70 pb-100 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-us-page">
                            <img src="assets/images/original/team-cp.png" alt="About">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-25">
                                <h2>CITRA PERKASA</h2>
                            </div>
                            <a href="#" class="theme-btn mt-10 style-two">
                                <span data-hover="Meet Our Team">Meet Our Team</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            <div class="row pt-25">
                                <p>Dengan pengalaman yang lebih dari satu dekade, kami berkomitmen untuk memberikan pelayanan yang sempurna. Bersama tim Citra Perkasa yang profesional dan berpengalaman kami siap membantu merancang perjalanan wisata yang menyenangkan dan sesuai dengan kebutuhan anda. Tim Citra Perkasa hadir untuk menjadikan setiap perjalanan anda lebih mudah, menyenangkan dan berkesan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Meet Team end -->
        
        
        <!-- Total Client start -->
        <section class="about-feature-two bgc-black pt-100 pb-45 rel z-1">
            <div class="container">
                <div class="section-title text-center text-white counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <h2>Total Client</h2>
                    <p>Berpengalaman dalam melayani lebih dari <span class="count-text plus bgc-primary" data-speed="3000" data-stop="100">0</span> an klien</p>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="feature-item style-two">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text" data-speed="3000" data-stop="29">0</span>
                                <h6 class="counter-title">Instansi</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="feature-item style-two">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text" data-speed="3000" data-stop="26">0</span>
                                <h6 class="counter-title">Sekolah & Universitas</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="feature-item style-two">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text" data-speed="3000" data-stop="51">0</span>
                                <h6 class="counter-title">Paguyuban</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="feature-item style-two">
                            <div class="counter-item counter-text-wrap">
                                <span class="count-text" data-speed="3000" data-stop="15">0</span>
                                <h6 class="counter-title">Lainnya</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <!-- <img src="assets/images/video/shape1.png" alt="shape"> -->
            </div>
        </section>
        <!-- Total Client end -->
         
         
        <!-- About Us Area start -->
        <section class="about-us-area py-100 rpb-90 rel z-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5">
                        <div class="about-us-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                            <div class="section-title mb-25">
                                <h2>Know More About Us</h2>
                            </div>
                            <p>Citra Perkasa menghadirkan berbagai destinasi wisata yang beragam dan atraktif, dirancang khusus untuk memenuhi kebutuhan dan keinginan setiap wisatawan. Dengan pilihan paket wisata yang lengkap, Citra Perkasa memastikan setiap perjalanan menjadi pengalaman yang unik dan menyenangkan.</p>
                            <p>Dengan tagline #solusiwisataceria, kami berkomitmen memberikan solusi terbaik dalam merancang perjalanan yang penuh keceriaan dan kenyamanan. kami percaya bahwa wisata bukan hanya sekedar perjalanan, tetapi juga momen berharga yang harus dirasakan dengan penuh sukacita. Oleh karena itu setiap destinasi yang kami tawarkan didesain untuk menciptakan pengalaman wisata yang ceria, menyenangkan dan tak terlupakan.</p>
                            <div class="row">
                                <a href="#" class="theme-btn mt-10 style-two">
                                    <span data-hover="Go Vacation With Us">Go Vacation With Us</span>
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="about-us-image">
                            <img src="assets/images/original/klien-cp.png" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area end -->
         

        <!-- Benefit Area start -->
        <section class="benefit-area mt-50 rel z-1">
            <div class="container">
                <div class="benefit-area-inner py-100">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-5">
                            <div class="benefit-image-part">
                                <div class="image-one" data-aos="fade-down" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                                    <img src="assets/images/original/logo-bg.png" alt="Benefit">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="benefit-content-part text-white rmb-55" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <div class="section-title counter-text-wrap mb-40">
                                    <h2>More Information For You</h2>
                                </div>
                                <p>Citra Perkasa menyediakan pelayanan yang komprehensif, tidak hanya fokus pada perjalanan wisata, tetapi juga menawarkan berbagai layanan seperti kunjungan dinas, studi lapangan, MICE (Meetings, Insentives, Conventions, dan Exhibition), serta sewa armada. Dengan pendekatan yang profesional untuk memenuhi kebutuhan perjalanan bisnis dan rekreasi pelanggan, kami juga menawarkan layanan kunjungan dinas yang dirancang untuk memenuhi kebutuhan perusahaan dan instansi dengan memastikan setiap detail perjalanan mulai dari akomodasi hingga transportasi. Kami juga menyediakan layanan sewa armada yang mencakup berbagai jenis kendaraan siap memenuhi kebutuhan transportasi, baik untuk kelompok kecil maupun kelompok besar. Dengan dedikasi untuk memberikan pelayanan yang berkualitas, menjadikan Citra Perkasa sebagai mitra terpercaya dalam setiap perjalanan anda.</p>
                                <a href="about.html" class="theme-btn style-two bgc-secondary mt-25">
                                    <span data-hover="Learn More Us">Learn More Us</span>
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Benefit Area end -->

        
        <!-- Client Logo Area start -->
        <div class="client-logo-area mb-100">
            <div class="container">
                <div class="client-logo-wrap pt-60 pb-55">
                    <div class="text-center mb-40" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                        <h6>We’re recommended by:</h6>
                    </div>
                    <div class="client-logo-active">
                        <div class="client-logo-item" data-aos="flip-up" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/original/lanud.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/original/HAKLI.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/original/STIMIK.png" alt="Client Logo"></a>
                        </div>
                        <div class="client-logo-item" data-aos="flip-up" data-aos-delay="150" data-aos-duration="1500" data-aos-offset="50">
                            <a href="#"><img src="assets/images/original/SMKN2.png" alt="Client Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client Logo Area end -->

      <?php include "footer.php"; ?>
