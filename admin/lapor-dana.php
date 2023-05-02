<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php");
      exit(); 
    }
    $active11 = "active";
 ?>
<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Laporan Penggunaan Dana Petani</title>
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
                      <h4 class="card-title" id="basic-layout-icons">Laporan Balik Bantuan Petani</h4>
                    </div>
                  </div>
                  <?php
                    $nik      = $_GET['nik'];
                    $query2   = "SELECT * FROM tbl_petani WHERE nik='".$nik."'"; 
                    $sql2     = mysqli_query($connection, $query2); 
                    $data2    = mysqli_fetch_array($sql2);
                    //
                    $query3   = "SELECT * FROM tbl_lapor_balik WHERE nik='".$nik."'"; 
                    $sql3     = mysqli_query($connection, $query3); 
                    $data3    = mysqli_fetch_array($sql3);
                  ?>
                  <div class="card-body">
                    <div class="px-3">
                      <form class="form" action="config/simpan.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="aksi_lapor" value="aksi_lapor">
                        <div class="form-group">
                          <label>NIK</label>
                          <div class="position-relative">
                            <input type="number" class="form-control" name="nik"  value="<?php echo $data2['nik']; ?>" id="nik" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Nama Petani</label>
                          <div class="position-relative" id="new_select">
                            <input type="text" class="form-control"  value="<?php echo $data2['nama_petani']; ?>" name="nama_petani" placeholder="Otomatis" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Isi Laporan Penggunaan Dana Disini</label>
                          <textarea class="form-control" name="isi" readonly><?php echo $data3['isi']; ?></textarea>
                        </div>
                        <?php
                        $no = 0;
                        $query         = "SELECT * FROM tbl_upload WHERE code='".$data3['code']."'"; 
                        $sql           = mysqli_query($connection, $query); 
                        while($data    = mysqli_fetch_array($sql)){ 
                        
                          if ($no==1){
                            $info ="Foto Nota";
                          }
                          else {
                            $info ="Foto Bukti Fisik";
                          }
                        ?>

                         <div class="form-group">
                          <label>Lampiran Laporan <?php echo $info; ?></label><br>
                          <img src="../petani/uploads/<?php echo $data['foto']; ?>" width="300px">

                        </div>

                        <?php } ?>
                        <div class="form-actions right">
                          <a href="daftar-ajuan.php">
                          <button type="button" class="btn btn-teal">
                            <i class="icon-back"></i> Kembali
                          </button>
                          </a>
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
  <script>
    // Restricts input for the given textbox to the given inputFilter.
    function setInputFilter(textbox, inputFilter) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
          if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          } else {
            this.value = "";
          }
        });
      });
    }
    // Install input filters.
    setInputFilter(document.getElementById("limit1"), function (value) {
      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999999999999999);
    });
    setInputFilter(document.getElementById("limit2"), function (value) {
      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999999999999999);
    });
  </script>
  <script>
    function testInput(event) {
      var value = String.fromCharCode(event.which);
      var pattern = new RegExp(/[a-zåäö ]/i);
      return pattern.test(value);
    }
    $('#text-only').bind('keypress', testInput);
  </script>
    <script type="text/javascript">
            $(document).ready(function(){
                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
    </script>
    
</body>
<script type="text/javascript">
  var nik = document.getElementsByName('nik')[0].value;
    function fetch_select(val)
    {
        $.ajax({
            type: 'post',
            url: 'ambil-data.php',
            data: {
              nik:val
            },
            success: function (response) {
                document.getElementById("new_select").innerHTML=response; 
            }
        });
    }
    </script>
</html>