<!DOCTYPE html>

<html>
  <head>
    

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script  src="../js/jquery-3.6.0.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link href="../css/style.css" rel="stylesheet"> 
    </head> 
    <body style="overflow-x:hidden;">
        <div class="container" style="position:relative;margin-top:120px;margin-bottom:150px;">
        <?php
            session_start();
            include("conn.php");
            $select_sql="select max(order_id) from orders";
            if($select_result=$link->query($select_sql)){
                $row_select=$select_result->fetch_array();
                $order_id=$row_select[0]+1;
            }else{
                $order_id=1;
            }
            $takeout_time=$_POST["takeout_time"].":00";
            $sum=$_SESSION["sum"];
            if(isset($_SESSION["meal_list"])){
                $insert_orders_sql="insert into orders values (".$order_id.",'".$_POST["phonenumber"]."','".$takeout_time."',0,".$sum.")";
                $link->query($insert_orders_sql);
                foreach($_SESSION["meal_list"] as $meal_name => $array1){
                    foreach($array1 as $fir_meal => $array2){
                        foreach($array2 as $sec_meal => $array3){
                            foreach($array3 as $meal_sauce => $array4){
                                foreach($array4 as $meal_maturity => $array5){
                                    foreach($array5 as $detail => $amount){
                                        $insert_sql="insert into order_list values ('".$order_id."','".$meal_name."','".$fir_meal."','".$sec_meal."','".$meal_sauce."','".$meal_maturity."','".$detail."',".$amount.")";
                                        $link->query($insert_sql);
                                        
                                    }
                                }
                            }
                        }
                    }
                }
                
                session_destroy();
                echo '<div style="font-size:22px;">
                    <strong>訂單成功送出</strong>
                    
                </div>
                <div style="margin:20px;">
                    <div style="border:2px solid #ddd;padding:20px;border-radius:10px;font-size:18px;">
                        電話號碼 : '.$_POST["phonenumber"].'<br>
                        取餐時間 : '.$_POST["takeout_time"].' 
                    </div>
                    <div style="text-align:center;margin:30px;">
                        <button style="border:1px solid #444444;border-radius:4px;" onclick="window.location.href='."'i83_home.php'".'">回首頁</button>
                    </div>
                </div>';
            }else{
                echo '
                <div style="font-size:22px;">
                    <strong>尚未點餐</strong>
                    
                </div>
                <div style="margin:20px;">
                    <div style="text-align:center;margin:30px;">
                        <button style="border:1px solid #444444;border-radius:4px;" onclick="window.location.href='."'i83_home.php'".'">回首頁</button>
                    </div>
                </div>';
            }
        ?>
        
            
            
        </div>            
        <div class="navbar navbar-expand-lg navbar-light" style="width:100%;position: fixed;top:0;background-image:url(../image/home_background.jpg);background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <img src="../image/i83_steakhouse.png" width="300px">
            </div>
        </div> 
        

        <div class="sticky-bottom bg-dark text-white p-1" style="height: 130px;margin-top:50px;position: fixed;bottom: 0;width:100%">
            <div class="d-none d-md-block" style="margin:20px;">
                <h6>電話：04-2265-9078</h6>
                <h6>地址：40256臺中市南區復興北路372號</h6>
                <p style="text-align:center">Copyright &copy;2021 by
                    <small>i83厚切牛排</small>
                </p>
            </div>
            <div class="d-block d-md-none" style="position: absolute; bottom: 0;width:100%;">
                <p style="font-size:13px;">電話：04-2265-9078</p>
                <p style="font-size:13px;">地址：40256臺中市南區復興北路372號</p>
                <p style="text-align:center">Copyright &copy;2021 by
                    <small>i83厚切牛排</small>
                </p>
            </div>
        </div>          
    </body>
</html>





