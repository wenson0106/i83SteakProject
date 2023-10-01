<?php
    session_start();
    include("db_link.php");
    $order_id_sql="select order_id,order_finished from orders order by order_id ASC";
    $order_id_result=$link->query($order_id_sql);
    $i=0;
    $a=false;
    while($order_id_row=$order_id_result->fetch_array()){
        if($_SESSION['order_id'][$i]!=$order_id_row[0]){
            $a=true;
            $_SESSION['order_id'][$i]=$order_id_row[0];
            
        }
        if($_SESSION['order_finished'][$i]!=$order_id_row[1]){
            $a=true;
            $_SESSION['order_finished'][$i]=$order_id_row[1];
            
        }
        $i++;
    }
    $sql = "SELECT * FROM orders,order_list where orders.order_finished=0 and orders.order_id=order_list.order_id";
    $result = $link->query($sql);
    if($result->num_rows>0){
        while($order_row=$result->fetch_all()){
            echo json_encode(array(
                'order_row' => $order_row,
                'refresh' => $a,
            ));
        }
    }  

    $link->close();
?>           