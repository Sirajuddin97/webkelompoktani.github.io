<?php
error_reporting(E_ALL ^ (E_ALL));
include "config/koneksi.php"; 
if(isset($_POST['nik'])){
//

$nik         = $_POST['nik'];
$query5      = "SELECT * FROM tbl_petani WHERE nik='".$nik."'"; 
$sql5        = mysqli_query($connection, $query5); 
$data5       = mysqli_fetch_array($sql5);

    //
    if (empty($data5['nama_petani'])){
        echo "<input type='text' class='form-control' name='nama_petani' value='Data Tidak Ditemukan' placeholder='' readonly>";
        $view_btn ="";
    }
    else {
        echo "<input type='text' class='form-control' name='nama_petani' value='".$data5['nama_petani']."' placeholder='' readonly>";
        $view_btn ="disabled";

    }
}
?>