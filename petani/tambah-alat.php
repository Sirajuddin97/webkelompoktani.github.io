<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php");
      exit(); 
    }
    $active5 = "active";
 ?>
<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Petani - Tambah Data Kondisi Alat Pertanian</title>
  <?php include "head.php"; ?>
</head>

<body data-col="2-columns" class=" 2-columns ">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php include "menu.php"; //  Daftar Menu ?>
  <div class="main-panel">
    <div class="main-content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Minimal statistics section start -->
          <section id="minimal-statistics">
            <div class="row d-flex align-items-center justify-content-center">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-danger">
                      <h4 class="card-title" id="basic-layout-icons">Tambah Data Kondisi Alat Pertanian</h4>
                    </div>
                  </div>
                  <?php
                    $username      = $_SESSION['username'];
                    $query2        = "SELECT * FROM tbl_users WHERE username='".$username."'"; 
                    $sql2          = mysqli_query($connection, $query2); 
                    $data2         = mysqli_fetch_array($sql2);
                  ?>
                  <div class="card-body">
                    <div class="px-3">
                      <form class="form" action="config/simpan.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="aksialat" value="aksialat">
                        <input type="hidden" name="id_users" value="<?php echo $data2['id_users']; ?>">
                        <div class="form-group">
                          <label>Nama Alat</label>
                          <div class="position-relative">
                            <input type="text" class="form-control" name="nama_alat" id="text-only" placeholder=""
                              required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Jumlah Unit</label>
                          <div class="position-relative">
                            <input type="number" class="form-control" name="jumlah_unit" id="text-only" placeholder=""
                              required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Kondisi Alat</label>
                          <select name="status" class="form-control">
                            <option>Kondisi Baik</option>
                            <option>Cukup Baik</option>
                            <option>Rusak</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Keterangan Tambahan Kondisi Alat</label>
                          <div class="position-relative">
                            <textarea rows="3" class="form-control" name="keterangan" placeholder=""
                              required></textarea>
                          </div>
                        </div>
                        <div class="form-actions right">
                          <button type="reset" class="btn btn-danger mr-1">
                            <i class="icon-close"></i> Reset
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
  <!-- Custom js for this page-->
  <script src="app-assets/vendors/js/toastr.min.js"></script>
  <script src="app-assets/js/toastr.min.js"></script>
  <?php
        error_reporting(E_ALL ^ (E_ALL));
          if($status=$_GET["status"]=="duplicate") { ?>
  <script>
    toastr.error('Silahkan Cek Daftar Data', 'Data Tersebut Sudah Ada!')
  </script>
  <?php } ?>
  
</body>

</html>