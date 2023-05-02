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
						$id_bantuan  	= $_GET['id_bantuan'];
						$id_bantuan2  	= $_GET['id_bantuan2'];
						$id_users    	= $_GET['id_users'];
						$id_petani    	= $_GET['id_petani'];


						if (!empty($id_bantuan)){
							$query 	= "DELETE FROM tbl_bantuan WHERE id_bantuan='".$id_bantuan."'";
							$sql 	= mysqli_query($connection, $query); }

						if (!empty($id_petani)){
							$query 	= "DELETE FROM tbl_petani WHERE id_petani='".$id_petani."'";
							$sql 	= mysqli_query($connection, $query); }

						if (!empty($id_users)){
							$query 	= "DELETE FROM tbl_users WHERE id_users='".$id_users."'";
							$sql 	= mysqli_query($connection, $query); }

						if (!empty($id_bantuan2)){
							$query 	= "DELETE FROM tbl_ajukan_bantuan WHERE id_bantuan='".$id_bantuan2."'";
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
