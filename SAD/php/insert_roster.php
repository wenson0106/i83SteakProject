<html>
<?php
session_start();
if(isset($_SESSION["schedule"])){
    $sql_insert="insert into finalschedule values ";
    $j=0;
    foreach($_SESSION["schedule"] as $datetime => $nn){
        foreach($nn as $n => $name){
            if($j==0){
                $sql_insert=$sql_insert."('".$name;
            }else{
                $sql_insert=$sql_insert.",('".$name;
            }
            $j+=1;
            if($datetime=="MNoF" || $datetime== "MNoP"){
                $sql_insert=$sql_insert."','早班','星期一')";
            }else if($datetime=="MNiF" || $datetime== "MNiP"){
                $sql_insert=$sql_insert."','晚班','星期一')";
            }else if($datetime=="TuNoF" || $datetime== "TuNoP"){
                $sql_insert=$sql_insert."','早班','星期二')";
            }else if($datetime=="TuNiF" || $datetime== "TuNiP"){
                $sql_insert=$sql_insert."','晚班','星期二')";
            }else if($datetime=="WNoF" || $datetime== "WNoP"){
                $sql_insert=$sql_insert."','早班','星期三')";
            }else if($datetime=="WNiF" || $datetime== "WNiP"){
                $sql_insert=$sql_insert."','晚班','星期三')";
            }else if($datetime=="ThNoF" || $datetime== "ThNoP"){
                $sql_insert=$sql_insert."','早班','星期四')";
            }else if($datetime=="ThNiF" || $datetime== "ThNiP"){
                $sql_insert=$sql_insert."','晚班','星期四')";
            }else if($datetime=="FNoF" || $datetime== "FNoP"){
                $sql_insert=$sql_insert."','早班','星期五')";
            }else if($datetime=="FNiF" || $datetime== "FNiP"){
                $sql_insert=$sql_insert."','晚班','星期五')";
            }else if($datetime=="SaNoF" || $datetime== "SaNoP"){
                $sql_insert=$sql_insert."','早班','星期六')";
            }else if($datetime=="SaNiF" || $datetime== "SaNiP"){
                $sql_insert=$sql_insert."','晚班','星期六')";
            }else if($datetime=="SuNoF" || $datetime== "SuNoP"){
                $sql_insert=$sql_insert."','早班','星期日')";
            }else if($datetime=="SuNiF" || $datetime== "SuNiP"){
                $sql_insert=$sql_insert."','晚班','星期日')";
            }
        }
    }
    
}

require("db_link.php");


$sql_select = "select * from finalschedule";
$sql_delete = "delete from finalschedule";
$result = $link->query($sql_select);


if($row=$result->fetch_array()){
    $link->query($sql_delete);
    echo $sql_delete;
}
    
if ($link->query($sql_insert) === TRUE) {
    echo "New record created successfully";
    echo "<br>success: " . $sql_insert . "<br>" ;
}else{
    echo "Error" . $sql_insert . "<br>" . $link->error;
}


?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="0;url=./roster.php">
    </head>
    <body>
    
    </body>
</html>