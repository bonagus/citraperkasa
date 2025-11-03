<?php
    include "header.php";
    $todo= mysqli_real_escape_string($con,$_GET["id"]);
    $rt=mysqli_query($con,"SELECT * FROM destination where id='$todo'");
    $tr = mysqli_fetch_array($rt);
    $dest_title = "$tr[dest_title]";
    $dest_detail = "$tr[dest_detail]";
    $ufile = "$tr[ufile]";
?>

        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(dashboard/uploads/destination/<?php print $ufile;?>);">
            <div class="container">
                <div class="banner-inner text-white">
                    <h2 class="page-title mb-10" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50"><?php print $dest_title?></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-20" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><?php print $dest_title?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Page Banner End -->

        <!-- Tour Details Area start -->
        <section class="tour-details-page pb-100">
            <div class="container">
                <hr class="mt-50 mb-70">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="tour-details-content">
                            <h3>Fasilitas dan pelayanan yang didapatkan</h3>
                            <p><?php print $dest_detail;?></p>
                        </div>
                        
                        <h3>Obyek Wisata Liburan</h3>
                        <div class="tour-activities mt-30 mb-45">
                            <?php
                            $loc = "SELECT * FROM `location` WHERE destination_id = $todo";
                            $qloc = mysqli_query($con, $loc);
                            while ($lrow = mysqli_fetch_array($qloc)) {
                                echo "<div class='tour-activity-item'>
                                        <i class='flaticon-travel-agency'></i>
                                        <b>{$lrow['name']}</b>
                                    </div>";
                            }
                            ?>
                        </div>

                        <h3>Itinerary</h3>
                        <div class="accordion-two mt-25 mb-60" id="faq-accordion-two">
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoOne">
                                       Day 1 - Arrive at campground
                                    </button>
                                </h5>
                                <div id="collapseTwoOne" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwoTwo">
                                        Day 2 - Wake up early and embark on a day hike
                                    </button>
                                </h5>
                                <div id="collapseTwoTwo" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion-two">
                                    <div class="accordion-body">
                                        <p>The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoThree">
                                        Day 3 - Join a guided ranger-led nature walk
                                    </button>
                                </h5>
                                <div id="collapseTwoThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoFour">
                                        Day 4 - Take a break from hiking
                                    </button>
                                </h5>
                                <div id="collapseTwoFour" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoFive">
                                        Day 5 - Pack a lunch and embark on a longer hike
                                    </button>
                                </h5>
                                <div id="collapseTwoFive" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Frequently Asked Questions</h3>
                        <div class="accordion-one mt-25 mb-60" id="faq-accordion">
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                       01_How do I book a tour or travel package?
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        02_What is included in the travel package?
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        03_What is your cancellation and refund policy?
                                    </button>
                                </h5>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                        04_Can I customize my tour or travel package?
                                    </button>
                                </h5>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                        05_What documents do I need to travel?
                                    </button>
                                </h5>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                        <p>To take a trivial example which undertakes laborious physical exercise except to obtain some advantage pleasure annoying consequences</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Maps</h3>
                        <div class="tour-map mt-30 mb-50">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d96777.16150026117!2d-74.00840582560909!3d40.71171357405996!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1706508986625!5m2!1sen!2sbd" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                        <div class="blog-sidebar tour-sidebar">
                           
                            <div class="widget widget-booking" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Tour Booking</h5>
                                <form action="#">
                                    <div class="date mb-25">
                                        <b>From Date</b>
                                        <input type="date">
                                    </div>
                                    <hr>
                                    <div class="time py-5">
                                        <b>Time :</b>
                                        <ul class="radio-filter">
                                            <li>
                                                <input class="form-check-input" checked type="radio" name="time" id="time1">
                                                <label for="time1">12:00</label>
                                            </li>
                                            <li>
                                                <input class="form-check-input" type="radio" name="time" id="time2">
                                                <label for="time2">08:00</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr class="mb-25">
                                    <h6>Tickets:</h6>
                                    <ul class="tickets clearfix">
                                        <li>
                                            Adult (18- years) <span class="price">$28.50</span>
                                            <select name="18-" id="18-">
                                                <option value="value1">01</option>
                                                <option value="value1">02</option>
                                                <option value="value1" selected>03</option>
                                            </select>
                                        </li>
                                        <li>
                                            Adult (18+ years) <span class="price">$50.40</span>
                                            <select name="18+" id="18+">
                                                <option value="value1">01</option>
                                                <option value="value1">02</option>
                                                <option value="value1">03</option>
                                            </select>
                                        </li>
                                    </ul>
                                    <hr class="mb-25">
                                    <h6>Add Extra:</h6>
                                    <ul class="radio-filter pt-5">
                                        <li>
                                            <input class="form-check-input" checked type="radio" name="AddExtra" id="add-extra1">
                                            <label for="add-extra1">Add service per booking <span>$50</span></label>
                                        </li>
                                        <li>
                                            <input class="form-check-input" type="radio" name="AddExtra" id="add-extra2">
                                            <label for="add-extra2">Add service per personal <span>$24</span></label>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h6>Total: <span class="price">$74</span></h6>
                                    <button type="submit" class="theme-btn style-two w-100 mt-15 mb-5">
                                        <span data-hover="Book Now">Book Now</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </button>
                                    <div class="text-center">
                                        <a href="contact.html">Need some help?</a>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tour Details Area end -->

<?php include "footer.php"; ?>