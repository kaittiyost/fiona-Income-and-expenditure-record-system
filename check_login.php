<?php
session_start();
header('Content-Type: charset=utf-8');
include("connect.php") ;

if(!empty($_POST['username']) && !empty($_POST['pass']))
{
    $password = sha1($_POST['pass']) ;
    $rs = $conn->query("select * from user where username='". $conn->escape_string($_POST['username']). "' and password='". $conn->escape_string($password) ."' limit 1") ;
    echo $conn->error ;
  //  $data = $rs->fetch_array();
    $login = $rs->fetch_array();

    if($login['username']  == $_POST['username'])
    {
        $_SESSION['id'] = $login['id'] ;
        $_SESSION['name'] = $login['name'] ;
        $_SESSION['username'] = $login['username'] ;
        $_SESSION['surname'] = $login['surname'] ;
        $_SESSION['sex'] = $login['sex'] ;
        $_SESSION['logStatus'] = 1;
    
        $status = "ok" ;
        $msg = "ok" ;
        header('location:Dashboard.php');
    }
    else {
        $msg = "รหัสผ่านไม่ถูกต้อง" ;
        $status = "" ;
        header('location:Login.php');
    }
}
else {
    $msg =  "ข้อมูลไม่ครบ" ;
    $status = "" ;
    header('location:Login.php');
}
// return JSON
//echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
