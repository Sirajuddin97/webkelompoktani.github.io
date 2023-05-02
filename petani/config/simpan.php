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

                            $pilihan1  = mysqli_real_escape_string($connection,$_POST['aksibahan']);
                            $pilihan2  = mysqli_real_escape_string($connection,$_POST['aksiproduksi']);
                            $pilihan3  = mysqli_real_escape_string($connection,$_POST['aksialat']);
                            $pilihan4  = mysqli_real_escape_string($connection,$_POST['aksiuang']);
                            $pilihan5  = mysqli_real_escape_string($connection,$_POST['aksiadmin']);
                            $pilihan6  = mysqli_real_escape_string($connection,$_POST['aksi_bantuan']);
                            $pilihan7  = mysqli_real_escape_string($connection,$_POST['aksi_lapor']);

                            if($pilihan1 == 'aksibahan'){
                                $id             = 0;
                                $nama_bahan     = mysqli_real_escape_string($connection,$_POST['nama_bahan']); 
                                $stok           = mysqli_real_escape_string($connection,$_POST['stok']);
                                $kebutuhan      = mysqli_real_escape_string($connection,$_POST['kebutuhan']);
                                $id_users       = mysqli_real_escape_string($connection,$_POST['id_users']);
                                $tanggal        = mysqli_real_escape_string($connection,$_POST['tanggal']);
                                //
                                $gambar         = $_FILES['foto']['name'];
                                $tmp            = $_FILES['foto']['tmp_name'];
                                $gambarnew      = date('dmYHis').$gambar;
                                $path           = "../uploads/".$gambarnew;
                                $allowedExts    = array('png','jpg', 'jpeg', 'JPG', 'JPEG','PNG');
                                $temp           = explode(".", $_FILES["foto"]["name"]);
                                $extension      = end($temp);
                    
                                if (($_FILES["foto"]["type"] == "image/png") 
                                 or ($_FILES["foto"]["type"] == "image/jpeg") 
                                 or ($_FILES["foto"]["type"] == "image/jpg") 
                                 && ($_FILES["foto"]["size"] < 9000000) 
                                 && in_array($extension, $allowedExts))
                                {
                                if ($_FILES["foto"]["error"] > 0)
                                    {
                                    echo "Return Code: " . $_FILES["foto"]["error"] . "<br>";
                                    }
                                    if(move_uploaded_file($tmp, $path)){
                                        $query = "INSERT INTO tbl_bahanbaku VALUES('".$id."', '".$nama_bahan."', '".$stok."', 
                                                 '".$kebutuhan."', '".$id_users."', '".$tanggal."', '".$gambarnew."')";
                                        $sql   = mysqli_query($connection, $query); 
                                        //
                                        if ($sql){
                                            echo "<script>location = '../daftar-bahanbaku.php?status=berhasil';</script>";
                                        }
                                        else{
                                            echo "<script>location = '../daftar-bahanbaku.php?status=gagal';</script>";
                                        }
                                    }
                                }
                                else
                                  {
                                    echo "<script>location = 'daftar-bahanbaku?status=gagal2';</script>";
                                  }
                            }
                            elseif($pilihan7 == 'aksi_lapor'){
                                $id     = 0;
                                $nik    = mysqli_real_escape_string($connection,$_POST['nik']); 
                                $isi    = mysqli_real_escape_string($connection,$_POST['isi']);
                                $code   = date("LYmd");
                                //
                                foreach ($_FILES['foto']['tmp_name'] as $key => $name){
                                    //
                                    $file       = $_FILES['foto']['name'][$key];
                                    //
                                    if (($_FILES["foto"]["type"][$key] == "image/png") 
                                     or ($_FILES["foto"]["type"][$key] == "image/jpg")
                                     or ($_FILES["foto"]["type"][$key] == "image/jpeg")){
                                       //
                                       move_uploaded_file($_FILES['foto']['tmp_name'][$key], '../uploads/' . $file);
                                       //
                                    }
                                       $query  = "INSERT INTO tbl_upload VALUES('".$id."','".$code."', '".$file."')";
                                       $sql    = mysqli_query($connection, $query);
                                       //
                                }    
                                //
                                $query  = "INSERT INTO tbl_lapor_balik VALUES('".$id."', '".$nik."','".$isi."','".$code."')";
                                $sql    = mysqli_query($connection, $query); 
                                    //
                                    if ($sql){
                                        echo "<script>alert('Laporan Penggunaan Dana Terkirim');
                                        location = '../daftar-bantuan.php?status=berhasil';</script>";
                                    }
                                    else{
                                        echo "<script>location = '../daftar-bantuan.php?status=gagal';</script>";
                                    }
                            }
                            elseif($pilihan2 == 'aksiproduksi'){
                                $id             = 0;
                                $nama_produksi  = mysqli_real_escape_string($connection,$_POST['nama_produksi']); 
                                $hasil          = mysqli_real_escape_string($connection,$_POST['hasil']);
                                $target         = mysqli_real_escape_string($connection,$_POST['target']);
                                $id_users       = mysqli_real_escape_string($connection,$_POST['id_users']);
                                $periode_panen  = mysqli_real_escape_string($connection,$_POST['periode_panen']);
                                //    
                                $query          = "INSERT INTO tbl_hasilproduksi VALUES('".$id."', '".$nama_produksi."', 
                                                  '".$hasil."', '".$target."', '".$id_users."', '".$periode_panen."')";
                                $sql            = mysqli_query($connection, $query); 
                                    //
                                    if ($sql){
                                        echo "<script>location = '../daftar-hasilproduksi.php?status=berhasil';</script>";
                                    }
                                    else{
                                        echo "<script>location = '../daftar-hasilproduksi.php?status=gagal';</script>";
                                    }
                            }
                            elseif($pilihan6 == 'aksi_bantuan'){
                                $id                 = 0;
                                $nik                = mysqli_real_escape_string($connection,$_POST['nik']); 
                                $nama_petani        = mysqli_real_escape_string($connection,$_POST['nama_petani']); 
                                $luas_lahan         = mysqli_real_escape_string($connection,$_POST['luas_lahan']);
                                $produksi           = mysqli_real_escape_string($connection,$_POST['produksi']);
                                $bahan_baku         = mysqli_real_escape_string($connection,$_POST['bahan_baku']);
                                $persediaan_alat    = mysqli_real_escape_string($connection,$_POST['persediaan_alat']);
                                $kondisi            = mysqli_real_escape_string($connection,$_POST['kondisi']);
                                $nominal            = htmlspecialchars($_POST['nominal']);
                                $nominal2           = str_replace(".","",$nominal);
                                $status             = "Belum Ada";
                                //    
                                $query              = "INSERT INTO tbl_ajukan_bantuan VALUES('".$id."','".$nik."', '".$nama_petani."', 
                                                        '".$luas_lahan."', '".$produksi."', '".$bahan_baku."', '".$persediaan_alat."', '".$kondisi."','".$nominal2."','".$status."')";
                                $sql                = mysqli_query($connection, $query); 
                                    //
                                    if ($sql){
                                        echo "<script>alert('Permintaan Bantuan Telah Terkirim');
                                        location = '../daftar-bantuan.php?status=berhasil';</script>";
                                    }
                                    else{
                                       echo "<script>alert('Gagal');
                                        location = '../daftar-bantuan.php?status=gagal';</script>";
                                    }
                            }
                            elseif($pilihan3 == 'aksialat'){
                                $id             = 0;
                                $nama_produksi  = mysqli_real_escape_string($connection,$_POST['nama_alat']); 
                                $hasil          = mysqli_real_escape_string($connection,$_POST['status']);
                                $target         = mysqli_real_escape_string($connection,$_POST['keterangan']);
                                $id_users       = mysqli_real_escape_string($connection,$_POST['id_users']);
                                $jumlah_unit    = mysqli_real_escape_string($connection,$_POST['jumlah_unit']);
                                //
                                        $query = "INSERT INTO tbl_alat VALUES('".$id."', '".$nama_produksi."', '".$hasil."', 
                                                 '".$target."', '".$id_users."', '".$jumlah_unit."')";
                                        $sql   = mysqli_query($connection, $query); 
                                        //
                                        if ($sql){
                                            echo "<script>location = '../daftar-alat.php?status=berhasil';</script>";
                                        }
                                        else{
                                            echo "<script>location = '../daftar-alat.php?status=gagal';</script>";
                                        }
                            }
                            elseif($pilihan4 == 'aksiuang'){
                                $id             = 0;
                                $sumber         = mysqli_real_escape_string($connection,$_POST['sumber']); 
                                $jumlah         = htmlspecialchars($_POST['jumlah']);
                                $jumlah         = str_replace(".", "", $jumlah);
                                $id_users       = mysqli_real_escape_string($connection,$_POST['id_users']);
                                //    
                                $query          = "INSERT INTO tbl_keuangan VALUES('".$id."', '".$sumber."', '".$jumlah."', '".$id_users."')";
                                $sql            = mysqli_query($connection, $query); 
                                    //
                                    if ($sql){
                                        echo "<script>location = '../daftar-keuangan.php?status=berhasil';</script>";
                                    }
                                    else{
                                        echo "<script>location = '../daftar-keuangan.php?status=gagal';</script>";
                                    }
                            }
                            elseif($pilihan5 == 'aksiadmin'){
                                $id           = 0;
                                $username     = mysqli_real_escape_string($connection,$_POST['username']); 
                                $password     = mysqli_real_escape_string($connection,$_POST['password']);
                                    
                                $query        = "INSERT INTO tbl_users VALUES('".$id."', '".$username."', '".sha1($password)."')";
                                $sql          = mysqli_query($connection, $query); 
                                    //
                                    if ($sql){
                                        echo "<script>location = '../daftar-admin.php?status=berhasil';</script>";
                                    }
                                    else{
                                        echo "<script>location = '../daftar-admin.php?status=gagal';</script>";
                                    }
                            }
                    }
    ?>