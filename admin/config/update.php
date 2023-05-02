<?php
  	include "koneksi.php";
    	error_reporting(E_ALL ^ (E_ALL));
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
                  $pilihan8  = $_GET['id_bantuan'];
             
                 if ($pilihan1 == 'update_bahanbaku'){
                        $id           = mysqli_real_escape_string($connection,$_POST['id_bahanbaku']); 
                        $nama_bahan   = mysqli_real_escape_string($connection,$_POST['nama_bahan']); 
                        $stok         = mysqli_real_escape_string($connection,$_POST['stok']);
                        $kebutuhan    = mysqli_real_escape_string($connection,$_POST['kebutuhan']);
                        //
                        $query        = "UPDATE tbl_bahanbaku SET nama_bahan='".$nama_bahan."',stok='".$stok."',kebutuhan='".$kebutuhan."' WHERE id_bahanbaku='".$id."'";
                        $sql            = mysqli_query($connection, $query); 
                        //
                        if($sql){
                                header("location:../daftar-bahanbaku.php?status=berhasil");
                        }
                        else{
                                header("location:../edit-bahanbaku.php?id_bahanbaku=$id&status=gagal");
                        }
                  }
                  elseif (!empty($pilihan8)){
                    $id       = mysqli_real_escape_string($connection,$_GET['id_bantuan']); 
                    $status   = mysqli_real_escape_string($connection,$_GET['status']); 
                    echo $no_hp     = $_GET['no_hp']; 
                    $nik      = mysqli_real_escape_string($connection,$_GET['nik']); 
                    //
                    $query    = "UPDATE tbl_ajukan_bantuan SET status='".$status."' WHERE id_bantuan='".$id."'";
                    $sql      = mysqli_query($connection, $query); 
                    //
                    $query5 = "SELECT * FROM tbl_petani WHERE nik='".$nik."'"; 
                    $sql5   = mysqli_query($connection, $query5); 
                    $data5  = mysqli_fetch_array($sql5);
                    $nama   = $data5['nama_petani'];
                    //
                    if($sql){
                            //
                            $data = [
                              'destination' => "'.$no_hp.'", // remove [ and ]
                              'message' => 'Atas Nama '.$nama.' Permintaan Bantuan Anda '.$status.'',
                              'api_key' => 'URaUbRNYcaNGZXgKKVIcbVmDthqUsmgi',
                              'device_key' => 'dmc9pn'
                            ];
                              
                              $curl = curl_init();
                              curl_setopt_array($curl, array(
                                              CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
                                              CURLOPT_RETURNTRANSFER => true,
                                              CURLOPT_ENCODING => "",
                                              CURLOPT_MAXREDIRS => 10,
                                              CURLOPT_TIMEOUT => 0,
                                              CURLOPT_FOLLOWLOCATION => true,
                                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                              CURLOPT_CUSTOMREQUEST => "POST",
                                              CURLOPT_POSTFIELDS => http_build_query($data),
                              ));
                              
                              $response = curl_exec($curl);
                              curl_close($curl);
                            //
                           echo "<script>alert('Permintaan Bantuan $status & Notifikasi Berhasil Dikirim ke Petani');
                           location = '../daftar-ajuan.php?status=berhasil';</script>";
                    }
                    else{
                            header("location:../daftar-ajuan.php?id_bantuan=$id&status=gagal");
                    }
                  }
                  elseif ($pilihan2 == 'update_hasilproduksi'){
                    $id            = mysqli_real_escape_string($connection,$_POST['id_hasil']); 
                    $nama_produksi = mysqli_real_escape_string($connection,$_POST['nama_produksi']); 
                    $hasil         = mysqli_real_escape_string($connection,$_POST['hasil']);
                    $target        = mysqli_real_escape_string($connection,$_POST['target']);
                    //
                    $query         = "UPDATE tbl_hasilproduksi SET nama_produksi='".$nama_produksi."',hasil='".$hasil."',target='".$target."' WHERE id_hasil='".$id."'";
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
                              header("location:../edit-admin.php?proses=berhasil");
                            }
                        else
                            {
                              header("location:../edit-admin.php?proses=gagal");
                            }
                }
      }        
?>