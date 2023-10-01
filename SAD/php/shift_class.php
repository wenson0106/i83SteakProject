<!DOCTYPE html>
<html>
  <?php
  session_start();
  if(!isset($_SESSION["name"])){
    echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php">';
  }else{
      $name=$_SESSION["name"];
  }

  require("db_link.php");
  
  $sql_name = "select * from shifts where shifts_name like '$name'";
  $result = $link->query($sql_name);

  $disa=0;

  if($row=$result->fetch_array()){
    $mon1=$row[1];
    $mon2=$row[2];

    $tue1=$row[3];
    $tue2=$row[4];

    $wed1=$row[5];
    $wed2=$row[6];

    $thu1=$row[7];
    $thu2=$row[8];

    $fri1=$row[9];
    $fri2=$row[10];

    $sat1=$row[11];
    $sat2=$row[12];

    $sun1=$row[13];
    $sun2=$row[14];

    if(!(isset($_GET["mo"]))){
      $disa=1;
    }
  }else{
    $mon1=0;
    $mon2=0;

    $tue1=0;
    $tue2=0;

    $wed1=0;
    $wed2=0;

    $thu1=0;
    $thu2=0;
    $fri1=0;
    $fri2=0;

    $sat1=0;
    $sat2=0;

    $sun1=0;
    $sun2=0;
  }
  ?>
  <head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83管理系統 給班</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    <link rel="stylesheet" href="../css/shift.css">
    <link rel="stylesheet" href="../css/shift_class.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/shift.js"></script>
    <script type="text/javascript" src="../js/shift_class.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <?php include("items/header_em.php");?>

    <?php
      if(isset($_GET["en"])){
        echo '<script>alert("成功完成給班")</script>';
      }
    ?>

    <div class="container" style="margin-top:10px">
      <div class="col-12 time_remind">
        <span class="col-12 d-none d-sm-block" style="color: rgb(255, 255, 255);">系統開放時間 : 周一(10:00)至周五(22:00)</span>
        <span class="col-12 d-block d-sm-none" style="color: rgb(255, 255, 255);">系統開放時間 :</span><span class="col-12 d-block d-sm-none " style="color: rgb(255, 255, 255);"> 周一(10:00)至周五(22:00)</span>
      </div>
    </div>



    <form method="POST" action="" name="shift">
      <div class="container"style="padding:20px;">
        <div class="row justify-content-center align-items-center">
          <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%); border:2px solid #444">
            <div class="row">
              <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                星期一
              </div>
              <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                <input type="checkbox" name="mon1" value="1" <?php if($mon1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; } ?>>　中午
              </div>
              <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                <input type="checkbox" name="mon2" value="1" <?php if($mon2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
              </div>
            </div>
          </div>

          <div class="col-1 d-none d-md-block"></div>
          
          <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%);border:2px solid #444">
            <div class="row">
              <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                星期二
              </div>
              <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                <input type="checkbox" name="tue1" value="1" <?php if($tue1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　中午
              </div>
              <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                <input type="checkbox" name="tue2" value="1" <?php if($tue2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
              </div>
            </div>
          </div>
          <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%);border:2px solid #444">
              <div class="row">
                <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                  星期三
                </div>
                <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="wed1" value="1" <?php if($wed1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　中午
                </div>
                <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="wed2" value="1" <?php if($wed2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
                </div>
              </div>
            </div>
    
            <div class="col-1 d-none d-md-block"></div>
            
            <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%);border:2px solid #444">
              <div class="row">
                <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                  星期四
                </div>
                <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="thu1" value="1" <?php if($thu1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　中午
                </div>
                <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="thu2" value="1" <?php if($thu2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
                </div>
              </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%);border:2px solid #444">
              <div class="row">
                <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                  星期五
                </div>
                <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="fri1" value="1" <?php if($fri1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　中午
                </div>
                <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="fri2" value="1" <?php if($fri2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
                </div>
              </div>
            </div>
    
            <div class="col-1 d-none d-md-block"></div>
            
            <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%);border:2px solid #444">
              <div class="row">
                <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                  星期六
                </div>
                <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="sat1" value="1" <?php if($sat1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　中午
                </div>
                <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="sat2" value="1" <?php if($sat2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
                </div>
              </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5 checkbox_div" style="background-color:rgb(226 226 226 / 98%);border:2px solid #444">
              <div class="row">
                <div class="col-4 fs-6" style="height: 80px; line-height: 80px;">
                  星期日
                </div>
                <div class="col-4 fs-6" style="border-left: solid; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="sun1" value="1" <?php if($sun1==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　中午
                </div>
                <div class="col-4 fs-6" style="border-left: dashed;  border-color:#788888; height: 80px; line-height: 80px;">
                  <input type="checkbox" name="sun2" value="1" <?php if($sun2==1){echo "checked=".'"checked"';} if($disa==1){ echo 'onclick="return false"'; }?>>　晚上
                </div>
              </div>
            </div>

            <div class="col-1 d-none d-md-block"></div>
            <div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px; margin: 10px; text-align: center;border-radius: 4px;"></div>
        </div>
      </div>

      <div></div>

      <script type="text/javascript">
        function btn_enter(){
            document.shift.action="./insert_shift.php";
            document.shift.submit();
        }

        function btn_modify() {
            document.shift.action="./shift_class.php?mo=0";
            document.shift.submit();
        }
      </script>

      <div class="container">
          <div class="row justify-content-end align-items-end">
            <div class="col-12" style="text-align: right;"><button <?php if($disa==1){ echo 'disabled';}?> onclick="btn_enter()">確定</button>　<button <?php if($disa==0){echo 'disabled';} ?> onclick="btn_modify()">修改</button></div>
          </div>
      </div>
    </form>
    <!--bootstrap JS-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
  </body>
</html>