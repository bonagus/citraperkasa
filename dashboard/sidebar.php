<?php
    include"../z_db.php";
    $username=$_SESSION['username'];
?>
<div class="app-menu navbar-menu">
<!-- LOGO -->
<div class="navbar-brand-box">
<!-- Dark Logo-->
<?php
    $rr=mysqli_query($con,"SELECT ufile FROM logo");
    $r = mysqli_fetch_row($rr);
    $ufile = $r[0];
?>
    <a href="dashboardl" class="logo logo-dark">
      <span class="logo-sm">
        <img src="uploads/logo/<?php print $ufile?>" alt="" height="22">
      </span>
      <span class="logo-lg">
        <img src="uploads/logo/<?php print $ufile?>" alt="" height="30">
      </span>
    </a>
    <!-- Light Logo-->
    <a href="dashboard" class="logo logo-light">
      <span class="logo-sm">
        <img src="uploads/logo/<?php print $ufile?>" alt="" height="22">
      </span>
      <span class="logo-lg">
        <img src="uploads/logo/<?php print $ufile?>" alt="" height="30">
      </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
      <i class="ri-record-circle-line"></i>
    </button>
  </div>

  <div id="scrollbar">
    <div class="container-fluid">

      <div id="two-column-menu">
      </div>
      <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>

        <li class="nav-item">
            <a href="dashboard" class="nav-link" data-key="t-analytics">  <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards"> Dashboard </span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarMB" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-shopping-cart-line"></i> <span data-key="t-landing">Booking</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarMB" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="newbook" class="nav-link" data-key="t-one-page"> Booking Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="oldbook" class="nav-link" data-key="t-one-page"> Booking Proses </a>
                    </li>
                    <li class="nav-item">
                        <a href="booking" class="nav-link" data-key="t-nft-landing"> Booking Confirmed </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarPot" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-road-map-line"></i> <span data-key="t-landing">Destination</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarPot" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="createdestination" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="destination" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-map-pin-line"></i> <span data-key="t-landing">Location</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarLanding" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="createlocation" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="location" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarB" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Blog</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarB" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="createblog" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="blog" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarL" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-hand-heart-line"></i> <span data-key="t-landing">Layanan</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarL" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="createfacility" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="facility" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarSl" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-image-fill"></i> <span data-key="t-landing">Slider</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarSl" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="slider" class="nav-link" data-key="t-nft-landing"> Data Header </a>
                    </li>
                    <li class="nav-item">
                        <a href="static" class="nav-link" data-key="t-nft-landing"> Data Static </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarGl" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-image-line"></i> <span data-key="t-landing">Gallery</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarGl" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="creategallery" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="gallery" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarX" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-chrome-fill"></i> <span data-key="t-landing">Sosial Media</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarX" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="createsocial" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="social" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarT" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-message-line"></i> <span data-key="t-landing">Review</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarT" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="newtestimony" class="nav-link" data-key="t-one-page">Tambah Baru</a>
                    </li>
                    <li class="nav-item">
                        <a href="testimony" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarW" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-rocket-line"></i> <span data-key="t-landing"> Why Us</span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarW" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="addwhy" class="nav-link" data-key="t-one-page"> Tambah Baru </a>
                    </li>
                    <li class="nav-item">
                        <a href="why" class="nav-link" data-key="t-nft-landing"> Semua Data </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarK" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarLanding">
                <i class="ri-tools-fill"></i> <span data-key="t-landing"> Konfigurasi </span>
            </a>
            <div class="menu-dropdown collapse" id="sidebarK" style="">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="settings" class="nav-link" data-key="t-one-page"> Pengaturan </a>
                    </li>
                    <li class="nav-item">
                        <a href="sections" class="nav-link" data-key="t-nft-landing"> Judul Section </a>
                    </li>
                    <li class="nav-item">
                        <a href="logo" class="nav-link" data-key="t-nft-landing"> Logo </a>
                    </li>
                    <li class="nav-item">
                        <a href="contact" class="nav-link" data-key="t-nft-landing"> Kontak </a>
                    </li>
                </ul>
            </div>
        </li>
      </ul>
    </div>
    <!-- Sidebar -->
  </div>

  <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
