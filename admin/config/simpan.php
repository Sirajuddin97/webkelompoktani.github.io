<?php
  	include "koneksi.php";
    	error_reporting(E_ALL ^ (E_ALL));
    		session_start();
					if (empty($_SESSION['username'])) 
						    {
                                header("location:../login.php"); 
                                exit();
						    }
				    else 	{

                            $pilihan1  = mysqli_real_escape_string($connection,$_POST['aksi_bantuan']);
                            $pilihan2  = mysqli_real_escape_string($connection,$_POST['aksi_akun']);
                            

                            if($pilihan1 == 'aksi_bantuan'){
                                $id              = 0;
                                $id_petani       = mysqli_real_escape_string($connection,$_POST['id_petani']); 
                                $jenis_bantuan   = mysqli_real_escape_string($connection,$_POST['jenis_bantuan']);
                                $keterangan      = mysqli_real_escape_string($connection,$_POST['keterangan']);
                                $tahun           = mysqli_real_escape_string($connection,$_POST['tahun']);
                                $periode_bantuan = mysqli_real_escape_string($connection,$_POST['periode_bantuan']);
                                $sumber_dana     = mysqli_real_escape_string($connection,$_POST['sumber_dana']);
                                $nominal         = $_POST['nominal'];
                                $nominal2        = str_replace(".","",$nominal);
                                //    
                                $query          = "INSERT INTO tbl_bantuan VALUES('".$id."', '".$id_petani."', '".$jenis_bantuan."', '".$keterangan."',
                                                  '".$tahun."', '".$periode_bantuan."', '".$sumber_dana."', '".$nominal2."')";
                                $sql            = mysqli_query($connection, $query); 
                                    //
                                    if ($sql){
                                        echo "<script>location = '../daftar-bantuan.php?status=berhasil';</script>";
                                    }
                                    else{
                                        echo "<script>location = '../daftar-bantuan.php?status=gagal';</script>";
                                    }
                            }
                            elseif($pilihan2 == 'aksi_akun'){
                                $id             = 0;
                                $nik            = mysqli_real_escape_string($connection,$_POST['nik']); 
                                $nama_petani    = mysqli_real_escape_string($connection,$_POST['nama_petani']); 
                                $luas_lahan     = mysqli_real_escape_string($connection,$_POST['luas_lahan']); 
                                $produksi       = mysqli_real_escape_string($connection,$_POST['produksi']); 
                                $jumlah_panen   = mysqli_real_escape_string($connection,$_POST['jumlah_panen']); 
                                $username       = mysqli_real_escape_string($connection,$_POST['username']); 
                                $password       = mysqli_real_escape_string($connection,$_POST['password']);
                                $nohp           = mysqli_real_escape_string($connection,$_POST['nohp']);
                                //        
                                $query          = "INSERT INTO tbl_petani VALUES('".$id."','".$nik."', '".$nama_petani."',
                                                  '".$luas_lahan."','".$produksi."','".$jumlah_panen."','".$username."','".$password."','".$nohp."')";
                                $sql            = mysqli_query($connection, $query); 
                                //
                                if ($sql){
                                        echo "<script>location = '../daftar-akun.php?status=berhasil';</script>";
                                }
                                else{
                                        echo "<script>location = '../daftar-akun.php?status=gagal';</script>";
                                }
                            }
                    }
    ?>