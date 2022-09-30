<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
include('func_ClearStr.php');
$status = "" ;
$msg = "" ;

if(!empty($_POST['id_income']))
{
    $sql = "INSERT INTO money_in (detail,amount,user_id) VALUES('".$conn->escape_string(clearStr($_POST['id_income']))."',"
        .$conn->escape_string(clearStr($_POST['total'])).",".$_SESSION['id'].")";

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
