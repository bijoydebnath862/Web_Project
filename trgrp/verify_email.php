<?php
    $connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
    session_start();

if(isset($_GET['token'])){

    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM trgrp WHERE verify_token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($connection, $verify_query);

    ///user login
    if(mysqli_num_rows($verify_query_run) > 0){

        $row = mysqli_fetch_array($verify_query_run);
        
        if($row['verify_status'] == "0"){

            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE trgrp SET verify_status = '1' WHERE verify_token = '$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($connection, $update_query);

            if($update_query_run){
                $_SESSION['status'] = "Your account has been verified successfully.";
                echo "<script> window.location.href='TGlogin.php'; </script>";
                exit(0);
            }
            else{
                $_SESSION['status'] = "Verification failed.";
                echo "<script> window.location.href='TGlogin.php'; </script>";
                exit(0);
            }

        }
        else{
            $_SESSION['status'] = "Email already verified. Please Login.";
            echo "<script> window.location.href='TGlogin.php'; </script>";
            exit(0);
        }

    }
    
    else{
        $_SESSION['status'] = "This token does not exist";
        echo "<script> window.location.href='TGlogin.php'; </script>";
    }

}
else{
    $_SESSION['status'] = "Not Allowed";
    echo "<script> window.location.href='TGlogin.php'; </script>";
}
?>