<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83管理系統 排班</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="../css/shift.css" rel="stylesheet">
    <script type="text/javascript" src="../js/shift.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  </head>
  <?php
      session_start();
      if(!isset($_SESSION["name"])){
        echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php">';
      }else{
          $name=$_SESSION["name"];
      }
   
    ?>
  <body>
    <?php include("items/header.php");?>

    <div>
       　
    </div>

    <?php 
      function show_name($st){
        $str='<div class="row justify-content-center align-items-center" style="width:100%; margin-left:1px;height:70px;">';
        if(isset($_SESSION["schedule"][$st])){
          $i=0;
          foreach($_SESSION["schedule"][$st] as $sn){
            if($i%2==0){
              $str=$str.'<span class="col-xs-10 col-sm-5 col-md-10 col-lg-10 col-xl-5" style="padding:1px;margin:1px;border:2px solid #d8a981db; border-radius: 10px; background-color:#fbecc5a3;">'.$sn.'</span>';
            }else{
              $str=$str.'<span class="col-xs-10 sm-offset-1 col-sm-5 col-md-10 col-lg-10 xl-offset-1 col-xl-5" style="padding:1px; margin:1px; border:2px solid #d8a981db;border-radius: 10px; background-color:#fbecc5a3;">'.$sn.'</span>';
            }
            $i++;
          }
          if($i%2==1){
            $str=$str.'<span class="sm-offset-1 col-sm-5 xl-offset-1 col-xl-5"></span>';
          }
          $str=$str.'</div>';
        }
        return $str;
      }

    ?>
<span></span></div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期一</th>
              <th class="col-1"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose1NoonFull"><?php echo show_name("MNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose1NightFull"><?php echo show_name("MNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle"  style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose1NoonPart"><?php echo show_name("MNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose1NightPart"><?php echo show_name("MNiP")?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期二</th>
              <th class="col-1 crossed"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose2NoonFull"><?php echo show_name("TuNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose2NightFull"><?php echo show_name("TuNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose2NoonPart"><?php echo show_name("TuNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose2NightPart"><?php echo show_name("TuNiP")?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期三</th>
              <th class="col-1"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose3NoonFull"><?php echo show_name("WNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose3NightFull"><?php echo show_name("WNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose3NoonPart"><?php echo show_name("WNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose3NightPart"><?php echo show_name("WNiP")?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期四</th>
              <th class="col-1"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose4NoonFull"><?php echo show_name("ThNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose4NightFull"><?php echo show_name("ThNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose4NoonPart"><?php echo show_name("ThNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose4NightPart"><?php echo show_name("ThNiP")?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期五</th>
              <th class="col-1"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose5NoonFull"><?php echo show_name("FNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose5NightFull"><?php echo show_name("FNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose5NoonPart"><?php echo show_name("FNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose5NightPart"><?php echo show_name("FNiP")?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期六</th>
              <th class="col-1"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose6NoonFull"><?php echo show_name("SaNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose6NightFull"><?php echo show_name("SaNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose6NoonPart"><?php echo show_name("SaNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose6NightPart"><?php echo show_name("SaNiP")?></td>
            </tr>
          </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <table class="table table-bordered" style="text-align:center;">
            <tr>
              <th rowspan="3" class="col-3" style="background-color: gray;color:white;" valign="middle">星期日</th>
              <th class="col-1"></th>
              <th class="col-4" style="background-color: lightgray;">中午</th>
              <th class="col-4" style="background-color: lightgray;">晚上</th>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">正職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose7NoonFull"><?php echo show_name("SuNoF")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose7NightFull"><?php echo show_name("SuNiF")?></td>
            </tr>
            <tr>
              <th class="col-1" valign="middle" style="height:80px;background-color: lightgray;">兼職</th>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose7NoonPart"><?php echo show_name("SuNoP")?></td>
              <td class="td_point" data-bs-toggle="modal" data-bs-target="#choose7NightPart"><?php echo show_name("SuNiP")?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <?php
      $servername = "localhost";
      $username = "wenson";
      $password = "a0965658928";
      $db = "schedule";

      $link = new mysqli( $servername, $username, $password, $db)or die("Error");

      $link->query("SET NAMES UTF8");

      $sql = 'select shifts_name,shifts_Mon1,shifts_Mon2,shifts_Tue1,shifts_Tue2,shifts_Wen1,shifts_Wen2,shifts_Tur1,shifts_Tur2,shifts_Fri1,shifts_Fri2,shifts_Sat1,shifts_Sat2,shifts_Sun1,shifts_Sun2,employee_position
      from shifts,employee
      where shifts.shifts_name=employee.employee_name';
      
      $result = $link->query($sql);

      $MNoFi=0;$MNiFi=0;       //星期,時間 的計數器(正職)
      $TuNoFi=0;$TuNiFi=0;
      $WNoFi=0;$WNiFi=0;
      $ThNoFi=0;$ThNiFi=0;
      $FNoFi=0;$FNiFi=0;
      $SaNoFi=0;$SaNiFi=0;
      $SuNoFi=0;$SuNiFi=0;

      $MNoPi=0;$MNiPi=0;        //星期,時間 的計數器(兼職)
      $TuNoPi=0;$TuNiPi=0;
      $WNoPi=0;$WNiPi=0;
      $ThNoPi=0;$ThNiPi=0;
      $FNoPi=0;$FNiPi=0;
      $SaNoPi=0;$SaNiPi=0;
      $SuNoPi=0;$SuNiPi=0;
      
      while($row = $result->fetch_array()){
        if($row[15]=='正職'){
          if($row[1]==1){
            $MNoF[$MNoFi]=$row[0];
            $MNoFi+=1;
          }
          if($row[2]==1){
            $MNiF[$MNiFi]=$row[0];
            $MNiFi+=1;
          }
          if($row[3]==1){
            $TuNoF[$TuNoFi]=$row[0];
            $TuNoFi+=1;
          }
          if($row[4]==1){
            $TuNiF[$TuNiFi]=$row[0];
            $TuNiFi+=1;
          }
          if($row[5]==1){
            $WNoF[$WNoFi]=$row[0];
            $WNoFi+=1;
          }
          if($row[6]==1){
            $WNiF[$WNiFi]=$row[0];
            $WNiFi+=1;
          }
          if($row[7]==1){
            $ThNoF[$ThNoFi]=$row[0];
            $ThNoFi+=1;
          }
          if($row[8]==1){
            $ThNiF[$ThNiFi]=$row[0];
            $ThNiFi+=1;
          }
          if($row[9]==1){
            $FNoF[$FNoFi]=$row[0];
            $FNoFi+=1;
          }
          if($row[10]==1){
            $FNiF[$FNiFi]=$row[0];
            $FNiFi+=1;
          }
          if($row[11]==1){
            $SaNoF[$SaNoFi]=$row[0];
            $SaNoFi+=1;
          }
          if($row[12]==1){
            $SaNiF[$SaNiFi]=$row[0];
            $SaNiFi+=1;
          }
          if($row[13]==1){
            $SuNoF[$SuNoFi]=$row[0];
            $SuNoFi+=1;
          }
          if($row[14]==1){
            $SuNiF[$SuNiFi]=$row[0];
            $SuNiFi+=1;
          }
        }elseif($row[15]=='兼職'){
          if($row[1]==1){
            $MNoP[$MNoPi]=$row[0];
            $MNoPi+=1;
          }
          if($row[2]==1){
            $MNiP[$MNiPi]=$row[0];
            $MNiPi+=1;
          }
          if($row[3]==1){
            $TuNoP[$TuNoPi]=$row[0];
            $TuNoPi+=1;
          }
          if($row[4]==1){
            $TuNiP[$TuNiPi]=$row[0];
            $TuNiPi+=1;
          }
          if($row[5]==1){
            $WNoP[$WNoPi]=$row[0];
            $WNoPi+=1;
          }
          if($row[6]==1){
            $WNiP[$WNiPi]=$row[0];
            $WNiPi+=1;
          }
          if($row[7]==1){
            $ThNoP[$ThNoPi]=$row[0];
            $ThNoPi+=1;
          }
          if($row[8]==1){
            $ThNiP[$ThNiPi]=$row[0];
            $ThNiPi+=1;
          }
          if($row[9]==1){
            $FNoP[$FNoPi]=$row[0];
            $FNoPi+=1;
          }
          if($row[10]==1){
            $FNiP[$FNiPi]=$row[0];
            $FNiPi+=1;
          }
          if($row[11]==1){
            $SaNoP[$SaNoPi]=$row[0];
            $SaNoPi+=1;
          }
          if($row[12]==1){
            $SaNiP[$SaNiPi]=$row[0];
            $SaNiPi+=1;
          }
          if($row[13]==1){
            $SuNoP[$SuNoPi]=$row[0];
            $SuNoPi+=1;
          }
          if($row[14]==1){
            $SuNiP[$SuNiPi]=$row[0];
            $SuNiPi+=1;
          }
        }
      }
    ?>

    <!-- 一 中 正 -->
    <div class="modal fade" id="choose1NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_MNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期一 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($MNoF)){
                      foreach($MNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["MNoF"][$i])){if($_SESSION["schedule"]["MNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[MNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 一 中 兼 -->
    <div class="modal fade" id="choose1NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_MNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期一 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($MNoP)){
                      foreach($MNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["MNoP"][$i])){if($_SESSION["schedule"]["MNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[MNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 一 晚 正 -->
    <div class="modal fade" id="choose1NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_MNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期一 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($MNiF)){
                      foreach($MNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["MNiF"][$i])){if($_SESSION["schedule"]["MNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[MNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 一 晚 兼 -->
    <div class="modal fade" id="choose1NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_MNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期一 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($MNiP)){
                      foreach($MNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["MNiP"][$i])){if($_SESSION["schedule"]["MNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[MNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 二 中 正 -->
    <div class="modal fade" id="choose2NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_TuNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期二 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($TuNoF)){
                      foreach($TuNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["TuNoF"][$i])){if($_SESSION["schedule"]["TuNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[TuNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 二 中 兼 -->
    <div class="modal fade" id="choose2NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_TuNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期二 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($TuNoP)){
                      foreach($TuNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["TuNoP"][$i])){if($_SESSION["schedule"]["TuNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[TuNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 二 晚 正 -->
    <div class="modal fade" id="choose2NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_TuNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期二 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($TuNiF)){
                      foreach($TuNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["TuNiF"][$i])){if($_SESSION["schedule"]["TuNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[TuNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 二 晚 兼 -->
    <div class="modal fade" id="choose2NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_TuNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期二 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($TuNiP)){
                      foreach($TuNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["TuNiP"][$i])){if($_SESSION["schedule"]["TuNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[TuNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 三 中 正 -->
    <div class="modal fade" id="choose3NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_WNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期三 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($WNoF)){
                      foreach($WNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["WNoF"][$i])){if($_SESSION["schedule"]["WNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[WNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 三 中 兼 -->
    <div class="modal fade" id="choose3NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_WNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期三 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($WNoP)){
                      foreach($WNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["WNoP"][$i])){if($_SESSION["schedule"]["WNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[WNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 三 晚 正 -->
    <div class="modal fade" id="choose3NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_WNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期三 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($WNiF)){
                      foreach($WNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["WNiF"][$i])){if($_SESSION["schedule"]["WNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[WNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 三 晚 兼 -->
    <div class="modal fade" id="choose3NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_WNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期三 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($WNiP)){
                      foreach($WNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["WNiP"][$i])){if($_SESSION["schedule"]["WNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[WNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 四 中 正 -->
    <div class="modal fade" id="choose4NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_ThNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期四 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($ThNoF)){
                      foreach($ThNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["ThNoF"][$i])){if($_SESSION["schedule"]["ThNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[ThNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 四 中 兼 -->
    <div class="modal fade" id="choose4NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_ThNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期四 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($ThNoP)){
                      foreach($ThNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["ThNoP"][$i])){if($_SESSION["schedule"]["ThNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[ThNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 四 晚 正 -->
    <div class="modal fade" id="choose4NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_ThNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期四 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($ThNiF)){
                      foreach($ThNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["ThNiF"][$i])){if($_SESSION["schedule"]["ThNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[ThNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 四 晚 兼 -->
    <div class="modal fade" id="choose4NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_ThNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期四 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($ThNiP)){
                      foreach($ThNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["ThNiP"][$i])){if($_SESSION["schedule"]["ThNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[ThNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 五 中 正 -->
    <div class="modal fade" id="choose5NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_FNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期五 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($FNoF)){
                      foreach($FNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["FNoF"][$i])){if($_SESSION["schedule"]["FNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[FNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 五 中 兼 -->
    <div class="modal fade" id="choose5NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_FNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期五 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($FNoP)){
                      foreach($FNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["FNoP"][$i])){if($_SESSION["schedule"]["FNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[FNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 五 晚 正 -->
    <div class="modal fade" id="choose5NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_FNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期五 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($FNiF)){
                      foreach($FNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["FNiF"][$i])){if($_SESSION["schedule"]["FNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[FNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 五 晚 兼 -->
    <div class="modal fade" id="choose5NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_FNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期五 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($FNiP)){
                      foreach($FNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["FNiP"][$i])){if($_SESSION["schedule"]["FNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[FNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 六 中 正 -->
    <div class="modal fade" id="choose6NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SaNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期六 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SaNoF)){
                      foreach($SaNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SaNoF"][$i])){if($_SESSION["schedule"]["SaNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SaNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 六 中 兼 -->
    <div class="modal fade" id="choose6NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SaNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期六 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SaNoP)){
                      foreach($SaNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SaNoP"][$i])){if($_SESSION["schedule"]["SaNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SaNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 六 晚 正 -->
    <div class="modal fade" id="choose6NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SaNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期六 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SaNiF)){
                      foreach($SaNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SaNiF"][$i])){if($_SESSION["schedule"]["SaNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SaNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 六 晚 兼 -->
    <div class="modal fade" id="choose6NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SaNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期六 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SaNiP)){
                      foreach($SaNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SaNiP"][$i])){if($_SESSION["schedule"]["SaNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SaNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 日 中 正 -->
    <div class="modal fade" id="choose7NoonFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SuNoF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期日 早班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SuNoF)){
                      foreach($SuNoF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SuNoF"][$i])){if($_SESSION["schedule"]["SuNoF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SuNoF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 日 中 兼 -->
    <div class="modal fade" id="choose7NoonPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SuNoP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期日 早班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SuNoP)){
                      foreach($SuNoP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SuNoP"][$i])){if($_SESSION["schedule"]["SuNoP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SuNoP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 日 晚 正 -->
    <div class="modal fade" id="choose7NightFull" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SuNiF.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期日 晚班 正職</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SuNiF)){
                      foreach($SuNiF as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SuNiF"][$i])){if($_SESSION["schedule"]["SuNiF"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SuNiF]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- 日 晚 兼 -->
    <div class="modal fade" id="choose7NightPart" tabindex="-1" aria-hidden="true">>
      <div class="modal-dialog">
        <form action="./roster_data/rd_SuNiP.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(255 248 222 / 49%);">
              <h5 class="modal-title">星期日 晚班 工讀</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <div class="row align-items-center justify-content-center">
                  <?php
                    $i=0;
                    if(isset($SuNiP)){
                      foreach($SuNiP as $f){
                        echo '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5" style="border-width: 3px ; padding: 10px;border-style:solid;border-color:#666666;margin:5px;background-color: #ddd;border-radius: 4px; ">';
                          echo '<span stlye="padding:2px;"><input type="checkbox" ';if(isset($_SESSION["schedule"]["SuNiP"][$i])){if($_SESSION["schedule"]["SuNiP"][$i]==$f){echo ' checked="checked"';}} echo'name="schedule[SuNiP]['."$i".']" value='.$f.'>　'.$f.'</span>';
                        echo '</div>';
                        $i+=1;
                      }
                      if($i%2==1){
                        echo '<div class="col-md-5 col-lg-5 col-xl-5" style="margin:5px;">';
                        echo '</div>';
                      }
                    }else{
                      echo '<div><h4>無</h4></div>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="確定">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script type="text/javascript">
      function btn_enter(){
          document.roster.action="./insert_roster.php";
          document.roster.submit();
      }
    </script>
      <form method="POST" action="" name="roster">
        <div class="container">
            <div class="row justify-content-end align-items-end">
              <div class="col-12" style="text-align: right;"><button onclick="btn_enter()">上傳班表</button>　</div>
            </div>
        </div>

        <div style="height:50px;"></div>
      </form>

    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
  </body>
</html>

