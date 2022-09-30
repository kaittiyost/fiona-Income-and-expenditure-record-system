<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
$status = "" ;
$msg = "" ;
$sql = "";
if(!empty($_POST['amount']))
{
    $sql = "UPDATE money_in SET detail ='".$conn->escape_string($_POST['detail_income'])."', amount = "
        .$conn->escape_string($_POST['amount'])." WHERE id = " .$conn->escape_string($_POST['id']);
   // echo "sql :".$sql;
    $rs = $conn->query($sql) ;
    if($rs)
    {
        $status = "ok" ;
        $msg = "sucsess" ;
      
    }
    else
    {
        $msg = "something wrong!" ;
        
    }
}
else {
    $msg = "TryAgain" ;

}

echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
