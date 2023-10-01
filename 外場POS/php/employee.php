<?php
    ini_set("display_errors","On");
    ini_set('mysql.connection_timeout',300);
    ini_set('default_socket_timeout',300);
    require("connect.php");

    $sql="SELECT employee_name FROM employee where employee_position='正職'";
    $sel= $conn -> query($sql);
    $result_emp1=$sel -> fetchAll(PDO::FETCH_NUM);

    $sql2="SELECT employee_name FROM employee where employee_position = '兼職' ";
    $sel2= $conn -> query($sql2);
    $result_emp0=$sel2 -> fetchAll(PDO::FETCH_NUM);
?>