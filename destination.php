<?php 
    include "header.php";
    $pageTitle = "Destination";
    $headerImage = getHeaderImage($con, $pageTitle); 
?> 
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-50 pb-35 rel z-1 bgs-cover" style="background-image: url(<?= $headerImage ?>);">
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
            <form method="POST" action="booking_submit.php">
            <div class="search-filter-inner" data-aos="zoom-out-down" data-aos-duration="1500" data-aos-offset="50">
                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-map-marker-alt"></i></div>
                    <span class="title">Tujuan</span>
                    <select id="destination" name="destination_id" onchange="loadLocations(this.value)">
                        <option value="">--Pilih Daerah--</option>
                        <?php
                            $qform="SELECT * FROM  destination ORDER BY id DESC";
                            $rform = mysqli_query($con,$qform);
                            while($row = mysqli_fetch_array($rform)){
                                echo "<option value='{$row['id']}'>{$row['dest_title']}</option>";
                            }
                        ?>
                    </select>
                    <select id="location" name="location_id">
                        <option value="">--Pilih Daerah--</option>
                    </select>
                </div>

                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-flag"></i></div>
                    <span class="title">Fasilitas <br> (Transportasi, Akomodasi, Konsumsi)</span>
                    <select id="transport" name="transport_id">
                        <option value="">--Pilih Kendaraan--</option>
                        <?php
                            $sform="SELECT * FROM facility WHERE category_id=1";
                            $tform = mysqli_query($con,$sform);
                            while ($rowt = mysqli_fetch_array($tform)) {
                                echo "<option value='{$rowt['id']}'>{$rowt['name']}</option>";
                            }
                        ?>
                    </select>
                    <select id="hotel" name="hotel_id">
                        <option value="">--Pilih Penginapan--</option>
                        <?php
                            $uform="SELECT * FROM facility WHERE category_id=2";
                            $vform = mysqli_query($con,$uform);
                            while ($rowp = mysqli_fetch_array($vform)) {
                                echo "<option value='{$rowp['id']}'>{$rowp['name']}</option>";
                            }
                        ?>
                    </select>
                    <select id="meal" name="meal_id">
                        <option value="">--Pilih Makanan--</option>
                        <?php
                            $wform="SELECT * FROM facility WHERE category_id=3";
                            $xform = mysqli_query($con,$wform);
                            while ($rowk = mysqli_fetch_array($xform)) {
                                echo "<option value='{$rowk['id']}'>{$rowk['name']}</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-calendar-alt"></i></div>
                    <span class="title">Tanggal</span>
                    <input type="date" name="travel_date" required>
                </div>

                <div class="filter-item clearfix">
                    <div class="icon"><i class="fal fa-users"></i></div>
                    <span class="title">Jumlah Peserta</span>
                    <input type="number" name="pax" value="1" min="1">
                </div>

                <div class="search-button">
                    <button class="theme-btn" type="submit">
                        <span data-hover="Pesan">Pesan</span>
                        <i class="far fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            </form>
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


<script>
// function loadLocations(destId) {
//   fetch('ajax_location.php?id=' + destId)
//     .then(res => res.text())
//     .then(html => document.getElementById('location').innerHTML = html);
//     // console.log("Tes, " + res + "!");
// }
function loadLocations(destId) {
  fetch('ajax_location.php?id=' + destId)
    .then(res => res.text())
    .then(html => {
      const selectEl = document.querySelector('#location');
      if (!selectEl) {
        console.error('Elemen #location tidak ditemukan');
        return;
      }
      // Bersihkan event/plugin sebelum isi ulang
      selectEl.innerHTML = html;
      // Jika pakai plugin custom (Select2, NiceSelect, dsb.)
      if (typeof $ !== 'undefined' && $.fn.niceSelect) {
        $(selectEl).niceSelect('update');
      }
    })
    .catch(err => console.error('Gagal memuat lokasi:', err));
}
</script>
<?php include "footer.php"; ?>
