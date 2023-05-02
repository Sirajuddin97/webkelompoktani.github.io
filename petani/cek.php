  <?php
        error_reporting(E_ALL ^ (E_ALL));
        session_start();
        include 'config/koneksi.php';
        $username 	= mysqli_real_escape_string($connection,$_POST['username']);
        $password  	= mysqli_real_escape_string($connection,$_POST['password']);
        $passwordhash 	= sha1($password);

        // Cek Level
        $query1  = mysqli_query($connection,"SELECT username, password, level FROM tbl_users 
                   WHERE username='$username' AND password='$passwordhash'");
        $cek1    = mysqli_num_rows($query1);
        $data1   = mysqli_fetch_array($query1);

        $query2  = mysqli_query($connection,"SELECT username, password, level FROM tbl_users 
                   WHERE username='$username' AND password='$passwordhash'");
        $cek2    = mysqli_num_rows($query2);
        $data2   = mysqli_fetch_array($query2);    

        // Validasi Level
        if ($cek1==TRUE && $data1['level']=="Admin"){
                $_SESSION['username']=$username;
                header("location: dashboard.php");
                exit();
        }
        elseif ($cek2==TRUE && $data2['level']=="Petani"){
                $_SESSION['username']=$username;
                header("location: ../admin/dashboard.php");
                exit();
        }
        else {
                header("location: ../login.php?status=gagal");
                exit();
        }        
   ?>
