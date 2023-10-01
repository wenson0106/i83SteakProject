<?php
    include("db_link.php");

    $order=$_POST["order_id"];
    $update_sql="update orders set order_finished=1 where order_id='".$order."'";
    $update_result = $link->query($update_sql);
?>