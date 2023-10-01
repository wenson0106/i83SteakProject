<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>i83管理系統 員工出席狀況</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
<meta charset="UTF-8">
<!-- 響應式網站 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Boostrap 導入程式 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<!--css連結-->
<link rel="stylesheet" herf="style.css">



  </head>
  <?php
      session_start();
      if(!isset($_SESSION["name"])){
        echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php">';
      }else{
          $name=$_SESSION["name"];
      }
   
    ?>
  <?php
  include("db_link.php");

  $full_time_sql = 'select * from employee where employee_position like "正職"';

  $part_time_sql = 'select * from employee where employee_position like "兼職"';

  $full_time_result = $link->query($full_time_sql);

  $part_time_result = $link->query($part_time_sql);

  ?>

    </head>
<body>

<?php include("./items/header.php"); ?>
    

   <div class="container" style="margin-top:30px;">
    <div>
          <div class="row p-3 justify-content-center"> 
          <!--左邊-->
          <div class="col-md-5 d-none d-md-block" style="margin-right:5px;border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
            <div style="font-size:40px;">正職</div>
              <div class="row p-3 justify-content-center"style="text-align:center;">
                <?php
                $i=1;
                while($row=$full_time_result->fetch_array()){
                  if($i%2==1){
                    echo '<div class="col-xs-8 col-sm-8 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin-bottom:5px;margin-right:9px;" data-bs-toggle="modal" data-bs-target="#l_full_time_'.$i.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }else{
                    echo '<div class="col-xs-8 col-sm-8 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin-bottom:5px;" data-bs-toggle="modal" data-bs-target="#l_full_time_'.$i.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }
                $i++;
                }
                if($i%2==0){
                  echo '<div class="col-md-5" style="">  
                    </div>';
                }
                ?>
              </div>
            </div>
          <!--右邊-->
          <div class="col-md-5 d-none d-md-block" style="margin-left:5px;border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
            <div style="font-size:40px;">工讀</div>
              <div class="row p-3 justify-content-center "style="text-align:center;">
                <?php
                  $j=1;
                  while($row=$part_time_result->fetch_array()){
                    if($j%2==1){
                      echo '<div class="col-xs-8 col-sm-8 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin-bottom:5px;margin-right:9px;" data-bs-toggle="modal" data-bs-target="#l_part_time_'.$j.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }else{
                    echo '<div class="col-xs-8 col-sm-8 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin-bottom:5px;" data-bs-toggle="modal" data-bs-target="#l_part_time_'.$j.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }
                $j++;
                }
                if($j%2==0){
                  echo '<div class="col-md-5" style="">  
                    </div>';
                }
                 ?>
               </div>          
             </div>       
          </div>
          <?php
          $full_time_result = $link->query($full_time_sql);

          $part_time_result = $link->query($part_time_sql);
          ?>
          <!--上面-->
          <div class="col-12 d-block d-md-none" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;margin-bottom:5px;">
            <div style="font-size:28px;"><strong>正職</strong></div>
              <div class="row p-3 justify-content-center"style="text-align:center;">
                <?php
                $i=1;
                while($row=$full_time_result->fetch_array()){
                  if($i%2==1){
                    echo '<div class="col-5 col-sm-5 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin:5px;" data-bs-toggle="modal" data-bs-target="#s_full_time_'.$i.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }else{
                    echo '<div class="col-5 col-sm-5 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin:5px;" data-bs-toggle="modal" data-bs-target="#s_full_time_'.$i.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }
                $i++;
                }
                if($i%2==0){
                  echo '<div class="col-5" style="margin:5px;">  
                    </div>';
                }
                ?>
              </div>
            </div>
          <!--下面-->
          <div class="col-12 d-block d-md-none" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;margin-top:5px;">
            <div style="font-size:28px;"><strong>工讀</strong></div>
              <div class="row  p-3 justify-content-center "style="text-align:center;">
                <?php
                  $j=1;
                  while($row=$part_time_result->fetch_array()){
                    if($j%2==1){
                      echo '<div class="col-5 col-sm-5 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin:5px;" data-bs-toggle="modal" data-bs-target="#s_part_time_'.$j.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }else{
                    echo '<div class="col-5 col-sm-5 col-md-5 btn" style="background-color:#d0d0d0;cursor:pointer;border:2px black solid;border-radius: 10px;margin:5px;" data-bs-toggle="modal" data-bs-target="#s_part_time_'.$j.'">  
                      <a >'.$row{0}.'</a>
                    </div>';
                  }
                $j++;
                }
                if($j%2==0){
                  echo '<div class="col-5" style="margin:5px;">  
                    </div>';
                }
                 ?>
               </div>  
  </div>

   <?php
   $full_time_result = $link->query($full_time_sql);
      $i=1;
      while($full_row=$full_time_result->fetch_array()){
        echo '<div class="modal fade" id="l_full_time_'.$i.'" tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
          <form action="" method="POST">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#fff8ef;">
                <h5 class="modal-title">'.$full_row[0].'
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>上班日期</th>
                          <th>打卡上班時間</th>
                          <th>打卡下班時間</th>
                          <th>上班時數</th>
                      </tr>
                  </thead>
                <tbody>';
              $payment_sql = 'select * from payment order by payment_punchintime DESC';
              $payment_result = $link->query($payment_sql);
              $fulltotal_time=0;
              $now_month=date("n");
              while($time=$payment_result->fetch_array()){
                if ($full_row[0]==$time[0]){
                  $month = date("m",strtotime($time['payment_punchintime']));
                  $fulltimes=number_format(date(strtotime($time[2])-strtotime($time[1]))/3600,2);
                  $uptime_sec = explode(" ",$time[1]);
                  $downtime_sec = explode(" ",$time[2]);
                  if($now_month == $month ){
                    $fulltotal_time+=$fulltimes;
                  }
                  echo '<tr>
                        <td>'.$uptime_sec[0].'</td>
                        <td>'.$uptime_sec[1].'</td>
                        <td>'.$downtime_sec[1].'</td>
                        <td>'.$fulltimes.'小時</td>
                    </tr>';              
              }}
              $full_money=$fulltotal_time*160;
              echo '</tbody></table>
              <div class="modal-footer">
              <div style="width:100%">
                <div class="float-start" >
                <p style="margin-top:5px;height:1px;">'.date("m").'月截至目前總時數 '.$fulltotal_time.' 小時</p><br class="d-block d-sm-none"> <p style="height:1px;">總薪資約：'.$full_money.' 元</p>
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
                  </div>';
      $i++;
      }
    ?>

<?php
   $part_time_result = $link->query($part_time_sql);
      $j=1;
      while($part_row=$part_time_result->fetch_array()){
        echo '<div class="modal fade" id="l_part_time_'.$j.'" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <form action="" method="POST">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#fff8ef;">
                <h5 class="modal-title">'.$part_row[0].'
                </h5><button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>                
                <div class="modal-body">
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>上班日期</th>
                          <th>打卡上班時間</th>
                          <th>打卡下班時間</th>
                          <th>上班時數</th>
                      </tr>
                  </thead>
                <tbody>';
              $payment_sql = 'select * from payment order by payment_punchintime DESC';
              $payment_result = $link->query($payment_sql);
              $parttotal_time=0;
              $now_months=date("n");
              while($parttime=$payment_result->fetch_array()){
                if ($part_row[0]==$parttime[0]){
                  $months = date("m",strtotime($parttime['payment_punchintime']));
                  $parttimes=number_format(date(strtotime($parttime[2])-strtotime($parttime[1]))/3600,2);
                  $uptimes_sec = explode(" ",$parttime[1]);
                  $downtimes_sec = explode(" ",$parttime[2]);
                  if($now_months == $months ){
                    $parttotal_time+=$parttimes;
                  }
                  echo '<tr>
                  <td>'.$uptimes_sec[0].'</td>
                  <td>'.$uptimes_sec[1].'</td>
                  <td>'.$downtimes_sec[1].'</td>
                  <td>'.$parttimes.'小時</td>
              </tr>';
              }}
              $part_money=$parttotal_time*160;
              echo '</tbody></table>
              <div class="modal-footer">
              <div style="width:100%">
                <div class="float-start" >
                  <p style="margin-top:5px;height:1px;">'.date("m").'月截至目前總時數 '.$parttotal_time.' 小時</p><br class="d-block d-sm-none"> <p style="height:1px;">總薪資約：'.$part_money.' 元</p>
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
              </div>
            </div></div></div></div>
          </form>
        </div>
      </div>';
      $j++;
      }
    ?>

<?php
   $full_time_result = $link->query($full_time_sql);
      $i=1;
      while($full_row=$full_time_result->fetch_array()){
        echo '<div class="modal fade" id="s_full_time_'.$i.'" tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
          <form action="" method="POST">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#fff8ef;">
                <h5 class="modal-title">'.$full_row[0].'
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>上班日期</th>
                          <th>上班時數</th>
                      </tr>
                  </thead>
                <tbody>';
              $payment_sql = 'select * from payment order by payment_punchintime DESC';
              $payment_result = $link->query($payment_sql);
              $fulltotal_time=0;
              $now_month=date("n");
              while($time=$payment_result->fetch_array()){
                if ($full_row[0]==$time[0]){
                  $month = date("m",strtotime($time['payment_punchintime']));
                  $fulltimes=number_format(date(strtotime($time[2])-strtotime($time[1]))/3600,2);
                  $uptime_sec = explode(" ",$time[1]);
                  $downtime_sec = explode(" ",$time[2]);
                  if($now_month == $month ){
                    $fulltotal_time+=$fulltimes;
                  }
                  echo '<tr>
                        <td>'.$uptime_sec[0].'</td>
                        <td>'.$fulltimes.'小時</td>
                    </tr>';              
              }}
              $full_money=$fulltotal_time*160;
              echo '</tbody></table>
              <div class="modal-footer">
              <div style="width:100%">
                <div class="float-start" >
                <p style="margin-top:5px;height:1px;">'.date("m").'月截至目前總時數 '.$fulltotal_time.' 小時</p><br class="d-block d-sm-none"> <p style="height:1px;">總薪資約：'.$full_money.' 元</p>
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
                  </div>';
      $i++;
      }
    ?>

 <?php
   $part_time_result = $link->query($part_time_sql);
      $j=1;
      while($part_row=$part_time_result->fetch_array()){
        echo '<div class="modal fade" id="s_part_time_'.$j.'" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <form action="" method="POST">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#fff8ef;">
                <h5 class="modal-title">'.$part_row[0].'
                </h5><button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                </div>                
                <div class="modal-body">
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>上班日期</th>
                          <th>上班時數</th>
                      </tr>
                  </thead>
                <tbody>';
              $payment_sql = 'select * from payment order by payment_punchintime DESC';
              $payment_result = $link->query($payment_sql);
              $parttotal_time=0;
              $now_months=date("n");
              while($parttime=$payment_result->fetch_array()){
                if ($part_row[0]==$parttime[0]){
                  $months = date("m",strtotime($parttime['payment_punchintime']));
                  $parttimes=number_format(date(strtotime($parttime[2])-strtotime($parttime[1]))/3600,2);
                  $uptimes_sec = explode(" ",$parttime[1]);
                  $downtimes_sec = explode(" ",$parttime[2]);
                  if($now_months == $months ){
                    $parttotal_time+=$parttimes;
                  }
                  echo '<tr>
                  <td>'.$uptimes_sec[0].'</td>
                  <td>'.$parttimes.'小時</td>
              </tr>';
              }}
              $part_money=$parttotal_time*160;
              echo '</tbody></table>
              <div class="modal-footer">
              <div style="width:100%">
                <div class="float-start" >
                  <p style="margin-top:5px;height:1px;">'.date("m").'月截至目前總時數 '.$parttotal_time.' 小時</p><br class="d-block d-sm-none"> <p style="height:1px;">總薪資約：'.$part_money.' 元</p>
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
              </div>
            </div></div></div></div>
          </form>
        </div>
      </div>';
      $j++;
      }
    ?>


    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
    <script src="https://unpkg.com/@popperjs/core@2"></script>
  </body>
</html>