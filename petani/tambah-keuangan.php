<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php");
      exit(); 
    }
    $active33 = "active";
 ?>
<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Petani - Tambah Data Kondisi Keuangan</title>
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
                      <h4 class="card-title" id="basic-layout-icons">Tambah Data Kondisi Keuangan</h4>
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
                        <input type="hidden" name="aksiuang" value="aksiuang">
                        <input type="hidden" name="id_users" value="<?php echo $data2['id_users']; ?>">
                        <div class="form-group">
                          <label>Sumber Dana</label>
                          <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Contoh: Penjualan Pupuk" name="sumber" id="text-only" placeholder=""
                              required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Nominal</label>
                          <div class="position-relative">
                            <input type="text" class="form-control uang" placeholder="Masukkan Nominal Tanpa Rp." name="jumlah" id="text-only" placeholder=""
                              required>
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
  <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      // Format mata uang.
      $('.uang').mask('000.000.000', {
        reverse: true
      });
    })
  </script>
</body>

</html>