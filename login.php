<?php
session_start();
//print_r($_POST);

if(($_POST['user']=="taf") && ($_POST['pass']=="tafadmin")){
    $SESSION['login'] = true;
    //echo 'true';
    print_r($_SESSION);
   // header('Location: front.php');
} else {
//    header("Location:login.html");
    echo 'false';
}