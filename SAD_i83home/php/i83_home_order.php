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
<html>
  <head>
    <?php 
        include("conn.php");
        $Individual_meal_sql="select * from menu where menu_class like '單打獨鬥區'";
        $Individual_meal_result=$link->query($Individual_meal_sql);
    
        $Multiple_meal_sql="select * from menu where menu_class like '分合進擊區'";
        $Multiple_meal_result=$link->query($Multiple_meal_sql);

        $Rice_meal_sql="select * from menu where menu_class like '米食區'";
        $Rice_meal_result=$link->query($Rice_meal_sql);

        $Dessert_meal_sql="select * from menu where menu_class like '游擊區'";
        $Dessert_meal_result=$link->query($Dessert_meal_sql);
    ?>

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排 外帶點餐</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">   
    <link href="../css/style.css" rel="stylesheet"> 
  </head> 
  <body style="overflow-x: hidden">
    <?php include("items/header.php");?>
    <div style="z-index:1000;box-shadow:1px 1px 5px gray;padding:3px;background-color:#f85140fc;right:20px;margin-top:20px;padding:10px;border-radius:15px;width:100px;height:120px;position:fixed;text-align:center;" onclick="location.href='check_orders.php';">
        <img src="../image/hand.png" style="width:100%;">
        <span>
            <strong>前往結帳</strong>
        </span>
    </div>
    <div class="tab-pane">
        <div class="row p-1 align-items-center">
            <div class="col-sm-12 col-md-8 p-1 offset-md-2" style="background: #444444;border:1px solid #000000;">
                <ul class="nav nav-tabs">
                    <li class="nav-item" style="width: 25%;text-align: center;">
                        <a class="nav-link active" data-bs-toggle="tab" href="#Individual"><strong class="d-none d-sm-block">單打獨鬥區</strong><strong class="d-block d-sm-none" style="font-size:13px;">單打獨鬥區</strong></a>
                    </li>
                    <li class="nav-item" style="width: 25%;text-align: center;">
                        <a class="nav-link" data-bs-toggle="tab" href="#Multiple"><strong class="d-none d-sm-block">分合進擊區</strong><strong class="d-block d-sm-none" style="font-size:13px;">分合進擊區</strong></a>
                    </li>
                    <li class="nav-item" style="width: 25%;text-align: center;">
                        <a class="nav-link" data-bs-toggle="tab" href="#Rice"><strong class="d-none d-sm-block">米食區</strong><strong class="d-block d-sm-none" style="font-size:13px;">米食區　　</strong></a>
                    </li>
                    <li class="nav-item" style="width: 25%;text-align: center;">
                        <a class="nav-link" data-bs-toggle="tab" href="#Dessert"><strong class="d-none d-sm-block">游擊區</strong><strong class="d-block d-sm-none" style="font-size:13px;">游擊區　　</strong></a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content">
            <div id="Individual" class="tab-pane active">
                <div class="row">
                    <div class="col-md-8 offset-md-2" style="padding: 10px;">
                        <div class="row" style="padding: 10px;">
                        <?php
                            while($Individual_meal_row=$Individual_meal_result->fetch_array()){
                                echo '<div class="col-12 col-sm-4 col-md-6 col-lg-4 d-sm-block" style="padding: 10px;">
                                <div style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
                                    <div class="rounded p-1 bg-white shadow-sm">
                                        <img src="'.$Individual_meal_row["menu_picture"].'" class="card-img-top" style="width: 100%;">
                                        <div class="p-1 card-img-bottom">
                                            <div class="font-weight-bold font-italic">
                                                <span class="d-none d-sm-block" style="font-size:18px;"><strong>'.$Individual_meal_row["menu_name"].'</strong></span>
                                                <span class="d-block d-sm-none" style="font-size:14px;"><strong>'.$Individual_meal_row["menu_name"].'</strong></span>
                                            </div>
                                            <div class="d-sm-none font-weight-bold" style="font-style:italic;font-size:12px;height:30px;">'.$Individual_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block font-weight-bold" style="font-style:italic;font-size:12px;">'.$Individual_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block text-small text-muted font-italic" style="width:100%;margin-bottom:20px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Individual_meal_row["menu_price"].'　
                                                        <div style="width:65px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Individual_meal_row["menu_class"].'_'.$Individual_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;"> 點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-none text-small text-muted font-italic" style="width:100%;margin-top:5px;margin-bottom:25px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Individual_meal_row["menu_price"].'&nbsp&nbsp
                                                        <div style="width:60px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Individual_meal_row["menu_class"].'_'.$Individual_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;">點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        ?>  
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $Individual_meal_result=$link->query($Individual_meal_sql);
                $i=0;
                while($Individual_meal_row=$Individual_meal_result->fetch_array()){
                    $i++;
                    echo '<div class="modal fade" id="meal_'.$Individual_meal_row["menu_class"].'_'.$Individual_meal_row["menu_id"].'" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="insert_order.php" method="POST">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="color:#666666;"><strong>'.$Individual_meal_row["menu_name"].'</strong></h5>
                          </div>
                          <div class="modal-body" style="padding: 10px;">
                            <div>
                                <div style="border:2px solid #ddd;border-radius:10px;padding:10px;margin-bottom:20px;">
                                    <img src="'.$Individual_meal_row["menu_picture"].'" alt="image1" class="card-img-top">
                                </div>';
                                if($Individual_meal_row["can_choose_maturity"]==1){
                                echo '<strong>熟度</strong>
                                <div class="container">
                                    <table class="p-2">
                                        <tr>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="一分熟"
                                                    name="meal_maturity" id="Individual_Blue_'.$i.'" required>
                                                <label class="check-label" for="Individual_Blue_'.$i.'">
                                                    <small>一分</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="三分熟"
                                                    name="meal_maturity" id="Individual_Rare_'.$i.'">
                                                <label class="check-label" for="Individual_Rare_'.$i.'">
                                                    <small>三分</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="五分熟"
                                                    name="meal_maturity" id="Individual_Medium_'.$i.'">
                                                <label class="check-label" for="Individual_Medium_'.$i.'">
                                                    <small>五分</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="七分熟"
                                                    name="meal_maturity" id="Individual_Medium_Well_'.$i.'">
                                                <label class="check-label" for="Individual_Medium_Well_'.$i.'">
                                                    <small>七分</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="全熟"
                                                    name="meal_maturity" id="Individual_Well_Done_'.$i.'">
                                                <label class="check-label" for="Individual_Well_Done_'.$i.'">
                                                    <small>全熟</small>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>';
                                }
                                echo '<strong>醬料</strong>
                                <div class="container">
                                    <table class="p-2">
                                        <tr>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="黑胡椒醬"
                                                    name="meal_sauce" id="Individual_Mushroom_'.$i.'" required>
                                                <label class="check-label" for="Individual_Mushroom_'.$i.'">
                                                    <small>黑胡椒</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="蘑菇醬"
                                                    name="meal_sauce" id="Individual_Black_Pepper_'.$i.'">
                                                <label class="check-label" for="Individual_Black_Pepper_'.$i.'">
                                                    <small>蘑菇</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="綜合醬"
                                                    name="meal_sauce" id="Individual_Mix_'.$i.'">
                                                <label class="check-label" for="Individual_Mix_'.$i.'">
                                                    <small>綜合</small>
                                                </label>
                                            </td>
                                            <td style="width:82px;">
                                                <input class="check-input" type="radio" value="不加醬"
                                                    name="meal_sauce" id="Individual_No_Sauce_'.$i.'">
                                                <label class="check-label" for="Individual_No_Sauce_'.$i.'">
                                                    <small>不加醬</small>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            
                                <strong>備註</strong>
                                <div class="row p-2">
                                    <textarea class="form-control" name="detail" cols="100%" rows="5" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;"></textarea>
                                </div>
                            </div>
                          </div>
                          <input type="hidden" name="meal_name" value="'.$Individual_meal_row["menu_name"].'">
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-danger" value="加入購物車">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>';
                }
            ?>

            <div id="Multiple" class="tab-pane">
                <div class="row">
                    <div class="col-md-8 offset-md-2" style="padding: 10px;">
                        <div class="row" style="padding: 10px;">
                        <?php
                            while($Multiple_meal_row=$Multiple_meal_result->fetch_array()){
                                echo '<div class="col-12 col-sm-4 col-md-6 col-lg-4 d-sm-block" style="padding: 10px;">
                                <div style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
                                    <div class="rounded p-1 bg-white shadow-sm">
                                        <img src="'.$Multiple_meal_row["menu_picture"].'" alt="image1" class="card-img-top" style="width: 100%;">
                                        <div class="p-1 card-img-bottom">
                                            <div class="font-weight-bold font-italic">
                                                <span style="font-size:18px;"><strong>'.$Multiple_meal_row["menu_name"].'</strong></span>
                                            </div>
                                            <div class="d-sm-none font-weight-bold" style="font-size:12px;height:30px;margin-bottom:2px;">'.$Multiple_meal_row["menu_detail"].'</div>
                                            <div class="d-none d-sm-block font-weight-bold" style="font-size:12px;margin-bottom:2px;">'.$Multiple_meal_row["menu_detail"].'</div>
                                            <div class="d-sm-none font-weight-bold" style="font-style:italic;font-size:12px;height:30px;">'.$Multiple_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block font-weight-bold" style="font-style:italic;font-size:12px;">'.$Multiple_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block text-small text-muted font-italic" style="width:100%;margin-bottom:20px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Multiple_meal_row["menu_price"].'　
                                                        <div style="width:65px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Multiple_meal_row["menu_class"].'_'.$Multiple_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;"> 點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-none text-small text-muted font-italic" style="width:100%;margin-top:5px;margin-bottom:25px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Multiple_meal_row["menu_price"].'&nbsp&nbsp
                                                        <div style="width:60px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Multiple_meal_row["menu_class"].'_'.$Multiple_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;">點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        ?>  
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $Multiple_meal_result=$link->query($Multiple_meal_sql);
                while($Multiple_meal_row=$Multiple_meal_result->fetch_array()){
                    $i++;
                    if($Multiple_meal_row["double_meal"]==1){
                        echo '<div class="modal fade" id="meal_'.$Multiple_meal_row["menu_class"].'_'.$Multiple_meal_row["menu_id"].'" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <form action="insert_order.php" method="POST">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" style="color:#666666;"><strong>'.$Multiple_meal_row["menu_name"].'</strong></h5>
                              </div>
                              <div class="modal-body" style="padding: 10px;">
                                <div style="margin:20px;">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6" style="border:2px solid #ddd;border-radius:10px;padding:10px;margin-bottom:20px;">
                                            <img src="'.$Multiple_meal_row["menu_picture"].'" class="card-img-top">
                                        </div>
                                        <div class="col-xs-12 col-sm-6" style="padding-right:10px;">';
                                            $double_meal_sql="select * from double_meal where meal_name like '".$Multiple_meal_row["menu_name"]."'";
                                            $double_meal_result=$link->query($double_meal_sql);
                                            echo '<div style="border:2px solid #ddd;border-radius:10px;padding:20px;">
                                                <div>'.$Multiple_meal_row["menu_detail"].'</div>';
                                            if($double_meal_row=$double_meal_result->fetch_array()){
                                                $first_meal_choose=explode(",",$double_meal_row["first_meal"]);
                                                $second_meal_choose=explode(",",$double_meal_row["second_meal"]);
                                                echo '<div style="margin-top:10px;margin-bottom:10px;">
                                                <select class="form-select" id="fir_'.$double_meal_row["meal_name"].'" name="first_meal" style="width:150px;" onchange="select_req(';echo "'".$double_meal_row[0]."','".$double_meal_row[3]."'".')">
                                                    <option selected disabled="disabled"  style="display: none">請選擇</option>';
                                                foreach($first_meal_choose as $first_meal){
                                                    $meal=explode("/",$first_meal);
                                                    echo '<option value="'.$meal[0].'">'.$meal[0];
                                                    if($meal[1]!="0"){
                                                        echo '　+'.$meal[1].'元';
                                                    }
                                                    echo '</option>';
                                                }
                                                echo '</select></div>';
                                                echo '<div style="margin-top:10px;margin-bottom:10px;">
                                                <select class="form-select" id="sec_'.$double_meal_row["meal_name"].'" name="sec_meal" style="width:150px;" onchange="select_req(';echo "'".$double_meal_row[0]."','".$double_meal_row[3]."'".')">
                                                    <option selected disabled="disabled"  style="display: none">請選擇</option>';
                                                foreach($second_meal_choose as $second_meal){
                                                    $meal=explode("/",$second_meal);
                                                    echo '<option value="'.$meal[0].'">'.$meal[0];
                                                    if($meal[1]!="0"){
                                                        echo '　+'.$meal[1].'元';
                                                    }
                                                    echo '</option>';
                                                }
                                                echo '</select>
                                                </div>
                                                </div>';
                                            }
                                        echo '</div>
                                    </div>
                                    <div id="maturity_'.$Multiple_meal_row["menu_name"].'" style="display:none;">
                                        <strong>熟度</strong>
                                        <div class="container">
                                            <table class="p-2">
                                                <tr>
                                                    <td style="width:82px;">
                                                        <input class="check-input" type="radio" value="一分熟"
                                                            name="meal_maturity" id="Multiple_Blue_'.$Multiple_meal_row["menu_name"].'">
                                                        <label class="check-label" for="Multiple_Blue_'.$Multiple_meal_row["menu_name"].'">
                                                            <small>一分</small>
                                                        </label>
                                                    </td>
                                                    <td style="width:82px;">
                                                        <input class="check-input" type="radio" value="三分熟"
                                                            name="meal_maturity" id="Multiple_Rare_'.$Multiple_meal_row["menu_name"].'">
                                                        <label class="check-label" for="Multiple_Rare_'.$Multiple_meal_row["menu_name"].'">
                                                            <small>三分</small>
                                                        </label>
                                                    </td>
                                                    <td style="width:82px;">
                                                        <input class="check-input" type="radio" value="五分熟"
                                                            name="meal_maturity" id="Multiple_Medium_'.$Multiple_meal_row["menu_name"].'">
                                                        <label class="check-label" for="Multiple_Medium_'.$Multiple_meal_row["menu_name"].'">
                                                            <small>五分</small>
                                                        </label>
                                                    </td>
                                                    <td style="width:82px;">
                                                        <input class="check-input" type="radio" value="七分熟"
                                                            name="meal_maturity" id="Multiple_Medium_Well_'.$Multiple_meal_row["menu_name"].'">
                                                        <label class="check-label" for="Multiple_Medium_Well_'.$Multiple_meal_row["menu_name"].'">
                                                            <small>七分</small>
                                                        </label>
                                                    </td>
                                                    <td style="width:82px;">
                                                        <input class="check-input" type="radio" value="全熟"
                                                            name="meal_maturity" id="Multiple_Well_Done_'.$Multiple_meal_row["menu_name"].'">
                                                        <label class="check-label" for="Multiple_Well_Done_'.$Multiple_meal_row["menu_name"].'">
                                                            <small>全熟</small>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <strong>醬料</strong>
                                    <div class="container">
                                        <table class="p-2">
                                            <tr>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="黑胡椒醬"
                                                        name="meal_sauce" id="Multiple_Mushroom_'.$i.'" required>
                                                    <label class="check-label" for="Multiple_Mushroom_'.$i.'">
                                                        <small>黑胡椒</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="蘑菇醬"
                                                        name="meal_sauce" id="Multiple_Black_Pepper_'.$i.'">
                                                    <label class="check-label" for="Multiple_Black_Pepper_'.$i.'">
                                                        <small>蘑菇</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="綜合醬"
                                                        name="meal_sauce" id="Multiple_Mix_'.$i.'">
                                                    <label class="check-label" for="Multiple_Mix_'.$i.'">
                                                        <small>綜合</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="不加醬"
                                                        name="meal_sauce" id="Multiple_No_Sauce_'.$i.'">
                                                    <label class="check-label" for="Multiple_No_Sauce_'.$i.'">
                                                        <small>不加醬</small>
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                
                                    <strong>備註</strong>
                                    <div class="row p-2">
                                        <textarea class="form-control" name="detail" cols="100%" rows="5" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;"></textarea>
                                    </div>
                                </div>
                              </div>
                              <input type="hidden" name="meal_name" value="'.$Multiple_meal_row["menu_name"].'">
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" id="enter_'.$Multiple_meal_row["menu_name"].'" value="加入購物車" disabled>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>'; 
                    }else{
                        echo '<div class="modal fade" id="meal_'.$Multiple_meal_row["menu_class"].'_'.$Multiple_meal_row["menu_id"].'" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                          <form action="insert_order.php" method="POST">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" style="color:#666666;"><strong>'.$Multiple_meal_row["menu_name"].'</strong></h5>
                              </div>
                              <div class="modal-body" style="padding: 10px;">
                                <div style="margin:20px;">
                                    <div style="border:2px solid #ddd;border-radius:10px;padding:10px;">
                                        <img src="'.$Multiple_meal_row["menu_picture"].'" alt="image1" class="card-img-top">
                                    </div>';
                                    if($Multiple_meal_row["can_choose_maturity"]==1 && $Multiple_meal_row["double_meal"]==0){
                                    echo '<strong>熟度</strong>
                                    <div class="container">
                                        <table class="p-2">
                                            <tr>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="一分熟"
                                                        name="meal_maturity" id="Multiple_Blue_'.$i.'" required>
                                                    <label class="check-label" for="Multiple_Blue_'.$i.'">
                                                        <small>一分</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="三分熟"
                                                        name="meal_maturity" id="Multiple_Rare_'.$i.'">
                                                    <label class="check-label" for="Multiple_Rare_'.$i.'">
                                                        <small>三分</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="五分熟"
                                                        name="meal_maturity" id="Multiple_Medium_'.$i.'">
                                                    <label class="check-label" for="Multiple_Medium_'.$i.'">
                                                        <small>五分</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="七分熟"
                                                        name="meal_maturity" id="Multiple_Medium_Well_'.$i.'">
                                                    <label class="check-label" for="Multiple_Medium_Well_'.$i.'">
                                                        <small>七分</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="全熟"
                                                        name="meal_maturity" id="Multiple_Well_Done_'.$i.'">
                                                    <label class="check-label" for="Multiple_Well_Done_'.$i.'">
                                                        <small>全熟</small>
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>';
                                    }
                                    echo '<strong>醬料</strong>
                                    <div class="container">
                                        <table class="p-2">
                                            <tr>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="黑胡椒醬"
                                                        name="meal_sauce" id="Multiple_Mushroom_'.$i.'" required>
                                                    <label class="check-label" for="Multiple_Mushroom_'.$i.'">
                                                        <small>黑胡椒</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="蘑菇醬"
                                                        name="meal_sauce" id="Multiple_Black_Pepper_'.$i.'">
                                                    <label class="check-label" for="Multiple_Black_Pepper_'.$i.'">
                                                        <small>蘑菇</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="綜合醬"
                                                        name="meal_sauce" id="Multiple_Mix_'.$i.'">
                                                    <label class="check-label" for="Multiple_Mix_'.$i.'">
                                                        <small>綜合</small>
                                                    </label>
                                                </td>
                                                <td style="width:82px;">
                                                    <input class="check-input" type="radio" value="不加醬"
                                                        name="meal_sauce" id="Multiple_No_Sauce_'.$i.'">
                                                    <label class="check-label" for="Multiple_No_Sauce_'.$i.'">
                                                        <small>不加醬</small>
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                
                                    <strong>備註</strong>
                                    <div class="row p-2">
                                        <textarea class="form-control" name="detail" cols="100%" rows="5" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;"></textarea>
                                    </div>
                                </div>
                              </div>
                              <input type="hidden" name="meal_name" value="'.$Multiple_meal_row["menu_name"].'">
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" value="加入購物車">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>'; 
                    }
                    
                }
            ?>

            <div id="Rice" class="tab-pane">
                <div class="row">
                    <div class="col-md-8 offset-md-2" style="padding: 10px;">
                        <div class="row" style="padding: 10px;">
                        <?php
                            while($Rice_meal_row=$Rice_meal_result->fetch_array()){
                                echo '<div class="col-12 col-sm-4 col-md-6 col-lg-4 d-sm-block" style="padding: 10px;">
                                <div style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
                                    <div class="rounded p-1 bg-white shadow-sm">
                                        <img src="'.$Rice_meal_row["menu_picture"].'" alt="image1" class="card-img-top" style="width: 100%;">
                                        <div class="p-1 card-img-bottom">
                                            <div class="font-weight-bold font-italic">
                                                <span style="font-size:18px;"><strong>'.$Rice_meal_row["menu_name"].'</strong></span>
                                            </div>
                                            <div class="d-sm-none font-weight-bold" style="font-style:italic;font-size:12px;height:30px;">'.$Rice_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block font-weight-bold" style="font-style:italic;font-size:12px;">'.$Rice_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block text-small text-muted font-italic" style="width:100%;margin-bottom:20px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Rice_meal_row["menu_price"].'　
                                                        <div style="width:65px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Rice_meal_row["menu_class"].'_'.$Rice_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;"> 點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-none text-small text-muted font-italic" style="width:100%;margin-top:5px;margin-bottom:25px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Rice_meal_row["menu_price"].'&nbsp&nbsp
                                                        <div style="width:60px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Rice_meal_row["menu_class"].'_'.$Rice_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;">點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        ?>  
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $Rice_meal_result=$link->query($Rice_meal_sql);
                while($Rice_meal_row=$Rice_meal_result->fetch_array()){
                    echo '<div class="modal fade" id="meal_'.$Rice_meal_row["menu_class"].'_'.$Rice_meal_row["menu_id"].'" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="insert_order.php" method="POST">
                        <div class="modal-content">
                          <div class="modal-header" style="">
                            <h5 class="modal-title"><strong>'.$Rice_meal_row["menu_name"].'</strong></h5>
                          </div>
                          <div class="modal-body" style="padding: 10px;">
                            <div>
                                <div style="border:2px solid #ddd;border-radius:10px;padding:10px;margin-bottom:20px;">
                                    <img src="'.$Rice_meal_row["menu_picture"].'" alt="image1" class="card-img-top">
                                </div>
                                <strong>數量</strong>
                                <div class="p-2">
                                    <input type="number" name="amount" value="1" style="color:#666666;border:2px solid #ddd;border-radius:5px;-webkit-appearance: block;" min="1" max="20">
                                </div>
                                <strong>備註</strong>
                                <div class="p-2">
                                    <textarea class="form-control" name="detail" cols="100%" rows="5" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;"></textarea>
                                </div>
                            </div>
                          </div>
                          <input type="hidden" name="meal_name" value="'.$Rice_meal_row["menu_name"].'">
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-danger" value="加入購物車">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>';
                }
            ?>
            
            <div id="Dessert" class="tab-pane">
                <div class="row">
                    <div class="col-md-8 offset-md-2" style="padding: 10px;">
                        <div class="row" style="padding: 10px;">
                        <?php
                            while($Dessert_meal_row=$Dessert_meal_result->fetch_array()){
                                echo '<div class="col-12 col-sm-4 col-md-6 col-lg-4 d-sm-block" style="padding: 10px;">
                                <div style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
                                    <div class="rounded p-1 bg-white shadow-sm">
                                        <img src="'.$Dessert_meal_row["menu_picture"].'" alt="image1" class="card-img-top" style="width: 100%;">
                                        <div class="p-1 card-img-bottom">
                                            <div class="font-weight-bold font-italic">
                                                <span style="font-size:18px";><strong>'.$Dessert_meal_row["menu_name"].'</strong></span>
                                            </div>
                                            <div class="d-sm-none font-weight-bold" style="font-style:italic;font-size:12px;height:30px;">'.$Dessert_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block font-weight-bold" style="font-style:italic;font-size:12px;">'.$Dessert_meal_row["menu_description"].'</div>
                                            <div class="d-none d-sm-block text-small text-muted font-italic" style="width:100%;margin-bottom:20px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Dessert_meal_row["menu_price"].'　
                                                        <div style="width:65px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Dessert_meal_row["menu_class"].'_'.$Dessert_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;"> 點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-sm-none text-small text-muted font-italic" style="width:100%;margin-top:5px;margin-bottom:25px;">
                                                <div style="float:right;">
                                                    <div style="display: flex;">
                                                        $'.$Dessert_meal_row["menu_price"].'&nbsp&nbsp
                                                        <div style="width:60px;height:23px;border-radius:5px;background-color:#A42D00;color:white;text-align:center;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#meal_'.$Dessert_meal_row["menu_class"].'_'.$Dessert_meal_row["menu_id"].'">
                                                            <img src="../image/buy.png" style="width:20px;margin-bottom:5px;">點餐
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        ?>  
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $Dessert_meal_result=$link->query($Dessert_meal_sql);
                while($Dessert_meal_row=$Dessert_meal_result->fetch_array()){
                    echo '<div class="modal fade" id="meal_'.$Dessert_meal_row["menu_class"].'_'.$Dessert_meal_row["menu_id"].'" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="insert_order.php" method="POST">
                        <div class="modal-content">
                          <div class="modal-header" style="">
                            <h5 class="modal-title"><strong>'.$Dessert_meal_row["menu_name"].'</strong></h5>
                          </div>
                        <div class="modal-body" style="padding: 10px;">
                            <div>
                                <div style="border:2px solid #ddd;border-radius:10px;padding:10px;margin-bottom:20px;">
                                    <img src="'.$Dessert_meal_row["menu_picture"].'" alt="image1" class="card-img-top">
                                </div>
                                <strong>數量</strong>
                                <div class="p-2">
                                    <input type="number" name="amount" value="1" style="color:#666666;border:2px solid #ddd;border-radius:5px;" min="1" max="20">
                                </div>
                                <strong>備註</strong>
                                <div class="p-2">
                                    <textarea class="form-control" name="detail" cols="100%" rows="5" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="meal_name" value="'.$Dessert_meal_row["menu_name"].'">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-danger" value="加入購物車">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>';
                }
            ?>

            
            
            

    <?php include("items/footer.php") ?>
    <script>
        function select_req(mealname,choose_maturity_orNot){
            var first_meal=document.getElementById('fir_'+mealname).value;
            var second_meal=document.getElementById('sec_'+mealname).value;
            if(first_meal==choose_maturity_orNot){
                document.getElementById('maturity_'+mealname).style.display="block";
                document.getElementById('Multiple_Blue_'+mealname).required=true;
            }
            if(second_meal==choose_maturity_orNot){
                document.getElementById('maturity_'+mealname).style.display="block";
                document.getElementById('Multiple_Blue_'+mealname).required=true;
            }
            if(first_meal!=choose_maturity_orNot && second_meal!=choose_maturity_orNot){
                document.getElementById('maturity_'+mealname).style.display="none";
                document.getElementById('Multiple_Blue_'+mealname).required=false;
            }
            if(first_meal!="請選擇" && second_meal!="請選擇"){
                document.getElementById('enter_'+mealname).disabled=false;
            }
        }
    </script>

  </body>

</html>

<!--bootstrap JS-->
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>




