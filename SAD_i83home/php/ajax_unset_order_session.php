<?php
session_start();

$id=$_POST["menu_id"];

$meal_imfo=explode("/",$id);
unset($_SESSION["meal_list"][$meal_imfo[0]][$meal_imfo[1]][$meal_imfo[2]][$meal_imfo[3]][$meal_imfo[4]][$meal_imfo[5]]);
$_SESSION['sum']=$_SESSION['sum']-$meal_imfo[6];
?>