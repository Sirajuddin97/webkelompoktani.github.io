<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php"); 
      exit();
    }
    $active = "active";
 ?>
<!DOCTYPE html>
<html lang="en" class="loading">
  <head>
      <title>Admin - Dashboard</title>
      <?php include "head.php"; ?>
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
      <?php include "menu.php"; //  Daftar Menu ?> 
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!-- Minimal statistics section start -->
    <section id="minimal-statistics">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                <div class="card-header">
                    <div class="card-title-wrap bar-danger">
                        <h4 class="card-title" id="basic-layout-icons">Halo!</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card text-center">
          <div class="card-body">
            <div class="card-block">
              <h5 class="card-title">Selamat Datang</h5>
              <p class="card-text"><small class="text-muted">Silahkan Pilih Menu Untuk Managemen Data</small></p>
              <img src="app-assets/img/home.jpg" width="100%" style="max-width:1000px;">
            </div>
          </div>
        </div>
                </div>
            </div>
  </div>
  </div>
</section>
<!-- // Minimal statistics section end -->
<!-- Minimal statistics with bg color section start -->

  </div>
</section>
<!-- Card columns section end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    </div>
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="app-assets/vendors/js/core/popper.min.js"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="app-assets/vendors/js/prism.min.js"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="app-assets/vendors/js/screenfull.min.js"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="app-assets/js/app-sidebar.js"></script>
    <script src="app-assets/js/notification-sidebar.js"></script>
    <script src="app-assets/js/customizer.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>