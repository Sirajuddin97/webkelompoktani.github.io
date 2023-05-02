<?php
  	include "koneksi.php";
    	error_reporting(E_ALL ^ (E_ALL));
    		session_start();
				//
				if (empty($_SESSION['username'])){
					header("location:../login.php"); 
					exit();
				}
				else{
						$id_bahanbaku  	= $_GET['id_bahanbaku'];
						$id_hasil	  	= $_GET['id_hasil'];
						$id_alat	  	= $_GET['id_alat'];
						$id_keuangan 	= $_GET['id_keuangan'];
						$id_users    	= $_GET['id_users'];
						$id_tercetak    = $_GET['id_tercetak'];

						if (!empty($id_bahanbaku)){
							$query 	= "DELETE FROM tbl_bahanbaku WHERE id_bahanbaku='".$id_bahanbaku."'";
							$sql 	= mysqli_query($connection, $query); }

						if (!empty($id_hasil)){
							$query 	= "DELETE FROM tbl_hasilproduksi WHERE id_hasil='".$id_hasil."'";
							$sql 	= mysqli_query($connection, $query); }

						if (!empty($id_alat)){
							$query 	= "DELETE FROM tbl_alat WHERE id_alat='".$id_alat."'";
							$sql 	= mysqli_query($connection, $query); }

						if (!empty($id_keuangan)){
							$query 	= "DELETE FROM tbl_keuangan WHERE id_keuangan='".$id_keuangan."'";
							$sql 	= mysqli_query($connection, $query); }
	
						if (!empty($id_users)){
							$query 	= "DELETE FROM tbl_users WHERE id_users='".$id_users."'";
							$sql 	= mysqli_query($connection, $query); }
							
						if (!empty($id_tercetak)){
							$query 	= "DELETE FROM tbl_tercetak WHERE id_tercetak='".$id_tercetak."'";
							$sql 	= mysqli_query($connection, $query); }

						if($sql){
								echo "<script>window.history.back();</script>"; 
						}
						else {
								echo "<script>alert('Gagal Menghapus Data');
								window.history.back();</script>";
							}
				}
?>
