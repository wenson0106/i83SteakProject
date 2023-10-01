<html>
<?php
session_start();
if(isset($_SESSION["name"])){
    $id=$_SESSION["name"];
}
echo $id;
$servername = "localhost";
$username = "wenson";
$password = "a0965658928";
$db = "schedule";

$link = new mysqli( $servername, $username, $password, $db)or die("Error");

$link->query("SET NAMES UTF8");
if(isset($_POST["mon1"])){
    $mon1=1;
}else{
    $mon1=0;
}
if(isset($_POST["mon2"])){
    $mon2=1;
}else{
    $mon2=0;
}
if(isset($_POST["tue1"])){
    $tue1=1;
}else{
    $tue1=0;
}
if(isset($_POST["tue2"])){
    $tue2=1;
}else{
    $tue2=0;
}
if(isset($_POST["wed1"])){
    $wed1=1;
}else{
    $wed1=0;
}
if(isset($_POST["wed2"])){
    $wed2=1;
}else{
    $wed2=0;
}
if(isset($_POST["thu1"])){
    $thu1=1;
}else{
    $thu1=0;
}
if(isset($_POST["thu2"])){
    $thu2=1;
}else{
    $thu2=0;
}
if(isset($_POST["fri1"])){
    $fri1=1;
}else{
    $fri1=0;
}
if(isset($_POST["fri2"])){
    $fri2=1;
}else{
    $fri2=0;
}
if(isset($_POST["sat1"])){
    $sat1=1;
}else{
    $sat1=0;
}
if(isset($_POST["sat2"])){
    $sat2=1;
}else{
    $sat2=0;
}
if(isset($_POST["sun1"])){
    $sun1=1;
}else{
    $sun1=0;
}
if(isset($_POST["sun2"])){
    $sun2=1;
}else{
    $sun2=0;
}
$sql_name = "select * from shifts where shifts_name ='$id'";
echo $sql_name;
$result = $link->query($sql_name);
if($row=$result->fetch_array()){
    if($row['shifts_name'] == $id){
        $sql_update='update shifts set `shifts_Mon1`='.$mon1.',`shifts_Mon2`='.$mon2.',`shifts_Tue1`='.$tue1.',`shifts_Tue2`='.$tue2.',`shifts_Wen1`='.$wed1.',`shifts_Wen2`='.$wed2.',`shifts_Tur1`='.$thu1.',`shifts_Tur2`='.$thu2.',`shifts_Fri1`='.$fri1.',`shifts_Fri2`='.$fri2.',`shifts_Sat1`='.$sat1.',`shifts_Sat2`='.$sat2.',`shifts_Sun1`='.$sun1.',`shifts_Sun2`='.$sun2.' where shifts_name like '."'".$id."'".';';
        if ($link->query($sql_update) === TRUE) {
            echo "New record created successfully";
        }else{
            echo "Error: " . $sql_update . "<br>" . $link->error;
        }
    }
}else{
    $sql_insert='insert into shifts(shifts_name,`shifts_Mon1`, `shifts_Mon2`, `shifts_Tue1`, `shifts_Tue2`, `shifts_Wen1`, `shifts_Wen2`, `shifts_Tur1`, `shifts_Tur2`, `shifts_Fri1`, `shifts_Fri2`, `shifts_Sat1`, `shifts_Sat2`, `shifts_Sun1`, `shifts_Sun2`)values(N'."'".$id."'".','.$mon1.','.$mon2.','.$tue1.','.$tue2.','.$wed1.','.$wed2.','.$thu1.','.$thu2.','.$fri1.','.$fri2.','.$sat1.','.$sat2.','.$sun1.','.$sun2.');';
    if ($link->query($sql_insert) === TRUE) {
    echo "New record created successfully";
        echo "<br>success: " . $sql_insert . "<br>" ;
    }else{
        echo "123: " . $sql_insert . "<br>" . $link->error;
    }
}
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="0;url=./shift_class.php?en=0">
    </head>
    <body>
    
    </body>
</html>