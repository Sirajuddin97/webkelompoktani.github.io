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
<html lang="id" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Admin - Daftar Ajuan Bantuan Petani</title>
  <?php include "head.php"; ?>
  <style>
    .btn[class*='btn-'],
    .fc button[class*='btn-'] {
      margin-bottom: 0rem !important;
    }

    .table td {
      padding: 0.3rem;
    }
  </style>
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
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-teal">
                      <h4 class="card-title" id="basic-layout-icons">Daftar Ajuan Bantuan Petani</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="px-3">
                      <div class="card-panel">
                        <div class="">
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered zero-configuration dataTable"
                              cellspacing="0">
                              <thead>
                                <tr>
                                  <th width="5%">No</th>
                                  <th>NIK</th>
                                  <th>Nama Petani</th>
                                  <th>Luas Lahan (M2)</th>
                                  <th>Rata-Rata produksi (KG)</th>
                                  <th>Kebutuhan Bahan Baku (KG)</th>
                                  <th>Persediaan Alat Pertanian</th>
                                  <th>Kondisi Alat Pertanian</th>
                                  <th>Kisaran Dana yang Dibutuhkan</th>
                                  <th>Status</th>
                                  <th>Pilihan</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $no            = 0;
                              $query         = "SELECT * FROM tbl_ajukan_bantuan order by id_bantuan desc"; 
                              $sql           = mysqli_query($connection, $query); 
                              while($data    = mysqli_fetch_array($sql)){ 
                                //
                                $query2      = "SELECT * FROM tbl_petani WHERE nik='".$data['nik']."'"; 
                                $sql2        = mysqli_query($connection, $query2); 
                                $data2       = mysqli_fetch_array($sql2);
                                //
                                $no++;
                                //
                                if($data["status"]=="Diterima"){
                                  $view ="";
                                }
                                else{
                                  $view ="hidden";
                                }
                                  echo "<tr>";
                                  echo "<td>$no</td>";
                                  echo '<td>'.$data["nik"].'</td>';
                                  echo '<td>'.$data["nama_petani"].'</td>';
                                  echo '<td>'.$data["luas_lahan"].'</td>';
                                  echo '<td>'.$data["produksi"].'</td>';
                                  echo '<td>'.$data["bahan_baku"].'</td>';
                                  echo '<td>'.$data["persediaan_alat"].'</td>';
                                  echo '<td>'.$data["kondisi"].'</td>';
                                  echo '<td>Rp. '.number_format($data["nominal"]).'</td>';
                                  echo '<td>'.$data["status"].'</td>';
                                  echo '<td>

                                  <a href="config/update.php?id_bantuan='.$data["id_bantuan"].'&status=Diterima&no_hp='.$data2["nohp"].'&nik='.$data["nik"].'">
                                  <input type="button" value="Setuju" class="btn btn-teal" style="width:100%"></a>

                                  <a href="config/update.php?id_bantuan='.$data["id_bantuan"].'&status=Ditolak&no_hp='.$data2["nohp"].'&nik='.$data["nik"].'">
                                  <input type="button" value="Tolak" class="btn btn-danger" style="width:100%"></a>

                                  <a '.$view.' href="lapor-dana.php?nik='.$data["nik"].'">
                                  <input type="button" value="Laporan" class="btn btn-primary" style="width:100%"></a>

                                  </td>';
                                  //
                              echo '
                                  </tr>';
                              }
                            ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div><br>
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
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN CONVEX JS-->
  <script src="app-assets/js/app-sidebar.js"></script>
  <script src="app-assets/js/notification-sidebar.js"></script>
  <script src="app-assets/js/customizer.js"></script>
  <!-- END CONVEX JS-->
  <script src="app-assets/js/data-tables/datatable-basic.js"></script>
  <script src="app-assets/vendors/js/datatable/datatables.min.js"></script>
  <script src="app-assets/vendors/js/toastr.min.js"></script>
  <script src="app-assets/js/toastr.min.js"></script>
  <!-- END PAGE LEVEL JS-->
  <?php
          if($status=$_GET["status"]=="done") { ?>
  <script>
    toastr.success('Status Registrasi Diterima', 'Perubahan Tersimpan')
  </script>
  <?php } ?>
  <!-- END PAGE LEVEL JS-->
</body>

</html>