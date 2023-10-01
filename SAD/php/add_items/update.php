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
$sql = "UPDATE employee SET employee_name='".$_POST['change_name']."',employee_id='".$_POST['change_id']."',employee_gender='".$_POST['change_gender']."',employee_birthday='".$_POST['change_birthday']."',employee_phonenumber='".$_POST['change_phone']."',email='".$_POST['change_email']."',employee_address='".$_POST['change_address']."',employee_position='".$_POST['change_position']."' WHERE employee_name='".$_POST['e_name']."'";
$result = $conn->query($sql);

$sql_up = "SELECT employee_name, employee_id, employee_gender, employee_birthday,employee_phonenumber,email,employee_address,employee_position FROM employee WHERE employee_name='".$_POST['change_name']."'";
$result_up = $conn->query($sql_up);
if ($result_up->num_rows > 0) {
    // 輸出資料
    while($row_up = $result_up->fetch_assoc()) {
        echo json_encode($row_up,JSON_UNESCAPED_UNICODE).' ';
    }
} else {
    echo "0 結果";
}
$conn->close();
?>