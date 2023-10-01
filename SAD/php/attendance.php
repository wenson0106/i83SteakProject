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
  $payment_sql = 'select * from payment order by payment_punchintime DESC';

  $payment_result = $link->query($payment_sql);
  ?>
</head>
<body>
<?php include("./items/header_em.php"); ?>

<div class="container " style="margin-top:50px;">
    <div class="row p-3 justify-content-center ">
    <div style="margin-right:5px;border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
        <div class="row align-items-center d-none d-md-block"style="text-align:center;">
        <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>上班日期</th>
                          <th>打卡上班時間</th>
                          <th>打卡下班時間</th>
                          <th>上班時數</th>
                      </tr>
                  </thead>
                <tbody>
                <?php
                    $total_time=0;
                    $now_month=date("n");
                    while($time=$payment_result->fetch_array()){
                        if ($name==$time[0]){
                          $month = date("m",strtotime($time['payment_punchintime']));
                          $times=number_format(date(strtotime($time[2])-strtotime($time[1]))/3600,2);
                          $uptime_sec = explode(" ",$time[1]);
                          $downtime_sec = explode(" ",$time[2]);
                          if($now_month == $month ){
                            $total_time+=$times;
                          }
                      echo '<tr>
                      <td>'.$uptime_sec[0].'</td>
                      <td>'.$uptime_sec[1].'</td>
                      <td>'.$downtime_sec[1].'</td>
                      <td>'.$times.'小時</td>
                  </tr>';
                      }}
                      $money=$total_time*160;
                      echo '</tbody></table>
                      <div style="width:100%">
                      <div class="footer float-end">
                        <p style="margin:5px">'.date("m").'月截至目前總時數 '.$total_time.' 小時 總薪資約：'.$money.' 元</p>
                      </div></div>'
                ?>
        </div>

        <?php
          $payment_sql = 'select * from payment order by payment_punchintime DESC';

          $payment_result = $link->query($payment_sql);
        ?>
        <div class="row align-items-center d-block d-md-none"style="text-align:center;">
        <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>上班日期</th>
                          <th>上班時數</th>
                      </tr>
                  </thead>
                <tbody>
                <?php
                    $total_time=0;
                    $now_month=date("n");
                    while($time=$payment_result->fetch_array()){
                        if ($name==$time[0]){
                          $month = date("m",strtotime($time['payment_punchintime']));
                          $times=number_format(date(strtotime($time[2])-strtotime($time[1]))/3600,2);
                          $uptime_sec = explode(" ",$time[1]);
                          $downtime_sec = explode(" ",$time[2]);
                          if($now_month == $month ){
                            $total_time+=$times;
                          }
                      echo '<tr>
                      <td>'.$uptime_sec[0].'</td>
                      <td>'.$times.'小時</td>
                  </tr>';
                      }}
                      $money=$total_time*160;
                      echo '</tbody></table>
                      <div style="width:100%">
                      <div class="footer" style="float:left;text-align:left;">
                        <p style="margin:5px">'.date("m").'月截至目前總時數 '.$total_time.' 小時</p><p style="margin:5px">總薪資約：'.$money.' 元</p>
                      </div></div>'
                ?>
        </div>

    </div>            
    </div>
</div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
    <script src="https://unpkg.com/@popperjs/core@2"></script>

</body>
</html>