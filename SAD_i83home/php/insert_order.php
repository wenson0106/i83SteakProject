<?php
    session_start();
    if(isset($_POST["meal_name"])){
        $meal_name=$_POST["meal_name"];
        if(isset($_POST["first_meal"])){
            $fir_meal=$_POST["first_meal"];
        }else{
            $fir_meal="";
        }
        if(isset($_POST["meal_maturity"])){
            $meal_maturity=$_POST["meal_maturity"];
        }else{
            $meal_maturity="";
        }
        if(isset($_POST["meal_sauce"])){
            $meal_sauce=$_POST["meal_sauce"];
        }else{
            $meal_sauce="";
        }
        if(isset($_POST["detail"])){
            $detail=$_POST["detail"];
        }else{
            $detail="";
        }
        if(isset($_POST["sec_meal"])){
            $sec_meal=$_POST["sec_meal"];
        }else{
            $sec_meal="";
        }
        if(isset($_POST["amount"])){
            $amount=$_POST["amount"];
        }else{
            $amount=1;
        }



        if(!isset($_SESSION["meal_list"][$meal_name][$fir_meal][$sec_meal][$meal_sauce][$meal_maturity][$detail])){
            $_SESSION["meal_list"][$meal_name][$fir_meal][$sec_meal][$meal_sauce][$meal_maturity][$detail]=$amount;
        }else{
            $_SESSION["meal_list"][$meal_name][$fir_meal][$sec_meal][$meal_sauce][$meal_maturity][$detail]+=$amount;
        }
        $http=$_SERVER["HTTP_REFERER"];
        
    }  
?>
<meta http-equiv="refresh" content="0;url=<?php echo $http;?>">