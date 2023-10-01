<?php

//header("Content-type=text/html;charset=utf-8");
//header('Content-type:text/json');
$servername = "localhost";
$username = "wenson";
$password = "a0965658928";
$dbname = "i83order_system";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

mysqli_query($conn, 'set names utf8');
$name=$_POST['storage_menu_name'];
$sql = "SELECT can_choose_maturity,double_meal FROM menu WHERE menu_name='" . $name . "'";
$result = $conn->query($sql);
$row = $result->fetch_all();
echo json_encode($row);
?>