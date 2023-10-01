<?php

ini_set("display_errors", "On");
ini_set('mysql.connection_timeout', 300);
ini_set('default_socket_timeout', 300);
require("connect.php");

//新增
$new_name = $_POST['new_name'];
$new_id = $_POST['new_id'];
$new_gender=$_POST['new_gender'];
$new_birthday = $_POST['new_birthday'];
$new_phone = $_POST['new_phone'];
$new_email=$_POST['new_email'];
$new_address = $_POST['new_address'];
$new_employ = $_POST['new_employ'];

$data = [$new_name, $new_id, $new_gender, $new_birthday, $new_phone,$new_email, $new_address,$new_employ];
$sql = "INSERT INTO employee (employee_name,employee_id,employee_gender,employee_birthday,employee_phonenumber,email,employee_address,employee_position) VALUES(?,?,?,?,?,?,?,?)";
$select = $conn->prepare($sql);
$result4 = $select->execute($data);
echo "<script>";
echo "self.location=document.referrer";
echo "</script>";
//新增

?>