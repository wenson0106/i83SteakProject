<?php
    $servername = "localhost";
    $dbusername = "wenson";
    $dbpassword = "a0965658928";
    $db = "schedule";

    $link = new mysqli( $servername, $dbusername, $dbpassword, $db)or die("Error");

    $link->query("SET NAMES UTF8");
?>