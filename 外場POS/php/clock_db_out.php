<?php
ini_set("display_errors", "On");
ini_set('mysql.connection_timeout', 300);
ini_set('default_socket_timeout', 300);
require("connect.php");


//新增
$sql = "UPDATE payment set payment_punchouttime='".$_POST['clock_time_out']."' WHERE payment_name='".$_POST['clock_name_out']."'";
$result = $conn->query($sql);
echo "<script>";
echo "alert('打卡成功!');";
echo "self.location=document.referrer";
echo "</script>";
//新增

?>