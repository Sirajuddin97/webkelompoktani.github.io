<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php"); 
      exit();
    }
    $active2 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Admin - Input Bantuan</title>
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
                      <h4 class="card-title" id="basic-layout-icons">Input Bantuan</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="px-3">
                      <form class="form" action="config/simpan.php" method="post">
                        <input type="hidden" name="aksi_bantuan" value="aksi_bantuan">
                        <input type="hidden" name="id_petani" value="<?php echo $id; ?>">
                        <div class="form-group" hidden>
                          <label>Pilih Petani</label>
                          <select name="id_petani" class="form-control" required>
                            <option selected>Muhammad Said, A.Ma</option>
                            <?php
                                    $query1       = "SELECT * FROM tbl_petani ORDER BY id_petani DESC"; 
                                    $sql1         = mysqli_query($connection, $query1); 
                                    while($data1  = mysqli_fetch_array($sql1)){ ?>

                            <option value="<?php echo $data1["id_petani"]; ?>"><?php echo $data1["nama_petani"]; ?></option>

                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Tahun</label>
                          <input type="number" name="tahun" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Sumber Dana</label>
                          <input type="text" name="sumber_dana" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Periode Bantuan</label>
                          <select name="periode_bantuan" class="form-control" required>
                            <option value="" disabled selected>Pilih</option>
                            <option>Periode I</option>
                            <option>Periode II</option>
                            <option>Periode III</option>
                            <option>Periode IV</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Jenis Bantuan</label>
                          <select name="jenis_bantuan" class="form-control" required>
                            <option value="" disabled selected>Pilih</option>
                            <option>Bantuan Bahan Baku</option>
                            <option>Bantuan Dana</option>
                            <option>Bantuan Alat</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Keterangan Bantuan</label>
                          <div class="position-relative">
                            <textarea rows="3" class="form-control" name="keterangan" placeholder=""
                              required><?php echo $data['keterangan']; ?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Jumlah Bantuan</label>
                          <input type="text" name="sumber_dana" class="form-control uang" required>
                        </div>
                        <div class="form-actions right">
                          <button type="reset" class="btn btn-danger mr-1">
                            <i class="icon-close"></i> Reset
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
  <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
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
  <script type="text/javascript">
            $(document).ready(function(){
                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
    </script>
</body>

</html>