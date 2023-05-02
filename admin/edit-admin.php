<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php"); 
      exit();
    }
    $active3 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Admin - Edit Admin</title>
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
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-danger">
                      <h4 class="card-title" id="basic-layout-icons">Edit Akun</h4>
                    </div>
                  </div>
                  <?php
                    if($_SESSION['username']=='admin')
                    { 
                      $id      = mysqli_real_escape_string($connection, $_GET['id_users']);
                      $query   = "SELECT * FROM tbl_users where id_users ='2'"; 
                      $sql     = mysqli_query($connection, $query); 
                      $data    = mysqli_fetch_array($sql);
                      $status  = "";
                      $status2 = "editusers2";
                    }
                    else 
                    {
                      $id      = mysqli_real_escape_string($connection, $_GET['id_users']);
                      $user    = $_SESSION['username'];
                      $query   = "SELECT * FROM tbl_users where username ='$user'"; 
                      $sql     = mysqli_query($connection, $query); 
                      $data    = mysqli_fetch_array($sql);
                      $status  = "readonly";
                      $status2 = "editusers2";
                    } 
                      
                ?>
                  <div class="card-body">
                    <div class="px-3">
                      <form class="form" action="config/update.php" method="post">
                        <input type="hidden" name="id_users" value="<?php echo $id; ?>">
                        <input type="hidden" name="editusers2" value="<?php echo $status2; ?>">
                        <input type="hidden" name="username" value="<?php echo $data['username']; ?>">
                        <div class="form-group">
                          <label>Username</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" class="form-control"
                              value="<?php echo $data['username']; ?>" <?php echo $status; ?> readonly>
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Password Baru</label>
                          <div class="position-relative has-icon-left">
                            <input type="password" class="form-control" name="password"
                              required="">
                            <div class="form-control-position">
                              <i class="icon-key"></i>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions right">
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-close"></i> Batal
                          </button>
                          <button type="submit" class="btn btn-teal">
                            <i class="icon-cursor"></i> Simpan
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
          if($status=$_GET["proses"]=="berhasil") { ?>
  <script>
    toastr.success('Akun Tersimpan', 'Perubahan Tersimpan')
  </script>
  <?php } ?>
  <?php
          if($status=$_GET["proses"]=="gagal") { ?>
  <script>
    toastr.error('Gagal Menyimpan Data, Silahkan Coba Kembali', 'Terjadi Kesalahan!')
  </script>
  <?php } ?>
</body>

</html>