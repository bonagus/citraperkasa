<?php
    require 'z_db.php';
    $keyword = trim($_GET['q'] ?? ''); 
    include "header.php";
?>
        <!-- Search Area start -->
        <section class="faq-page-area pt-70 pb-85 rel z-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <br><br><h2>Hasil Pencarian: <?= htmlspecialchars($keyword) ?></h2>
                            <?php if ($keyword == '') {
                                        echo "<p>Silakan masukkan kata kunci di kolom pencarian.</p>";
                                    } else {
                                        $like = "%".mysqli_real_escape_string($con, $keyword)."%";

                                        // Cari di destinasi
                                        $sc1 = "SELECT id, dest_title, dest_desc FROM destination WHERE dest_title LIKE '$like' OR dest_desc LIKE '$like'";
                                        $q1 = mysqli_query($con, $sc1);
                                        if (mysqli_num_rows($q1)) {
                                            echo "<h3>Destinasi</h3><ul>";
                                            while ($r = mysqli_fetch_array($q1)) {
                                                echo "<li><a href='destination_detail.php?id={$r['id']}'>{$r['dest_title']}</a></li>";
                                            }
                                            echo "</ul>";
                                        }

                                        // Cari di lokasi
                                        $sc2 = "SELECT id, `name` FROM `location` WHERE `name` LIKE '$like' OR `description` LIKE '$like'";
                                        $q2 = mysqli_query($con, $sc2);
                                        if (mysqli_num_rows($q2)) {
                                            echo "<h3>Lokasi</h3><ul>";
                                            while ($r = mysqli_fetch_array($q2)) {
                                                echo "<li><a href='location_detail.php?id={$r['id']}'>{$r['name']}</a></li>";
                                            }
                                            echo "</ul>";
                                        }

                                        // Cari di blog (jika ada)
                                        $sc3 = "SELECT id, blog_title, blog_desc, blog_detail FROM blog WHERE blog_title LIKE '$like' OR blog_desc LIKE '$like' OR blog_detail LIKE '$like'";
                                        $q3 = mysqli_query($con, $sc3);
                                        if (mysqli_num_rows($q3)) {
                                            echo "<h3>Blog</h3><ul>";
                                            while ($r = mysqli_fetch_array($q3)) {
                                                echo "<li><a href='blog_detail.php?id={$r['id']}'>{$r['title']}</a></li>";
                                            }
                                            echo "</ul>";
                                        }
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Search Area end -->

<?php
    include "footer.php"; 
?>
