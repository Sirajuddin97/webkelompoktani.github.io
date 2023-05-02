<?php
    session_start();
        if ($_REQUEST['maukeluar'] == "iya")
        {
            if(ISSET($_SESSION['username']))
                {
                    UNSET($_SESSION['username']);
                }
        }
            header("location: ../../login.php");
            session_destroy();
            exit();
?>
