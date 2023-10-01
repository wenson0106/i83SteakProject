<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["boss"])){
    session_destroy();
    header("location: ./i83_home.php");
}
?>
<html>
  <head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排 管理員登入</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script> 
    </head> 
    <body style="overflow-x:hidden;">
        <?php 
            include("items/header.php"); 
            
        ?>
        
        <div class="container" style="position:relative;">
        <div style="text-align:right;margin:30px;">
                <a href='i83_home.php'>返回上一頁</a>
            </div>
            <div class="row" style="margin-top:30px;margin-bottom:30px;">
                <div class="col-2 col-md-4"></div>
                <div class="col-8 col-md-4" style="border:2px solid #ddd;padding:15px;border-radius:10px;text-align:center;">
                    <form action="home_login_check.php" method="POST">
                        <p>使用者登入</p>
                        帳號 : <input type="text" name="acc" style="border:2px solid #dfdfdf;border-radius:5px;"><br><br>
                        密碼 : <input type="text" name="pass" style="border:2px solid #dfdfdf;border-radius:5px;"><br><br>
                        <input type="submit" value="登入">
                    </form>
                </div>
                <div class="col-2 col-md-4"></div> 
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





