<!DOCTYPE html>
<?php
  session_start();
  if(isset($_GET["s"])){
    if($_GET["s"]==1){
      echo '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">';
      echo '<script>alert("新增成功");</script>';
    }else if($_GET["s"]==0){
      if(isset($_GET["a"])){
        echo '<script>alert("'.$_GET["a"].'");</script>';
      }
    }else if($_GET["s"]==2){
      echo '<script>alert("成功刪除");</script>';
    }
  }
  if(isset($_GET["n"])){
    echo '<script>alert("'.$_GET["n"].'");</script>';
  }
  include("conn.php");

  $sql_select="select * from home_image";
  $select_result = $link->query($sql_select);


?>
<html>
  <head>
    

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
  <!--bootstrap CSS-->
  <link href="../css/bootstrap.min.css" rel="stylesheet">  
  </head> 
  <body style="overflow-x:hidden;">
    <?php include("items/header.php");?>
    

    <div class="row align-items-center" style="margin-top:50px;margin-left:2px;margin-right:2px;">
      <div class="col-md-2"></div>
      <div class="col-md-8 p-1" style="border: 2px solid #ddd;border-radius: 10px;padding: 10px;">
        <div id="homeImage" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000">
          <ol class="carousel-indicators">
            <?php
              $i=1;
              $j=0;
              $k=0;
              while($row[$k]=$select_result->fetch_array()){
                echo '<li data-bs-target="#homeImage" data-bs-slide-to="'.$j.'" aria-label="slide '.$i.'"';if($i==1){echo 'aria-current="true" class="active"';} echo '></li>';
                $i+=1;
                $j+=1;
                $k+=1;
              }
            ?>
            
          </ol>
          <div class="carousel-inner">
            <?php
            $l=0;
            while($l<$k){
              echo'<div class="carousel-item ';if($l==0){echo 'active';}echo' ">
                <img src="';echo $row[$l][1];echo '" class="d-block w-100" alt="...">
              </div>';
              $l+=1;
            }
            ?>
          </div>
          <?php 
          if($l!=0){
            echo '<a class="carousel-control-prev" data-bs-target="#homeImage" type="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" data-bs-target="#homeImage" type="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
            </a>';
          }
          ?>
          
        </div>
      <?php
      if(isset($_SESSION["boss"])){
        echo '</div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10"><div style="float:right;"><button class="button" data-bs-toggle="modal" data-bs-target="#uploadImage">新增</button>&nbsp<button class="button" data-bs-toggle="modal" data-bs-target="#deleteImage">刪除</button></div></div>
        </div>';
      }
      
      ?>
    </div>
    
    <div class="row align-items-center"  style="margin-top:50px;margin-left:2px;margin-right:2px;margin-bottom:10px;">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="border-top: 2px solid #ddd;border-bottom: 2px solid #ddd;border-left: 2px solid #ddd;border-right: 2px solid #ddd;border-radius: 10px;padding: 10px;">
        <div style="margin:10px;">
          <div style="width: 100%;">
            <div class="row">
              <div style="border-bottom-style:solid;border-bottom-width: medium;border-bottom-color:black;width:100%;">
                <h3><strong>最 新 消 息</strong></h3>
              </div>
              <?php 
              $count=0;
              $sql_count="select count(*) from news";
              $count_result = $link->query($sql_count);
              if($count_row=$count_result->fetch_array()){
                $count=$count_row[0];
              }
              $max_page=($count-1)/10+1.01;
              if(!isset($_GET["page"]) || $_GET["page"]<1 || $_GET["page"]>$max_page){
                $page=1;
              }else{
                $page=$_GET["page"];
              }
              $number=10*($page-1);
              
              $sql_news_select="select * from news order by news_time DESC limit ".$number.",10";
              $news_select_result = $link->query($sql_news_select);

              while($news_row=$news_select_result->fetch_array()){
                echo '<div class="col-md-2 d-none d-md-block" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;"><h5>公告</h5></div>
                <div class="col-6 d-block d-md-none" style="margin-top:4px;"><h6>公告</h6></div>
                <div class="col-6 d-block d-md-none" style="margin-top:4px;"><h6 class="float-end">'.$news_row[0].'</h6></div>

                <div class="col-md-7 d-none d-md-block" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;">
                  <form name="form1'.$news_row[1].'" action="i83_home_news.php" method="post"> 
                    <input type="hidden" name="title" value="'.$news_row[1].'">
                    <a href="javascript:document.form1'.$news_row[1].'.submit();" style="text-decoration:none;"><h5>'.$news_row[1].'</h5></a>
                  </form>
                </div>

                <div class="col-12 d-block d-md-none" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;">
                  <form name="form2'.$news_row[1].'" action="i83_home_news.php" method="post"> 
                    <input type="hidden" name="title" value="'.$news_row[1].'">
                    <a href="javascript:document.form2'.$news_row[1].'.submit();" style="text-decoration:none;"><h6>'.$news_row[1].'</h6></a>
                  </form>
                </div>
                
                <div class="col-md-3 d-none d-md-block" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;"><h6 class="float-end">'.$news_row[0].'</h6></div>';
              }
              ?>
            </div>
          </div>
          <nav aria-label="News pagination" class="p-2">
            <ul class="pagination justify-content-center">
              <?php
                if($page>1){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'">上一頁</a></li>';
                }
                if(($page+1>$max_page)&($page-4>=1)){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page-4).'">'.($page-4).'</a></li>';
                }
                if(($page+2>$max_page)&($page-3>=1)){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page-3).'">'.($page-3).'</a></li>';
                }
                if($page-2>=1){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page-2).'">'.($page-2).'</a></li>';
                }
                if($page-1>=1){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'">'.($page-1).'</a></li>';
                }
                echo '<li class="page-item"><a class="page-link link-secondary">'.$page.'</a></li>';
                if($page+1<$max_page){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'">'.($page+1).'</a></li>';
                }
                if($page+2<$max_page){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page+2).'">'.($page+2).'</a></li>';
                }
                if(($page-2<1)&($page+3<$max_page)){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page+3).'">'.($page+3).'</a></li>';
                }
                if(($page-1<1)&($page+4<$max_page)){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page+4).'">'.($page+4).'</a></li>';
                }
                if($page+1<$max_page){
                  echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'">下一頁</a></li>';
                }
              ?>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
    <?php
      if(isset($_SESSION["boss"])){
        echo '<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10"><div style="float:right;"><button class="button" data-bs-toggle="modal" data-bs-target="#uploadNews">新增</button>&nbsp<button class="button" data-bs-toggle="modal" data-bs-target="#deleteNews">刪除</button></div></div>
      ';
      }
    ?>

    <div class="modal fade" id="uploadImage" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form action="./home_uploadImage.php" method="POST" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
          <div class="modal-content">
            <div class="modal-header" style="background: #FFFAF2;">
              <h5 class="modal-title">上傳圖片</h5>
            </div>
            <div class="modal-body">
              <div class="container">
                <label>圖片：<input type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg, image/gif"></label><br><br>
                  圖片名稱&nbsp:&nbsp<input type="text" name="name" required>
              </div> 
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="下一步">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="deleteImage" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form action="./home_deleteImage.php" method="POST">
          <div class="modal-content">
            <div class="modal-header" style="background: #FFFAF2;">
              <h5 class="modal-title">刪除圖片</h5>
            </div>
            <div class="modal-body">
              <div class="cnotainer">
                <?php
                $l=0;
                while($l<$k){
                  echo '<div style="width:100%;margin-bottom:10px;padding:20px;border:1px solid #666666;border-radius:10px;">
                          <input type="checkbox" name="image_address['.$l.']" value="'.$row[$l][1].'">&nbsp'.$row[$l][0].'
                          <img style="width:80%;margin-left:10%;margin-right:10%;margin-top:10px;border:1px solid #666666;" src="';echo $row[$l][1];echo '">
                        </div>';
                  $l+=1;
                }   
                ?>
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

    <div class="modal fade" id="uploadNews" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form action="./home_uploadNews.php" method="POST" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
          <div class="modal-content">
            <div class="modal-header" style="background: #FFFAF2;">
              <h5 class="modal-title">新增最新消息</h5>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">標題 : </label>
                  <input type="text" class="form-control" name="newsTitle" maxlength="20">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">內容 : </label>
                  <textarea class="form-control" rows="3" name="newsBody"></textarea>
                </div>
              </div> 
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="下一步">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <div class="modal fade" id="deleteNews" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form action="./home_deleteNews.php" method="GET" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
          <div class="modal-content">
            <div class="modal-header" style="background: #FFFAF2;">
              <h5 class="modal-title">刪除最新消息</h5>
            </div>
            <div class="modal-body">
              <div class="row align-items-center"  style="margin-top:50px;margin-left:2px;margin-right:2px;margin-bottom:10px;">
                <div class="col-12" style="border-top: 2px solid #ddd;border-bottom: 2px solid #ddd;border-left: 2px solid #ddd;border-right: 2px solid #ddd;border-radius: 10px;padding: 10px;">
                  <div style="margin:10px;">
                    <div style="width: 100%;">
                      <div class="row overflow-hidden">
                        <div style="border-bottom-style:solid;border-bottom-width: medium;border-bottom-color:black;width:100%;">
                          <h5><strong>最 新 消 息</strong></h5>
                        </div>
                        <?php 
                        $sql_news_select_mod="select * from news order by news_time DESC";
                        $news_select_result_mod = $link->query($sql_news_select_mod);
                        $k=0;
                        while($news_row_mod=$news_select_result_mod->fetch_array()){
                          echo '<div class="col-md-2 d-none d-md-block" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;"><h6><input type="checkbox" name="delete_news['.$k.']" value="'.$news_row_mod[1].'"> 公告</h6></div>
                          <div class="col-6 d-block d-md-none" style="margin-top:4px;"><h6><input type="checkbox" name="delete_news['.$k.']" value="'.$news_row_mod[1].'"> 公告</h6></div>
                          <div class="col-6 d-block d-md-none" style="margin-top:4px;"><h6 class="float-end">'.$news_row_mod[0].'</h6></div>

                          <div class="col-md-7 d-none d-md-block" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;"><a href="i83_home_news.php?title='.$news_row_mod[1].'" style="text-decoration:none;"><h6>'.$news_row_mod[1].'</h6></a></div>
                          <div class="col-12 d-block d-md-none" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;"><a href="i83_home_news.php?title='.$news_row_mod[1].'" style="text-decoration:none;"><h6>'.$news_row_mod[1].'</h6></a></div>
                          
                          <div class="col-md-3 d-none d-md-block" style="margin-top:4px;border-bottom-style:solid;border-bottom-width: thin;border-color:gray;"><h6 class="float-end">'.$news_row_mod[0].'</h6></div>';
                          $k++;
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="刪除">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="sticky-bottom bg-dark text-white p-1" style="height: 140px;margin-top:50px;">
      <div class="d-none d-md-block" style="margin:20px;">
          <h6>電話：04-2265-9078</h6>
          <h6>地址：40256臺中市南區復興北路372號</h6>
          <p style="text-align:center">Copyright &copy;2021 by
              <small>i83厚切牛排</small>
          </p>
      </div>
      <div class="d-block d-md-none" style="font-size:15px;">
          <p>電話：04-2265-9078</p>
          <p>地址：40256臺中市南區復興北路372號</p>
          <p style="text-align:center">Copyright &copy;2021 by
              <small>i83厚切牛排</small>
          </p>
      </div>
      <?php
      if(isset($_SESSION["boss"])){
        echo '<div style="float:right;color:#ddd;font-size:10px;">站內人員<a href="i83_home_login.php">登出</a></div>';
      }else{
        echo '<div style="float:right;color:#ddd;font-size:10px;">站內人員<a href="i83_home_login.php">登入</a></div>';
      }
      ?>  
    </div>

  </body>

</html>

<!--bootstrap JS-->
<!-- JavaScript Bundle with Popper -->
<script src="../js/bootstrap.min.js"></script>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>




