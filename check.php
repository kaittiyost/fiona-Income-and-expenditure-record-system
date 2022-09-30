<?php
session_start();
if($_SESSION['logStatus'] != 1)
{
    header("location:login.php") ;
    exit ;
}
?>