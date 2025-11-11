<?php 
    include "header.php";
    $togo= mysqli_real_escape_string($con,$_GET["id"]);
    $rt=mysqli_query($con,"SELECT * FROM blog where id='$togo'");
    $tr = mysqli_fetch_array($rt);
    $blog_title = "$tr[blog_title]";
    $blog_desc = "$tr[blog_desc]";
    $blog_detail = "$tr[blog_detail]";
    $ufile = "$tr[ufile]";
    $datetime = "$tr[updated_at]";
    $formatted = date("d M Y, H:i", strtotime($datetime));
?>

        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(assets/images/banner/banner.jpg);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50"><?php print $blog_title;?></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><?php print $blog_title;?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Blog Detaisl Area start -->
        <section class="blog-detaisl-page py-100 rel z-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="blog-details-content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image mt-40 mb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <img src="dashboard/uploads/blog/<?php print $ufile;?>" alt="Blog Details"  style="max-width:850px; max-height:470px; object-fit:cover; border-radius:6px;">
                            </div>
                            <ul class="blog-meta mb-30">
                                <li><i class="far fa-calendar-alt"></i> <a href="#"><?php print $formatted;?></a></li>
                            </ul>
                            <h5><?php print $blog_desc;?></h5>
                            <p><?php print $blog_detail;?></p>

                        <div class="tag-share mb-50">
                            <div class="item" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                                <h6>Share </h6>
                                <div class="social-style-one">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Detaisl Area end -->

<?php include "footer.php"; ?>