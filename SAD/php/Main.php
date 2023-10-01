<!DOCTYPE html>
<html>
  <head>
    <?php
    session_start();
    if(!isset($_SESSION["name"])){
        echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php">';
    }else{
        $name=$_SESSION["name"];
    }
    ?>

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83管理系統 員工</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/shift_class.css">
    <script type="text/javascript" src="../js/shift.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-image:url(../image/home_background.jpg);background-repeat: no-repeat;background-size: cover;">
      <div class="container">
        <img src="../image/i83.png" width="100px">
        <a class="navbar-brand d-none d-sm-block"><strong style="font-size:36px;">&nbspi83厚切牛排</strong></a>
        <div class="row">
          <div class="float-right">
            <strong style="font-size:18px;"><?php echo $name;?></strong>&nbsp&nbsp<a href="./i83-steak.php" style="font-size:16px;">登出</a>
          </div>
        </div>
      </div>
    </nav>

    <div style="margin:30px;">
        <div class="row" style="margin-top:40px">
            <div class="col-12 col-sm-6 col-md-4" style="padding:10px;">
              <div style="border:2px solid #75727259;border-radius:10px;padding:8px; cursor:pointer;" onclick="location.href='./shift_class.php'">
                <div style="box-shadow:3px 3px 3px #ddd;">
                  <img src="../image/給班.png" style="width:100%;" class="card-img-top">
                  <div class="card-img-bottom">
                    <div style="margin:10px;padding:5px;">
                      <h5 class="font-ch d-block d-sm-none"><strong>給班</strong></h5>
                      <h6 class="font-ch d-none d-sm-block"><strong>給班</strong></h6>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            <div class="col-12 col-sm-6 col-md-4" style="padding:10px;">
              <div style="border:2px solid #75727259;border-radius:10px;padding:8px; cursor:pointer;" onclick="location.href='./attendance.php'">
                <div style="box-shadow:3px 3px 3px #ddd;">  
                <img src="../image/出席狀況.png" style="width:100%;" class="card-img-top">
                  <div class="card-img-bottom">
                    <div style="margin:10px;padding:5px;">
                      <h5 class="font-ch d-block d-sm-none"><strong>出席狀況</strong></h5>
                      <h6 class="font-ch d-none d-sm-block"><strong>出席狀況</strong></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4" style="padding:10px;">
              <div style="border:2px solid #75727259;border-radius:10px;padding:8px; cursor:pointer;" onclick="location.href='./week_schedule_em.php'">
                <div style="box-shadow:3px 3px 3px #ddd;">  
                <img src="../image/每周班表.png" style="width:100%;" class="card-img-top">
                  <div class="card-img-bottom">
                    <div style="margin:10px;padding:5px;">
                      <h5 class="font-ch d-block d-sm-none"><strong>每周班表</strong></h5>
                      <h6 class="font-ch d-none d-sm-block"><strong>每周班表</strong></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 d-md-none" style="padding:10px;">
              
              </div>
            </div>
        </div>
    </div>
  </body>
</html>
