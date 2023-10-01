<?php
    $servername = "localhost";
    $dbusername = "wenson";
    $dbpassword = "a0965658928";
    $db = "i83order_system";

    $link = new mysqli( $servername, $dbusername, $dbpassword, $db)or die("Error");

    $link->query("SET NAMES UTF8");
?>