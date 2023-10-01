<?php

//header("Content-type=text/html;charset=utf-8");
//header('Content-type:text/json');
$servername = "localhost";
$username = "wenson";
$password = "a0965658928";
$dbname = "schedule";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

mysqli_query($conn, 'set names utf8');
$sql = "SELECT payment_punchintime FROM payment WHERE payment_name='" . $_POST['determine_name'] . "'";
$sql2 = "SELECT payment_punchouttime FROM payment WHERE payment_name='" . $_POST['determine_name'] . "'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
if ($result->num_rows > 0) {
    echo "1";
} else {
    echo "0";
}
if ($result2->num_rows > 0) {
    
} else {
    echo "3";
}
$row=$result2->fetch_assoc();
echo $row['payment_punchouttime'];

$conn->close();
