<?php
    ini_set("display_errors","On");
    ini_set('mysql.connection_timeout',300);
    ini_set('default_socket_timeout',300);
    require("connect.php");

    $sql="SELECT employee_name FROM employee ";
    $select= $conn -> query($sql);    
    $result=$select -> fetchAll(PDO::FETCH_NUM);

    $sql2="SELECT employee_name FROM employee where employee_position='老闆' ";
    $select2= $conn -> query($sql2);
    $result3=$select2 -> fetch(PDO::FETCH_ASSOC);
?>