<?php
require 'z_db.php';
$code = strtoupper(trim($_POST['booking_code'] ?? ''));
$booking = null;

if ($code != '') {
    $q = $con->prepare("SELECT b.*, d.dest_title, l.name AS location_name 
                        FROM booking b 
                        LEFT JOIN destination d ON d.id=b.destination_id
                        LEFT JOIN location l ON l.id=b.location_id
                        WHERE b.booking_code = ?");
    $q->bind_param("s", $code);
    $q->execute();
    $result = $q->get_result();
    $booking = $result->fetch_assoc();
}

include "header.php";
?>

    <!-- 404 Error Area start -->
        <section class="error-area pt-70 pb-100 rel z-1">
            <div class="container">
                <br><br>
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-6">
                        <?php if ($code != ''): ?>
                            <?php if (!$booking): ?>
                                <div class="error-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                    <h1>OPPS! </h1>
                                    <div class="section-title mt-15 mb-25">
                                        <h2>Kode booking Tidak Ditemukan</h2>
                                    </div>
                                    <p style="color:red;">Silakan periksa kembali Kemudian Masukkan Lagi Kode Booking Anda:</p>
                                    <form class="newsletter-form mt-40 mb-50" method="post">
                                        <input name="booking_code" type="text" placeholder="Contoh: CP241013AB12" value="<?= htmlspecialchars($code) ?>">
                                        <button type="submit" class="theme-btn bgc-secondary style-two">
                                            <span data-hover="Cek">Cek</span>
                                            <i class="fal fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <h3>Detail Pemesanan: <?= htmlspecialchars($booking['booking_code']) ?></h3>
                                <div class="accordion-two mt-25 mb-60" id="faq-accordion-two">
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoThree">
                                                Tanggal
                                            </button>
                                        </h5>
                                        <div id="collapseTwoThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                            <div class="accordion-body">
                                                <p><?= htmlspecialchars($booking['travel_date']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoOne">
                                            Destinasi & Lokasi
                                            </button>
                                        </h5>
                                        <div id="collapseTwoOne" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion-two">
                                            <div class="accordion-body">
                                                <p>Destinasi: <?= htmlspecialchars($booking['dest_title']) ?></p>
                                                <p>Lokasi: <?= htmlspecialchars($booking['location_name']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwoTwo">
                                                Fasilitas
                                            </button>
                                        </h5>
                                        <div id="collapseTwoTwo" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                            <div class="accordion-body">
                                                <p>Kendaraan: <?= htmlspecialchars($booking['transport']) ?></p>
                                                <p>Penginapan: <?= htmlspecialchars($booking['accommodation']) ?></p>
                                                <p>Makanan: <?= htmlspecialchars($booking['meal']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoFour">
                                                Peserta & Estimasi Harga
                                            </button>
                                        </h5>
                                        <div id="collapseTwoFour" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                            <div class="accordion-body">
                                                <p><?= htmlspecialchars($booking['pax']) ?> Orang</p>
                                                <p>Rp. <?= htmlspecialchars($booking['estimated_price']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwoFive">
                                                Status
                                            </button>
                                        </h5>
                                        <div id="collapseTwoFive" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                            <div class="accordion-body">
                                                <p><?= htmlspecialchars($booking['status']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="error-images" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <img src="assets/images/newsletter/404.png" alt="404 Error">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 404 Error Area end -->

<?php include "footer.php";?>