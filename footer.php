<?php include "z_db.php";?>

  <!--====== Footer Area Start ======-->
  <footer class="main-footer bgs-cover overlay rel z-1 pb-25" style="background-image: url(assets/images/original/hero-head.jpeg);">
            <div class="container">
                <div class="footer-top pt-100 pb-30">
                    <div class="row justify-content-between">
                        <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="footer-widget footer-text">
                                <div class="footer-logo mb-25">
                                    <a href="index.html"><img src="dashboard/uploads/logo/logo-b.png" alt="Logo"></a>
                                </div>
                                <p><?php print $site_about?></p>
                                <div class="social-style-one mt-15">
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
                        </div>
                        <div class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1500" data-aos-offset="50">
                            <div class="footer-widget footer-contact">
                                <div class="footer-title">
                                    <h5>Get In Touch</h5>
                                </div>
                                <ul class="list-style-one">
                                    <li><i class="fal fa-map-marked-alt"></i> Perum. Griya Safira, Gemuruh, Kec. Bawang, Kab. Banjarnegara, Jawa Tengah (53471)</li>
                                    <li><i class="fal fa-envelope"></i> <a href="mailto:admin@citraperkasatour.com">admin@citraperkasatour.com</a></li>
                                    <li><i class="fal fa-clock"></i> Mon - Fri, 08am - 05pm</li>
                                    <li><i class="fal fa-phone-volume"></i> <a href="https://wa.me/6285747138766">(+62) 857-4713-8766</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-20 pb-5">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-5">
                            <div class="copyright-text text-center text-lg-start">
                                <p><?php print $site_footer ?></p>
                            </div>
                       </div>
                       <div class="col-lg-7 text-center text-lg-end">
                           <ul class="footer-bottom-nav">
                                <?php
                                    // $q="SELECT * FROM  service ORDER BY id DESC LIMIT 5";
                                    // $r123 = mysqli_query($con,$q);

                                    // while($ro = mysqli_fetch_array($r123))
                                    // {

                                    //     $id="$ro[id]";
                                    //     $service_title="$ro[service_title]";

                                    // print "
                                    //     <li><a href='servicedetail.php?id=$id'>$service_title</a></li>
                                    //     ";
                                    // }
                                ?>
                           </ul>
                       </div>
                    </div>
                    <!-- Scroll Top Button -->
                    <button class="scroll-top scroll-to-target" data-target="html"><img src="assets/images/icons/scroll-up.png" alt="Scroll  Up"></button>
                </div>
            </div>
        </footer>
        <!-- footer area end -->

    </div>
    <!--End pagewrapper-->
   
    
    <!-- Jquery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Appear Js -->
    <script src="assets/js/appear.min.js"></script>
    <!-- Slick -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Image Loader -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Skillbar -->
    <script src="assets/js/skill.bars.jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!--  AOS Animation -->
    <script src="assets/js/aos.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>

</body>
</html>