<?php
    $link=array(
        'host' => "localhost",
        'account' => "wenson",
        'password' => "a0965658928",
        'dbname' => "schedule"
    );

    $con = 'mysql:host='.$link['host'].';dbname='.$link['dbname'];

    try{
        $conn=new PDO($con,$link['account'],$link['password']);
        $conn -> query("SET NAMES 'utf8'");
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e){
        echo "Connection failed: ".$e->getMessage();
        exit();
    }
?>