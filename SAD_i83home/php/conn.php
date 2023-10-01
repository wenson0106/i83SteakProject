<?php
   $servername = "localhost";
   $username = "wenson";
   $password = "a0965658928";
   $db = "i83order_system";
   
   $link = new mysqli( $servername, $username, $password, $db)or die("Error");
   
   $link->query("SET NAMES UTF8");
?>