<?php
session_start();
if ($_SESSION['loginstatus'] != 1)
{
  header("location:login.php");
  exit();
}
 ?>