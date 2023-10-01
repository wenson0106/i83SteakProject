<?php
ini_set("display_errors", "On");
ini_set('mysql.connection_timeout', 300);
ini_set('default_socket_timeout', 300);
require("connect.php");
//新增

$data = [$_POST['clock_name'],$_POST['clock_time']];
$sql = "INSERT INTO payment (payment_name,payment_punchintime) VALUES(?,?)";
$select = $conn->prepare($sql);
$result4 = $select->execute($data);
echo "<script>";
echo "alert('打卡成功!');";
echo "self.location=document.referrer";
echo "</script>";
//新增

?>