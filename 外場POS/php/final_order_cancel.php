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
$sql="TRUNCATE TABLE order_list_storage";
$result=$conn->query($sql);
echo "<script>";
echo "alert('訂單已全數取消 請重新輸入新訂單');";
echo "self.location=document.referrer";
echo "</script>";
?>