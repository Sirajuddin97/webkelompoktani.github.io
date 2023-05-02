<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php");
      exit(); 
    }
    if ($_SESSION['username']=='admin') {
    }
    else
    {
      header("location:dashboard.php");
      exit(); 
    }
    $active9 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Petani - Tambah Admin</title>
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
            <div class="col-md-6">
                <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-danger">
                        <h4 class="card-title" id="basic-layout-icons">Tambah Admin</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="px-3">
                        <form class="form" action="config/simpan.php" method="post">
                          <input type="hidden" name="aksiadmin" value="aksiadmin">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="timesheetinput3">Username</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput3" class="form-control" name="username" required="">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="timesheetinput3">Password</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="password" id="timesheetinput3" class="form-control" name="password" required="">
                                        <div class="form-control-position">
                                            <i class="icon-key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="button" class="btn btn-danger mr-1">
                                    <i class="icon-close"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-teal">
                                    <i class="icon-plus"></i> Tambah
                                </button>
                            </div>
                        </form>

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
    <script src="app-assets/vendors/js/toastr.min.js"></script>
    <script src="app-assets/js/toastr.min.js"></script>
    <?php
          if($status=$_GET["status"]=="gagal") { ?>
              <script>
                  toastr.error('Gagal Menyimpan Data, Silahkan Coba Kembali', 'Terjadi Kesalahan!')
              </script>
    <?php } ?>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>