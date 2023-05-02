<?php
    include "koneksi.php";
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
    $active10 = "active";
 ?>
<!DOCTYPE html>
<html lang="id" class="loading">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Petani - Daftar Admin</title>
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
                    <div class="col-md-8">
                        <div class="card">
                        <div class="card-header">
                            <div class="card-title-wrap bar-indigo">
                                <h4 class="card-title" id="basic-layout-icons">Daftar Admin</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="px-3">
                              <div class="card-panel">
                                <div class="">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered zero-configuration dataTable" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="20%">Username</th>
                                                        <th width="20%">Pilih</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    <?php
                                    $no          = 0;
                                    $query       = "SELECT * FROM tbl_users where id_users != '2'"; 
                                    $sql         = mysqli_query($connection, $query); 
                                    while($data  = mysqli_fetch_array($sql)){ 
                                    $no++;
                                        echo "<tr>
                                        <td>$no</td>
                                        <td><pre>".$data['username']."</pre></td>
                                        <td><a href='edit-admin.php?id_users=".$data['id_users']."'><input type='button' class='btn btn-info'value='Edit'></a>
                                        <a href='hapus.php?id_users=".$data['id_users']."'><input type='button' class='btn btn-teal'value='Hapus'></a></td>
                                        </tr>";
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
    <!-- END PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>