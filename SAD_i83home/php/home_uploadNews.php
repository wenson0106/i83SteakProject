<?php
    $newsTitle=$_POST["newsTitle"];
    $newsBody=$_POST["newsBody"];
    include("conn.php");

    $date=date("Y-m-d");
    $select_sql="select * from news";
    $select_result=$link->query($select_sql);
    while($select_row=$select_result->fetch_array()){
        if($select_row[1]==$newsTitle){
            echo '<meta http-equiv="refresh" content="0;url=./i83_home.php?n=最新消息標題重複">';
        }
    }


    $insert_news_sql='insert into news values ("'.$date.'","'.$newsTitle.'","'.$newsBody.'");';
    
    if ($link->query($insert_news_sql) === TRUE) {
        echo "成功新增一條記錄";
    }else{
        die('Error');
    }
    echo '<meta http-equiv="refresh" content="0;url=./i83_home.php?n=新增成功">';
?>