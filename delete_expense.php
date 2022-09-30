<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
$status = "" ;
$msg = "" ;

if(!empty($_POST['money_out_id']))
{
    $sql = "DELETE FROM money_out WHERE id =".$_POST['money_out_id'];

    $rs = $conn->query($sql) ;
    if($rs)
    {
        $status = "ok" ;
        $msg = "ลบข้อมูลเรียบร้อย" ;
      
    }
    else
    {
        $msg = "ลบข้อมูลไม่ได้" ;
        
    }
}
else {
    $msg = "ข้อมูลไม่ครบ" ;

}
echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
