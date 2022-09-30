<?php
include 'check.php';
include("connect.php") ;
//money in , monney out [to Month]
header('Content-Type: application/json');
require_once 'connect.php';

// mouth
$sql_mouth_in = "SELECT SUM(money_in.amount) AS a FROM money_in WHERE 
DATE_FORMAT(money_in.time_reg, '%m') = DATE_FORMAT(CURRENT_DATE, '%m') AND money_in.user_id = ".$_SESSION['id'];
$result_mouth_in = mysqli_query($conn , $sql_mouth_in);

$sql_mouth_out = "SELECT SUM(money_out.amount) AS b FROM money_out WHERE 
DATE_FORMAT(money_out.time_reg, '%m') = DATE_FORMAT(CURRENT_DATE, '%m') AND money_out.user_id = ".$_SESSION['id'];
$result_mouth_out = mysqli_query($conn , $sql_mouth_out);

$data = array();
foreach($result_mouth_in as $row){
    $data[] = $row;
}

foreach($result_mouth_out as $row){
    $data[] = $row;
}

mysqli_close($conn);
echo json_encode($data);

?>