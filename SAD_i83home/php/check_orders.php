<!DOCTYPE html>
<?php
    date_default_timezone_set("Asia/Taipei");
    $time= date('H:i:s');
    $h=strtotime($time);
    $noon_min=strtotime('04:30:00');
    $noon_max=strtotime('14:00:00');
    $night_min=strtotime('16:30:00');
    $night_max=strtotime('21:00:00');
    if($h<$noon_min || ($h>$noon_max && $h<$night_min) || $h>$night_max){
        echo '<script>alert("不在點餐時間內\r點餐時間為\r中午11:30~14:00　晚上16:30~21:00")</script>';
        echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';
        die();
    }
    
?>
<?php
    session_start();
    $http=$_SERVER["HTTP_REFERER"];
    if($http=="http://wenson/SAD_i83home/php/check_orders.php"){
        $http="i83_home_order.php";
    }
    include("conn.php");
?>

  <head>
    

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>確認訂單</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <script  src="../js/jquery-3.6.0.min.js"></script>
    <!--bootstrap CSS-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link href="../css/style.css" rel="stylesheet"> 
    <link href="../css/check_list.css" rel="stylesheet"> 
    <!--link rel="stylesheet" href="../css/main_border.css"-->
    </head> 
    <body style="overflow-x:hidden;">
        
        <div class="container" style="position:relative;margin-top:120px;margin-bottom:150px;">
            <div>
                <p class="display-5 text-center" style="font-size:32px;">您的購物車</p> 
            </div>
            <div id="shopping_cart">
                <div style="border:2px solid #ddd;border-radius:20px;margin:5px;padding:10px;">
                    <table class="table table-condensed table-responsive main_border table-rwd">
                        <thead>
                            <tr>
                                <th style="width:50%">餐點名稱</th>
                                <th style="width:15%">備註</th>
                                <th style="width:15%">價格</th>
                                <th style="width:10%">數量</th>
                                <th style="width:10%">刪除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sum=0;
                            foreach($_SESSION["meal_list"] as $meal_name => $array1){
                                foreach($array1 as $fir_meal => $array2){
                                    foreach($array2 as $sec_meal => $array3){
                                        foreach($array3 as $meal_sauce => $array4){
                                            foreach($array4 as $meal_maturity => $array5){
                                                foreach($array5 as $detail => $amount){
                                                    
                                                    $select_meal_sql='select * from menu where menu_name like "'.$meal_name.'";';
                                                    $select_meal_result=$link->query($select_meal_sql);
                                                    $meal_row=$select_meal_result->fetch_array();
                                                    $pic=$meal_row["menu_picture"];
                                                    $menu_price=$meal_row["menu_price"];
                                                    $price=$menu_price*$amount;
                                                    if($fir_meal=="鮭魚"){
                                                        $price+=40*$amount;
                                                    }
                                                    if($sec_meal=="鮭魚"){
                                                        $price+=40*$amount;
                                                    }
                                                    $id=$meal_name.'/'.$fir_meal.'/'.$sec_meal.'/'.$meal_sauce.'/'.$meal_maturity.'/'.$detail.'/'.$price;
                                                    echo '<tr id="'.$id.'" style="justify-content:center;">
                                                        <td data-th="餐點名稱">
                                                            <div class="row">
                                                                <div class="col-md-3 text-left img_center">
                                                                    <img src="'.$pic.'"
                                                                        class="img-fluid rounded mb-2 shadow img_size">
                                                                </div>
                                                                <div class="col-md-9 text-left mt-sm-2">
                                                                    <p style="font-size:18px;"><strong>'.$meal_name.'</strong></p>';
                                                                    if($fir_meal!=""){
                                                                        echo '<small class="font-weight-light">'.$fir_meal.'+'.$sec_meal.'</small><br>';
                                                                    }
                                                                    if($meal_sauce!=""){
                                                                        echo '<small class="font-weight-light">'.$meal_maturity.'</small>&nbsp';
                                                                    }
                                                                    echo '<small class="font-weight-light">'.$meal_sauce.'</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td data-th="備註" style="vertical-align: middle;">
                                                            <strong>'.$detail.'</strong>
                                                        </td>
                                                        <td data-th="價格" style="vertical-align: middle;">
                                                            <input type="hidden" id="'.$id.'_price" value="'.$price.'">
                                                            <strong>$&nbsp'.$price.'</strong>
                                                        </td>
                                                        <td data-th="數量" style="vertical-align: middle;">
                                                            <strong>'.$amount.'</strong>
                                                        </td>
                                                        <td data-th="刪除" style="vertical-align: middle;">
                                                            <div class="delete_btn">
                                                                <button class="btn btn-outline-secondary btn-md mb-2 del" value="'.$id.'" onclick="delete_meal('."'".$id."'".')">
                                                                    <img src="../image/trash.png">
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                    $sum=$sum+$price;
                                                    $_SESSION["sum"]=$sum;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot style="width:100%;">
                            <tr>
                                <td colspan="5">
                                    <input type="hidden" id="sum" value="<?php echo $sum;?>">
                                    <strong style="float:right;" id="htm_sum">總共 : <?php echo $sum;?> 元</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
            <div class="row">
                <div class="col12">
                    <a data-bs-toggle="modal" data-bs-target="#guest_imfo" id="next" class="btn btn-primary mb-4" style="float:right;">下一步</a>
                    <a href="<?php echo $http;?>" style="float:left;" class="btn btn-outline-primary">繼續點餐</a>
                </div>
                
            </div>
        </div>
        <?php
            if(!isset($_SESSION['sum'])){
                echo '<script>
                $("#shopping_cart").html("<div style='."'margin-bottom:50px;font-size:24px;'".'><strong>尚未點餐</strong></div>");
                var next = document.getElementById("next"); 
                next.style.display="none";
                </script>';
            }else{
                if($_SESSION['sum']==0){
                    echo '<script>
                    $("#shopping_cart").html("<div style='."'margin-bottom:50px;font-size:24px;'".'><strong>尚未點餐</strong></div>");
                    var next = document.getElementById("next"); 
                    next.style.display="none";
                </script>';
                }
            }
        ?>

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

        <div class="modal fade" id="guest_imfo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="./send_orders.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><strong>聯絡資訊</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="padding:10px;margin:15px;border:2px solid #ddd;border-radius:10px;">
                                <div class="col-12">
                                    <strong>訂餐人電話號碼</strong><br>
                                    <input type="tel" class="form-control" name="phonenumber" placeholder="電話號碼" oninput = "value=value.replace(/[^\d]/g,'')" required>
                                </div>
                                <div class="col-12" style="margin-top:15px;">
                                    <select class="form-select" id="takeout_time" name="takeout_time" style="width:150px;" onchange="takeout()">
                                        <option selected disabled="disabled"  style="display: none">取餐時間</option>
                                        <?php
                                        if($h>=$noon_min && $h<=$noon_max){
                                            for($i=$noon_min;$i<=$noon_max;$i+=900){
                                                if($h<$i){
                                                    echo '<option value="'.date('H:i',$i).'">'.date('H:i',$i).'</option>';
                                                }  
                                            }
                                        }
                                        if($h>=$night_min && $h<=$night_max){
                                            for($i=$night_min;$i<=$night_max;$i+=900){
                                                if($h<$i){
                                                    echo '<option value="'.date('H:i',$i).'">'.date('H:i',$i).'</option>';
                                                }  
                                            }
                                        }    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="order" value="送出訂單" disabled>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <script>
            function delete_meal(id){
                var el = document.getElementById(id);
                var price = document.getElementById(id+'_price');
                var sum = document.getElementById("sum"); 
                var next = document.getElementById("next");        
                p=sum.value-price.value;
                sum.value=p;
                if(p==0){
                    next.style.display="none";
                    
                    $("#shopping_cart").html("<div style='margin-bottom:50px;font-size:24px;'><strong>尚未點餐</strong></div>");
                }else{
                    var htm="總共 :"+p+" 元";
                    $('#htm_sum').html(htm);
                }
                

                el.parentNode.removeChild(el);
                var key=sessionStorage.removeItem(key);

                
            }
        </script>
        
        <script>
            $(document).on('click','.del',function(){
                var value=$(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax_unset_order_session.php",
                    dataType: "json", 
                    data:{
                        menu_id:value,
                    },
                    success: function() {                
                    }
                })
            })
        </script>
        <script>
            function takeout(){
                var time=document.getElementById('takeout_time').value;
            
                if(time!="取餐時間"){
                    
                    document.getElementById('order').disabled=false;
                }
            }
        </script>
         
    </body>

</html>






