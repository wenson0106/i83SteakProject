<!DOCTYPE html>

<html>
  <head>
    

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排 最新消息</title>
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
            include("conn.php"); 
            if(!isset($_POST["title"])){
                echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';
                die();
            }
            $news_sql="select * from news where news_title like '".$_POST["title"]."'";
            $news_result=$link->query($news_sql);
            if(!($news_row=$news_result->fetch_array())){
                echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';        
            }
        ?>
        
        <div class="container" style="position:relative;">
            <div class="row" style="margin-top:30px;">
                <div class="col-8">
                    <h5><a href="i83_home.php" style="text-decoration:none;color:black;">首頁</a> -> <a href="i83_home.php" style="text-decoration:none;color:black;">最新消息</a> -> <a style="text-decoration:none;color:black;"><?php echo $_POST["title"]?></a></h5>
                </div>
                <div class="col-4" style="text-align:end;">
                    <h5>
                        <a>
                        <?php
                        echo '<h6>'.$news_row[0];
                        ?>
                        </a>
                    </h5>
                </div>
                <div class="col-12" style="margin:20px;padding:20px;">
                    <div>
                    <?php
                    echo '<h6>'.$news_row[2];
                    ?>
                    </div>
                </div>  
            </div>
            <div style="text-align:center;">
                <input type="button" onclick="location.href='i83_home.php'" value="返回上一頁">
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





