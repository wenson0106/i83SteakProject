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
$sql = "SELECT employee_name, employee_id, employee_gender, employee_birthday,employee_phonenumber,email,employee_address,employee_position FROM employee WHERE employee_name='".$_POST['search']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 輸出資料
    while($row = $result->fetch_assoc()) {
        echo json_encode($row,JSON_UNESCAPED_UNICODE).' ';
    }
} else {
    echo "0 結果";
}
$conn->close();
?>