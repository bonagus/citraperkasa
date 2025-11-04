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
                                        $sc1 = "SELECT id, dest_title, dest_desc,updated_at FROM destination WHERE dest_title LIKE '$like' OR dest_desc LIKE '$like'";
                                        $q1 = mysqli_query($con, $sc1);
                                        if (mysqli_num_rows($q1)) {
                                            echo "<div class='widget widget-news' data-aos='fade-up' data-aos-duration='1500' data-aos-offset='50'>
                                                    <h5 class='widget-title'>Destinasi</h5>
                                                    <ul>";
                                            while ($r = mysqli_fetch_array($q1)) {
                                                $datetime = $r['updated_at'];
                                                $formatted = date("d M Y, H:i", strtotime($datetime));
                                                echo "<li>
                                                        <div class='image'>
                                                            <img src='assets/images/widgets/news1.jpg' alt='News'>
                                                        </div>
                                                        <div class='content'>
                                                            <h6><a href='destdetail.php?id={$r['id']}'>{$r['dest_title']}</a></h6>
                                                            <span class='date'><i class='far fa-calendar-alt'></i> {$formatted}</span>
                                                        </div>
                                                    </li>";
                                            }
                                            echo "</ul></div>";
                                        }

                                        // Cari di lokasi
                                        $sc2 = "SELECT id, destination_id, `name` FROM `location` WHERE `name` LIKE '$like' OR `description` LIKE '$like'";
                                        $q2 = mysqli_query($con, $sc2);
                                        if (mysqli_num_rows($q2)) {
                                            echo "<div class='widget widget-news' data-aos='fade-up' data-aos-duration='1500' data-aos-offset='50'>
                                                    <h5 class='widget-title'>Lokasi</h5>
                                                    <ul>";
                                            while ($r = mysqli_fetch_array($q2)) {
                                                echo "<li>
                                                        <div class='image'>
                                                            <img src='assets/images/widgets/news1.jpg' alt='News'>
                                                        </div>
                                                        <div class='content'>
                                                            <h6><a href='destdetail.php?id={$r['destination_id']}'>{$r['name']}</a></h6>
                                                        </div>
                                                    </li>";
                                            }
                                            echo "</ul></div>";
                                        }

                                        // Cari di blog (jika ada)
                                        $sc3 = "SELECT id, blog_title, blog_desc, blog_detail, updated_at FROM blog WHERE blog_title LIKE '$like' OR blog_desc LIKE '$like' OR blog_detail LIKE '$like'";
                                        $q3 = mysqli_query($con, $sc3);
                                        if (mysqli_num_rows($q3)) {
                                            echo "<div class='widget widget-news' data-aos='fade-up' data-aos-duration='1500' data-aos-offset='50'>
                                                    <h5 class='widget-title'>Blog</h5>
                                                    <ul>";
                                            while ($r = mysqli_fetch_array($q3)) {
                                                $datetimeb = $r['updated_at'];
                                                $formattedb = date("d M Y, H:i", strtotime($datetimeb));
                                                echo "<li>
                                                        <div class='image'>
                                                            <img src='assets/images/widgets/news1.jpg' alt='News'>
                                                        </div>
                                                        <div class='content'>
                                                            <h6><a href='blogdetail.php?id={$r['id']}'>{$r['blog_title']}</a></h6>
                                                            <span class='date'><i class='far fa-calendar-alt'></i> {$formattedb}</span>
                                                        </div>
                                                    </li>";
                                            }
                                            echo "</ul></div>";
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
