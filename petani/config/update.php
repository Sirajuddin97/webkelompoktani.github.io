<?php
  	include "koneksi.php";
    	//error_reporting(E_ALL ^ (E_ALL));
    		session_start();
					if (empty($_SESSION['username'])) {
              header("location:../login.php"); 
              exit();
						}
					else {
                  $pilihan1  = $_POST['update_bahanbaku'];
                  $pilihan2  = $_POST['update_hasilproduksi'];
                  $pilihan3  = $_POST['update_alat'];
                  $pilihan4  = $_POST['update_keuangan'];
                  $pilihan6  = $_POST['editusers'];
                  $pilihan7  = $_POST['editusers2'];
             
                 if ($pilihan1 == 'update_bahanbaku'){
                        $id           = mysqli_real_escape_string($connection,$_POST['id_bahanbaku']); 
                        $nama_bahan   = mysqli_real_escape_string($connection,$_POST['nama_bahan']); 
                        $stok         = mysqli_real_escape_string($connection,$_POST['stok']);
                        $kebutuhan    = mysqli_real_escape_string($connection,$_POST['kebutuhan']);
                        $tanggal      = mysqli_real_escape_string($connection,$_POST['tanggal']);
                        //
                        $query        = "UPDATE tbl_bahanbaku SET nama_bahan='".$nama_bahan."',stok='".$stok."',kebutuhan='".$kebutuhan."',tanggal='".$tanggal."' WHERE id_bahanbaku='".$id."'";
                        $sql            = mysqli_query($connection, $query); 
                        //
                        if($sql){
                                header("location:../daftar-bahanbaku.php?status=berhasil");
                        }
                        else{
                                header("location:../edit-bahanbaku.php?id_bahanbaku=$id&status=gagal");
                        }
                  }
                  elseif ($pilihan2 == 'update_hasilproduksi'){
                    $id            = mysqli_real_escape_string($connection,$_POST['id_hasil']); 
                    $nama_produksi = mysqli_real_escape_string($connection,$_POST['nama_produksi']); 
                    $hasil         = mysqli_real_escape_string($connection,$_POST['hasil']);
                    $target        = mysqli_real_escape_string($connection,$_POST['target']);
                    $periode_panen = mysqli_real_escape_string($connection,$_POST['periode_panen']);
                    //
                    $query         = "UPDATE tbl_hasilproduksi SET nama_produksi='".$nama_produksi."',hasil='".$hasil."',
                                      target='".$target."',periode_panen='".$periode_panen."' WHERE id_hasil='".$id."'";
                    $sql           = mysqli_query($connection, $query); 
                    //
                    if($sql){
                            header("location:../daftar-hasilproduksi.php?status=berhasil");
                    }
                    else{
                            header("location:../edit-hasilproduksi.php?id_hasil=$id&status=gagal");
                    }
                  }
                  elseif ($pilihan3 == 'update_alat'){
                    $id           = mysqli_real_escape_string($connection,$_POST['id_alat']); 
                    $nama_alat    = mysqli_real_escape_string($connection,$_POST['nama_alat']); 
                    $status       = mysqli_real_escape_string($connection,$_POST['status']);
                    $keterangan   = mysqli_real_escape_string($connection,$_POST['keterangan']);
                    //
                    $query        = "UPDATE tbl_alat SET nama_alat='".$nama_alat."',status='".$status."',keterangan='".$keterangan."' WHERE id_alat='".$id."'";
                    $sql          = mysqli_query($connection, $query); 
                    //
                    if($sql){
                            header("location:../daftar-alat.php?status=berhasil");
                    }
                    else{
                            header("location:../edit-alat.php?id_alat=$id&status=gagal");
                    }
                  }
                  elseif ($pilihan4 == 'update_keuangan'){
                    $id           = mysqli_real_escape_string($connection,$_POST['id_keuangan']); 
                    $sumber       = mysqli_real_escape_string($connection,$_POST['sumber']); 
                    $jumlah       = htmlspecialchars($_POST['jumlah']);
                    $jumlah       = str_replace(".", "", $jumlah);
                    //
                    $query        = "UPDATE tbl_keuangan SET sumber='".$sumber."',jumlah='".$jumlah."' WHERE id_keuangan='".$id."'";
                    $sql          = mysqli_query($connection, $query); 
                    //
                    if($sql){
                            header("location:../daftar-keuangan.php?status=berhasil");
                    }
                    else{
                            header("location:../edit-keuangan.php?id_keuangan=$id&status=gagal");
                    }
                  }
                  elseif ($pilihan6 == 'editusers') {
                    $id_users       = mysqli_real_escape_string($connection,$_POST['id_users']); 
                    $username       = mysqli_real_escape_string($connection,$_POST['username']); 
                    $password       = mysqli_real_escape_string($connection,$_POST['password']);
                    
                    $query          = "SELECT * FROM tbl_users WHERE id_users='".$id_users."'";
                    $sql            = mysqli_query($connection, $query);
                    $data           = mysqli_fetch_array($sql);

                    $query          = "UPDATE tbl_users SET username='".$username."',password='".sha1($password)."' WHERE id_users='".$id_users."'";
                    $sql            = mysqli_query($connection, $query); 
                      if($sql)
                          { 
                            header("location:daftar-admin.php");
                          }
                      else
                          {
                            header("location:daftar-admin.php?id_users=$id_users&status=gagal");
                          }
                    }
                    elseif ($pilihan7 == 'editusers2') {
                      $username       = mysqli_real_escape_string($connection,$_POST['username']); 
                      $password       = mysqli_real_escape_string($connection,$_POST['password']);
                      
                      $query          = "SELECT * FROM tbl_users WHERE id_users='".$id_users."'";
                      $sql            = mysqli_query($connection, $query);
                      $data           = mysqli_fetch_array($sql);

                      $query          = "UPDATE tbl_users SET username='".$username."',password='".sha1($password)."' WHERE username='".$username."'";
                      $sql            = mysqli_query($connection, $query); 
                        if($sql)
                            { 
                              header("location: ../edit-akun.php?proses=berhasil");
                            }
                        else
                            {
                              header("location: ../edit-akun.php?proses=gagal");
                            }
                }
      }        
?>