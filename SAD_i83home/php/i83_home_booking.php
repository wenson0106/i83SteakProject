<!DOCTYPE html>

<html>
  <head>
    <?php 
        include("conn.php");
        date_default_timezone_set("Asia/Taipei");
    ?>

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排 線上訂位</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">  
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  </head> 
  <body style="overflow-x:hidden;">
    <?php include("items/header.php");?>
    <form action="insert_booking.php" method="POST">
        <div class="container" style="margin-top:30px;">
            <div style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;width:100%">
                <div><strong>訂位時段</strong></div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4" style="margin-bottom:10px;">
                        用餐人數<br>
                        <input type="number" class="form-control" min="1" name="number"
                            placeholder="人數" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4" style="margin-bottom:10px;">
                        請選擇用餐時間<br>
                        <?php 
                            $d_min=date("Y-m-d");
                            $d_max=date("Y-m-d",strtotime(date("Y:m:d H:i:s"))+86400*6);
                        ?>
                        <div>
                            <input style="margin-top:5px;" type="date" class="form-control" name="date" placeholder="時間" min="<?php echo $d_min;?>" max="<?php echo $d_max;?>" onchange="date_set()" required>
                            <span style="margin-top:5px;">中午:<input id="noon" name="st" type="radio" onclick="time_set(0)" disabled>　晚上:<input id="night" name="st" type="radio" onclick="time_set(1)" disabled></span>
                            <input style="margin-top:5px;" type="time" id="time" class="form-control" name="time" placeholder="時間" min="" required disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:30px;">
            <div style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;width:100%">
                <div><strong>訂位人資訊</strong></div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">訂位人全名</div>
                        <div class="col-6 col-sm-6 col-md-4">
                            <input type="text" class="form-control" name="name" placeholder="姓名"  required>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4" style="padding-top:5px;padding-left:15px;">
                            <span class="d-none d-sm-block" style="font-size:16px;">
                                &nbsp<input type="radio" name="sex" value="male" required>&nbsp先生　
                                <input type="radio" name="sex" value="female">&nbsp小姐
                            </span>
                            <span class="d-block d-sm-none" style="font-size:14px;margin-top:3px;">
                                <input type="radio" name="sex" value="male" required>&nbsp先生　
                                <input type="radio" name="sex" value="female">&nbsp小姐
                            </span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12 col-sm-6 col-md-4">
                            訂位人電話號碼<br>
                            <input type="tel" class="form-control" name="tel" placeholder="電話號碼" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            備註<br>
                            <textarea class="form-control" name="detail" cols="100%" rows="5" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;resize:none;"></textarea>
                        </div>
                    </div>
                    
                    <div style="margin-top:20px;">
                        <div class="text-center">
                            <input type="submit" class="btn float- btn-primary" value="送出訂位資訊" onclick="return confirm('確定送出?\n送出後不可修改')"></button>
                        </div>
                    </div>
                </div>
            </div>      
        </div>   
    </form>
    <?php include("items/footer.php") ?>
    <script>
        function date_set(){
            var noon=document.getElementById("noon");
            var night=document.getElementById("night");
            noon.disabled=false;
            night.disabled=false;
        }
        function time_set(time){
            var t=document.getElementById("time");
            if(time==0){
                t.min="11:30";
                t.max="14:00";
            }else{
                t.min="16:30";
                t.max="21:00";
            }
            t.disabled=false;
        }
    </script>
  </body>

</html>