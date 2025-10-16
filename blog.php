<?php include "header.php";?>
        
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(assets/images/banner/banner.jpg);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">Blog</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Blog List Area start -->
        <section class="blog-list-page py-100 rel z-1">
            <div class="container">
                <div class="row">
                    <?php $q = mysqli_query($con, "SELECT * FROM blog ORDER BY id DESC");
                        while ($row = mysqli_fetch_array($q)) { ?>
                        <div class="blog-item style-three" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <img src="assets/images/blog/blog-list1.jpg" alt="Blog List">
                            </div>
                            <div class="content">
                                <h5><a href="#"><?= htmlspecialchars($row['blog_title']) ?></a></h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a href="#"><?= htmlspecialchars($row['updated_at']) ?></a></li>
                                </ul>
                                <p><?= htmlspecialchars($row['blog_desc']) ?></p>
                                <a href="#" class="theme-btn style-two style-three">
                                    <span data-hover="Book Now">Read More</span>
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- Blog List Area end -->

<?php include "footer.php"; ?>