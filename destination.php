<?php include "header.php";?>

        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(assets/images/banner/banner.jpg);">
            <div class="container">
                <div class="banner-inner text-white mb-50">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Destination</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Destination</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
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
        <!-- Page Banner End -->
        
        
        <!-- Popular Destinations Area start -->
        <section class="popular-destinations-area pt-100 pb-90 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center counter-text-wrap mb-40" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <h2>Explore Popular Destinations</h2>
                            <p>Di bawah ada Trip informasi paket lengkap yang sudah tersedia, apabila menginginkan trip yang belum tersedia silahkan hubungi kami</p>
                            <ul class="destinations-nav mt-30">
                                <li data-filter="*" class="active">Show All</li>
                                <li data-filter=".promo">Promo</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row gap-10 destinations-active justify-content-center">
                        <?php
                            $q="SELECT * FROM  destination ORDER BY id DESC";


                            $r123 = mysqli_query($con,$q);

                            while($ro = mysqli_fetch_array($r123))
                            {

                                $id="$ro[id]";
                                $dest_title="$ro[dest_title]";
                                $dest_desc="$ro[dest_desc]";
                                $ufile="$ro[ufile]";

                                print "
                                    <div class='col-md-6 item city features'>
                                        <div class='destination-item style-two' data-aos='flip-up' data-aos-duration='1500' data-aos-offset='50'>
                                            <div class='image'>
                                                <a href='destdetail.php?id=$id' class='heart'><i class='fas fa-heart'></i></a>
                                                <img src='dashboard/uploads/destination/$ufile' alt='Destination'>
                                            </div>
                                            <div class='content'>
                                                <h6><a href='destdetail.php?id=$id'>$dest_title</a></h6>
                                                <span class='time'>$dest_desc.</span>
                                                <a href='destdetail.php?id=$id' class='more'><i class='fas fa-chevron-right'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Destinations Area end -->



<?php include "footer.php"; ?>
