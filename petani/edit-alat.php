<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php"); 
      exit();
    }
    $active6 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Petani - Edit Kondisi Alat Pertanian</title>
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
                      <h4 class="card-title" id="basic-layout-icons">Edit Kondisi Alat Pertanian</h4>
                    </div>
                  </div>
                  <?php
                      $id      = mysqli_real_escape_string($connection, $_GET['id_alat']);
                      $query   = "SELECT * FROM tbl_alat where id_alat ='$id'"; 
                      $sql     = mysqli_query($connection, $query); 
                      $data    = mysqli_fetch_array($sql);
                ?>
                  <div class="card-body">
                    <div class="px-3">
                      <form class="form" action="config/update.php" method="post">
                        <input type="hidden" name="update_alat" value="update_alat">
                        <input type="hidden" name="id_alat" value="<?php echo $id; ?>">
                        <div class="form-group">
                          <label>Nama Alat</label>
                          <input type="text" class="form-control" name="nama_alat"
                            value="<?php echo $data['nama_alat']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Unit</label>
                          <input type="number" class="form-control" name="jumlah_unit"
                            value="<?php echo $data['jumlah_unit']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Kondisi Alat</label>
                          <select name="status" class="form-control">
                            <option><?php echo $data['status']; ?></option>
                            <option disabled>== Ubah Pilihan ==</option>
                            <option>Kondisi Baik</option>
                            <option>Cukup Baik</option>
                            <option>Rusak</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Keterangan Tambahan Kondisi Alat</label>
                          <div class="position-relative">
                            <textarea rows="3" class="form-control" name="keterangan" placeholder=""
                              required><?php echo $data['keterangan']; ?></textarea>
                          </div>
                        </div>
                        <div class="form-group" hidden>
                          <label>Foto</label>
                          <div class="position-relative">
                            <img style="width:100%;max-width:500px;" src="uploads/<?php echo $data['foto']; ?>">
                          </div>
                        </div>
                        <div class="form-actions right">
                          <a href="daftar-alat.php">
                          <button type="button" class="btn btn-danger mr-1">
                            <i class="icon-close"></i> Batal
                          </button></a>
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