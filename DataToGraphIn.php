<?php
include 'check.php';
include("connect.php") ;
//money in , monney out [to Month]
header('Content-Type: application/json');
require_once 'connect.php';

//Money Out All
$sql_mouth_in = "SELECT money_in.detail , money_in.time_reg , SUM(money_in.amount) AS sum_in\n".
"FROM  money_in WHERE money_in.user_id = ".$_SESSION['id']."\n" .
"GROUP BY money_in.detail";
$result_mouth_in = mysqli_query($conn , $sql_mouth_in);


$data = array();
foreach($result_mouth_in as $row){
    $data[][] = $row;
}

mysqli_close($conn);
echo json_encode($data);

?>