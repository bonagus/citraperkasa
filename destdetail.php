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

                        <h3>Transportasi yang digunakan</h3>
                        <div class="accordion-one mt-25 mb-60" id="faq-accordion">
                            <?php
                            $sform = "SELECT * FROM facility WHERE category_id = 1";
                            $tform = mysqli_query($con, $sform);
                            while ($rowt = mysqli_fetch_assoc($tform)):
                                // buat id unik
                                $collapse_id = 'collapse-' . $rowt['id'];
                            ?>
                                <div class="accordion-item">
                                <h5 class="accordion-header" id="heading-<?= $rowt['id'] ?>">
                                    <button class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#<?= $collapse_id ?>"
                                            aria-expanded="false"
                                            aria-controls="<?= $collapse_id ?>">
                                    <?= htmlspecialchars($rowt['name']) ?>
                                    </button>
                                </h5>
                                <div id="<?= $collapse_id ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="heading-<?= $rowt['id'] ?>"
                                    data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                    <p><?= nl2br(htmlspecialchars($rowt['description'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>

                        <h3>Hotel</h3>
                        <div class="accordion-one mt-25 mb-60" id="faq-accordion">
                            <?php
                            $uform="SELECT * FROM facility WHERE category_id=2";
                            $vform = mysqli_query($con,$uform);
                            while ($rowp = mysqli_fetch_array($vform)): 
                                // buat id unik
                                $collapse_idp = 'collapse-' . $rowp['id'];
                            ?>
                                <div class="accordion-item">
                                <h5 class="accordion-header" id="heading-<?= $rowp['id'] ?>">
                                    <button class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#<?= $collapse_idp ?>"
                                            aria-expanded="false"
                                            aria-controls="<?= $collapse_idp ?>">
                                    <?= htmlspecialchars($rowp['name']) ?>
                                    </button>
                                </h5>
                                <div id="<?= $collapse_idp ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="heading-<?= $rowp['id'] ?>"
                                    data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                    <p><?= nl2br(htmlspecialchars($rowp['description'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>

                        <h3>Konsumsi</h3>
                        <div class="accordion-one mt-25 mb-60" id="faq-accordion">
                            <?php
                            $wform="SELECT * FROM facility WHERE category_id=3";
                            $xform = mysqli_query($con,$wform);
                            while ($rowx = mysqli_fetch_array($xform)): 
                                // buat id unik
                                $collapse_idx = 'collapse-' . $rowx['id'];
                            ?>
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="heading-<?= $rowx['id'] ?>">
                                    <button class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#<?= $collapse_idx ?>"
                                            aria-expanded="false"
                                            aria-controls="<?= $collapse_idx ?>">
                                    <?= htmlspecialchars($rowx['name']) ?>
                                    </button>
                                </h5>
                                <div id="<?= $collapse_idx ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="heading-<?= $rowx['id'] ?>"
                                    data-bs-parent="#faq-accordion">
                                    <div class="accordion-body">
                                    <p><?= nl2br(htmlspecialchars($rowx['description'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>

                        <h3>Fasilitas dan pelayanan yang didapatkan</h3>
                        <div class="accordion-two mt-25 mb-60" id="faq-accordion-two">
                            <?php
                            $yform="SELECT * FROM facility WHERE category_id=4";
                            $zform = mysqli_query($con,$yform);
                            while ($rowz = mysqli_fetch_array($zform)): 
                                // buat id unik
                                $collapse_idz = 'collapse-' . $rowz['id'];
                            ?>
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="heading-<?= $rowz['id'] ?>">
                                    <button class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#<?= $collapse_idz ?>"
                                            aria-expanded="false"
                                            aria-controls="<?= $collapse_idz ?>">
                                    <?= htmlspecialchars($rowz['name']) ?>
                                    </button>
                                </h5>
                                <div id="<?= $collapse_idz ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="heading-<?= $rowz['id'] ?>"
                                    data-bs-parent="#faq-accordion-two">
                                    <div class="accordion-body">
                                    <p><?= nl2br(htmlspecialchars($rowz['description'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                        
                        <div class="tour-details-content">
                            <h3>Harga yang ditawarkan</h3>
                            <p><?php print $dest_detail;?></p>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-10 rmt-75">
                        <div class="blog-sidebar tour-sidebar">
                           
                            <div class="widget widget-booking" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                <h5 class="widget-title">Booking Tour <?php print $dest_title;?></h5>
                                <form method="post" action="booking_submit.php">
                                    <input type="hidden" name="destination_id" value="<?= $todo ?>">
                                    
                                    <div class="mb-25">
                                        <input type="text" name="name" required placeholder="Nama Pemesan">
                                    </div>
                                    <div class="mb-25">
                                        <input type="text" name="phone" required placeholder="No. Handphone">
                                    </div>
                                    <div class="mb-25">
                                        <input type="email" name="email" placeholder="Email (opsional)">
                                    </div>
                                    <div class="date mb-25">
                                        <b>Tanggal</b>
                                        <input type="date" name="travel_date" required>
                                    </div>
                                    <hr>
                                    <div class="mb-25">
                                        <b>Lokasi</b><br>
                                        <?php
                                            $loc = mysqli_query($con, "SELECT * FROM `location` WHERE destination_id=$todo");
                                            while($r = mysqli_fetch_assoc($loc)) {
                                            echo "<label><input type='checkbox' name='locations[]' value='{$r['id']}'> {$r['name']}</label><br>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-25">
                                        <b>Kendaraan</b>
                                        <select name="transport_id">
                                            <?php
                                            $f=mysqli_query($con,"SELECT * FROM facility WHERE category_id=1");
                                            while($x=mysqli_fetch_assoc($f)){
                                                echo "<option value='{$x['id']}'>{$x['name']}</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <hr class="mb-25">
                                    <div class="mb-25">
                                        <b>Penginapan</b>
                                        <select name="hotel_id">
                                            <?php
                                            $f=mysqli_query($con,"SELECT * FROM facility WHERE category_id=2");
                                            while($x=mysqli_fetch_assoc($f)){
                                                echo "<option value='{$x['id']}'>{$x['name']}</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <hr class="mb-25">
                                    <div class="mb-25">
                                        <b>Makanan</b>
                                        <select name="meal_id">
                                            <?php
                                            $f=mysqli_query($con,"SELECT * FROM facility WHERE category_id=3");
                                            while($x=mysqli_fetch_assoc($f)){
                                                echo "<option value='{$x['id']}'>{$x['name']}</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <hr class="mb-25">
                                    <div class="mb-25">
                                        <b>Peserta</b>
                                        <input type="number" name="pax" value="1" min="1">
                                    </div>
                                    <div class="mb-25">
                                        <b>Note</b>
                                        <textarea name="note"></textarea>
                                    </div>
                                    <button type="submit" class="theme-btn style-two w-100 mt-15 mb-5">
                                        <span data-hover="Book Now">Booking</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </button>
                                    <div class="text-center">
                                        <a href="contact">Butuh Bantuan?</a>
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