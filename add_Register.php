<?php

header('Content-Type: charset=utf-8');
include("connect.php") ;
include('func_ClearStr.php');
$status = "" ;
$msg = "" ;

$name = $conn->escape_string($_POST['name']);
$surname = $conn->escape_string($_POST['surname']);
$username = $conn->escape_string($_POST['username']);
$password = $conn->escape_string($_POST['password']);
$sex = $conn->escape_string($_POST['sex']);

if(!empty($name) && !empty($surname) && !empty($username) && !empty($password) && !empty($sex)) 
{
    $sql = "INSERT INTO user(name,surname,username,password,sex) VALUES('".$conn->escape_string($_POST['name'])."','".$conn->escape_string($_POST['surname'])."','".$conn->escape_string($_POST['username'])."',SHA1($password),'".$conn->escape_string($_POST['sex'])."')";

    $rs = $conn->query($sql) ;
    if($rs)
    {
        $status = "ok" ;
        $msg = "เพิ่มข้อมูลเรียบร้อย" ;
      
    }
    else
    {
        $msg = "เพิ่มข้อมูลไม่ได้" ;
        
    }
}
else {
    $msg = "ข้อมูลไม่ครบ" ;

}
echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
