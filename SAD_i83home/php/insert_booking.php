<?php
$last_http='http://'.$_SERVER['SERVER_NAME'].'/SAD_i83home/php/i83_home_booking.php';
if(!isset($_SERVER["HTTP_REFERER"])){
    echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';
}else{
    $http=$_SERVER["HTTP_REFERER"];
}
if($http!=$last_http){
    echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';
    die();
}else{
    include("conn.php");
    $name=$_POST["name"];
    $tel=$_POST["tel"];
    $number=$_POST["number"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $sex=$_POST["sex"];
    $detail=$_POST["detail"];
    $time=$date.' '.$time.':00';
    $sql="insert into booking values('".$name."','".$tel."',".$number.",'".$time."','".$detail."')";
    $link->query($sql);
    echo '<script>alert("預約成功")</script>';
    echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';
}

?>
