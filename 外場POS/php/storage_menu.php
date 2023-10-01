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
$name = $_POST['storage_menu_name'];
$order_id=$_POST['hidden_name'];
if (isset($_POST['bimeat'])) {
    $bimeat = $_POST['bimeat'];
}else{
    $bimeat="";
}
if (isset($_POST['bimeat2'])) {
    $bimeat2 = $_POST['bimeat2'];
}else{
    $bimeat2="";
}
if(isset($_POST['maturity'])){
$maturity = $_POST['maturity'];
}else{
    $maturity="";
}
if(isset($_POST['sauce'])){
$sauce = $_POST['sauce'];
}else{
    $sauce="";
}
if(isset($_POST['memo'])){
$memo = $_POST['memo'];
}else{
    $memo="";
}
$sql = "SELECT * FROM order_list_storage WHERE meal_name='" . $name . "'";
$result = $conn->query($sql);
$row = $result->fetch_array();
if ($name == $row['meal_name'] && $bimeat == $row['fir_meal'] && $bimeat2 == $row['sec_meal'] && $maturity == $row['meal_maturity'] && $sauce == $row['meal_sauce'] && $memo == $row['order_detail']) {
    $sql_up = "UPDATE order_list_storage SET meal_amount='" . ($row['meal_amount'] + 1) . "' WHERE meal_name='" . $row['meal_name'] . "'";
    $result_up = $conn->query($sql_up);
} else {
    $sql_in = "INSERT INTO order_list_storage (order_id,meal_name,fir_meal,sec_meal,meal_sauce,meal_maturity,order_detail,meal_amount) VALUES('$order_id','$name','$bimeat','$bimeat2','$sauce','$maturity','$memo','1')";
    $result_in = $conn->query($sql_in);
}

echo "<script>";
echo "self.location=document.referrer";
echo "</script>";
$conn->close();
?>