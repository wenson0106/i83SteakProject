<?php
    session_start();
    
    unset($_SESSION["schedule"]["FNiF"]);

    if(isset($_POST["schedule"])){
        foreach($_POST["schedule"] as $datetime => $s){
            foreach($s as $n => $name){
                $_SESSION["schedule"][$datetime][$n]=$name;
            }
        }
    }
    echo '<meta http-equiv="refresh" content="0;url=../roster.php">';  

?>