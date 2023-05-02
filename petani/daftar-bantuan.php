<?php
    include "config/koneksi.php";
    error_reporting(E_ALL ^ (E_ALL));
    session_start();
    if (empty($_SESSION['username'])) {
      header("location:../login.php");
      exit(); 
    }
    $active9 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Petani - Informasi Bantuan</title>
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
                      <h4 class="card-title" id="basic-layout-icons">Informasi Bantuan</h4>
                    </div><br>
                  </div>
                  <div class="card-body">
                    <div class="px-3">
                      <div class="card-panel">
                        <div class="">
                          <div class="table-responsive">
                            <table id="example"
                              class="table table-striped table-bordered zero-configuration dataTable no-footer"
                              cellspacing="0" role="grid" aria-describedby="example_info">
                              <thead>
                                <tr role="row">
                                  <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="No: activate to sort column descending" style="width: 32.6406px;">No
                                  </th>
                                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    aria-label="Tahun: activate to sort column ascending" style="width: 158.359px;">
                                    Tahun</th>
                                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    aria-label="Periode Bantuan: activate to sort column ascending"
                                    style="width: 337.547px;">Periode Bantuan</th>
                                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    aria-label="Keterangan: activate to sort column ascending"
                                    style="width: 250.141px;">Jenis Bantuan</th>
                                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    aria-label="Keterangan: activate to sort column ascending"
                                    style="width: 250.141px;">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr role="row" class="odd">
                                  <td class="sorting_1">1</td>
                                  <td>2022</td>
                                  <td>Periode 1</td>
                                  <td>Bantuan Dana</td>
                                  <td><a href="ajukan-bantuan.php">
                                    <input type="button" class="btn btn-danger" value="Ajukan"></a>
                                    <a href="lapor-dana.php">
                                    <input type="button" class="btn btn-primary" value="Lapor Penggunaan Dana"></a>
                                  </td>
                                </tr>
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