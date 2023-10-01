<?php
$acc=$_POST["acc"];
$pass=$_POST["pass"];

include("conn.php");

$sql="select * from acc";
$result=$link->query($sql);
$row=$result->fetch_array();
if($row[0]==$acc && $row[1]==$pass){
    session_start();
    $_SESSION["boss"]=true;
}
header("location: ./i83_home.php");
?>