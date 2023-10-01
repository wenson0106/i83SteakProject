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
$sql = "SELECT meal_name,fir_meal,sec_meal,meal_sauce,meal_maturity,order_detail,meal_amount FROM order_list_storage ";
$result = $conn->query($sql);
$row=$result->fetch_all();
echo json_encode($row);
$conn->close();
?>           