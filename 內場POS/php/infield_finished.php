<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>員工</title>
<meta charset="UTF-8">
<!-- 響應式網站 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Boostrap 導入程式 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<!--css連結-->
<!--link rel="stylesheet" herf="style.css"-->
<script  src="../js/jquery-3.6.0.min.js"></script>
</head>


<?php
    include("db_link.php");

    $count=0;
    $sql_count="select count(*) from orders where order_finished=1";
    $count_result = $link->query($sql_count);
    if($count_row=$count_result->fetch_array()){
        $count=$count_row[0];
    }
    $max_page=($count-1)/8+1.01;
    if(!isset($_GET["page"]) || $_GET["page"]<1 || $_GET["page"]>$max_page){
        $page=1;
    }else{
        $page=$_GET["page"];
    }
    $number=8*($page-1);
    $order_sql="select * from orders where order_finished=1 limit ".$number.",8";
    $order_result = $link->query($order_sql);

?>



    <body style="overflow:hidden">

<div class="row align-items-center" style="height:4vh;background-color:#7B8B6F;">
    <div class="col-md-12" style="color: white;">
            <h6 class="text-center" style="font-family:cursive;">已完成訂單</h6>
    </div>
</div>
    <div class="row">
        <div class="col-md-11" style="background-color:#edece5">
        <div class="row" id="good">
            <?php
            $i=1;
            while($row=$order_result->fetch_array()){
            echo'<div class="col-md-3" style="height:48vh;">
                <div style="margin:10px;">
                    <div class="main_border" style="background-color:#666666;padding:10px;">
                        <h2 class="h5 font-weight-bold text-left font-italic" style="height:4vh;font-size:24px;color: white;margin-bottom:15px;">'.$row[0].'
                        </h2>
                        <div style="overflow:auto;height:36vh;padding:3px;">';
                        $list_sql="select * from order_list";
                        $list_result=$link->query($list_sql);
                        while($rows=$list_result->fetch_array()){
                        if($rows[0]==$row[0]){
                        echo'
                        <figure class="rounded p-1 bg-white shadow-sm fig">
                            <div style="text-align:right;color:red;"><strong>數量&nbsp:&nbsp'.$rows[7].'</strong></div>
                            <div style="text-align:right;font-size:20px;color:black;"><strong>'.$rows[1].'</strong></div>';
                                if($rows[2]!=null){
                                    echo'
                                    <div style="text-align:right;font-size:14px;color:black;">'.$rows[2].'+'.$rows[3].'</div>';}
                                if($rows[4]!=null){
                                    echo'
                                    <div style="text-align:right;font-size:14px;color:black;">'.$rows[4].'</div>';}
                                if($rows[5]!=null){
                                    echo'
                                    <div style="text-align:right;font-size:14px;color:black;">'.$rows[5].'</div>';}
                                if($rows[6]!=null){
                                    echo'
                                    <div style="text-align:right;font-size:14px;color:black;border-top:1px solid #ddd;text-align: left;;">'.$rows[6].'</div>';}
                            echo'                            
                        </figure>'
                        ;}}
                        echo'
                        </div>
                    </div>
                    </div>
                </div>';
            }
            ?>
        </div>
        </div>        

        <div class="col-md-1 bg-opacity"style="height:96vh;background-color:#d4c0a6">
            <div style="width:220px;height:30vh"></div>
            <div style="width:220px;height:5vh">
                <?php
                if($page>1){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'">上一頁</a></li>';
                }
                ?>
            </div>
               
            <div style="width:220px;height:5vh">
                <?php 
                if($page+1<$max_page){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'">下一頁</a></li>';
                }
              ?>
            </div>
            <div style="width:220px;height:30vh"></div>
            <div style="width:220px;height:10vh;">
                <button type="button" onclick="location.href='infield_not_finished.php'" class="btn" style="background-color:#6a634c80;"><a  style="color:white;font-size:30px;">訂單</a></button>
        </div>

    </div>
            </body>
    

        <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    
    </body>   
</html>  
