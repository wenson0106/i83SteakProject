<?php
    include("sql_injection.php");
    ini_set("display_errors", "On");
    ini_set('mysql.connection_timeout', 300);
    ini_set('default_socket_timeout', 300);
    require("connect.php");
    //刪除
    $drop_employ = $_POST['allow_name'];
    $sql = " DELETE FROM employee WHERE employee_name='" . $drop_employ . "'";
    $result_drop = $conn->exec($sql);
    echo "<script>";
    echo "self.location=document.referrer";
    echo "</script>";
    //刪除

    ?>
