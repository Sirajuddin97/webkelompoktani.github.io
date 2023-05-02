<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php");
      exit(); 
    }
    $active111 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Admin - Daftar Data Rekap Laporan Petani</title>
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
                      <h4 class="card-title" id="basic-layout-icons">Daftar Data Rekap Laporan Petani</h4>
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
                                  <th width="15%">Nama Petani</th>
                                  <th>Persediaan Bahan</th>
                                  <th>Hasil Produksi</th>
                                  <th>Kondisi Alat Pertanian</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $no            = 0;
                              $query         = "SELECT * FROM tbl_users WHERE level='Petani' order by id_users desc"; 
                              $sql           = mysqli_query($connection, $query); 
                              while($data    = mysqli_fetch_array($sql)){ 
                              $no++;
                                  echo "<tr>";
                                  echo "<td>$no</td>";
                                  echo '<td>'.$data["nama"].'</td>';
                                  //
                                  echo "<td>";
                                  $query1       = "SELECT * FROM tbl_bahanbaku WHERE id_users='".$data['id_users']."'"; 
                                  $sql1         = mysqli_query($connection, $query1); 
                                  while($data1  = mysqli_fetch_array($sql1)){ 
                                    echo '- '.$data1["nama_bahan"].'';
                                    echo "<br>Kekurangan: ".$hasil = $data1['kebutuhan']-$data1['stok'];
                                    echo "<br><br>";
                                    
                                  }
                                  echo "</td>";
                                  
                                  echo "<td>";
                                  $query2       = "SELECT * FROM tbl_hasilproduksi WHERE id_users='".$data['id_users']."'"; 
                                  $sql2         = mysqli_query($connection, $query2); 
                                  while($data2  = mysqli_fetch_array($sql2)){
                                    echo '- '.$data2["nama_produksi"].' ';
                                    $hasil  = str_replace("kg","",$data2["hasil"]);
                                    $target = str_replace("kg","",$data2["target"]);
                                    $total  = $hasil-$target;
                                    echo $hasil." Kg <br>Status: ";
                                    //
                                    if ($total<0){
                                      echo "Target Produksi Tidak Tercapai";
                                    }
                                    elseif ($total==0){
                                      echo "Target Produksi Sudah Tercapai";
                                    }
                                    elseif ($total>0){
                                      echo "Produksi Sudah Melebihi Target";
                                    }
                                    echo "<br><br>";
                                  }
                                  echo "</td>";

                                  echo "<td>";
                                  $query3       = "SELECT * FROM tbl_alat WHERE id_users='".$data['id_users']."'"; 
                                  $sql3         = mysqli_query($connection, $query3); 
                                  while($data3  = mysqli_fetch_array($sql3)){ 
                                    echo '- '.$data3["nama_alat"].'';
                                    echo "<br>Keterangan: ".$data3['status']." (".$data3['keterangan'].")";
                                    echo "<br><br>";
                                  }
                                  echo "</td>";
                                  

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