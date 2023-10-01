<html>
<?php

//判斷是否符合帳號密碼規則
$account=$_POST["account"];
$passward=$_POST["pass"];

if(preg_match("/^([0-9A-Za-z]+)$/", $account , $result)){
    echo 'correct';
}else{
    echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php?message=ac">';
}

if(preg_match("/^([0-9A-Za-z]+)$/", $passward , $result)){
    echo 'correct';
}else{
    echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php?message=ps">';
}
//---------------------------------------------------------------------------------------------------


require("db_link.php");

$sql = "select * from employee where employee_id LIKE '".$account."'";

$result = $link->query($sql);

if($row=$result->fetch_array()){
    if($row['employee_phonenumber'] == $passward){
        session_start();
        $_SESSION["name"]=$row['employee_name'];
        if($row['employee_position'] == '店長'){
            $_SESSION["pos"]=$row['employee_position'];
            echo '<meta http-equiv="refresh" content="0;url=./Main_boss.php">';
        }else if($row['employee_position'] == '正職'){
            $_SESSION["pos"]=$row['employee_position'];
            echo '<meta http-equiv="refresh" content="0;url=./Main.php">';
        }else{
            $_SESSION["pos"]=$row['employee_position'];
            echo '<meta http-equiv="refresh" content="0;url=./Main.php">';
        }
        
    }else{
        echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php?message=ps">';
    }
}else{
    echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php?message=ac">';
}

?>
</html>