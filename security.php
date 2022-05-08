<?php  
    //session_start();
    if (! (isset($_SESSION["autoriser"]))){
        header("location:SignInUp.php");
    }
?>