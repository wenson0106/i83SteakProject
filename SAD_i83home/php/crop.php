<?php
$name=$_GET["name"];

include("conn.php");


echo "儲存於: " . $_GET["crop_img"];//上傳成功後提示上傳資訊
//定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
$file = $_GET["crop_img"];
$sql = 'INSERT INTO home_image VALUES ("'.$name.'","'.$file.'")';

echo $sql;

if ($link->query($sql) === TRUE) {
    //成功傳入資料後顯示成功新增一條資料
    echo "成功新增一條記錄";
    $s=1;
}else{
    die('Error');
}?>
<?php
if ($_GET["file_type"] == "gif"){

  $newImage = imagecreatefromgif($_GET['img']) or die("error");

  echo 'from : '.$newImage.'<br>';
    
  $newTruecolorImage = @imagecreatetruecolor(
              $_GET["w"], $_GET["h"]);

  echo 'color : '.$newTruecolorImage.'<br>';
    
  echo imagecopyresampled($newTruecolorImage, 
          $newImage, 0, 0, $_GET["x"], $_GET["y"], 
          $_GET["w"], $_GET["h"], $_GET["w"], 
          $_GET["h"]).'<br>';
  
  imagegif($newTruecolorImage,$file);
}
if ($_GET["file_type"] == "png"){

  $newImage = imagecreatefrompng($_GET['img']) or die("error");

  echo 'from : '.$newImage.'<br>';
    
  $newTruecolorImage = @imagecreatetruecolor(
              $_GET["w"], $_GET["h"]);

  echo 'color : '.$newTruecolorImage.'<br>';
    
  echo imagecopyresampled($newTruecolorImage, 
          $newImage, 0, 0, $_GET["x"], $_GET["y"], 
          $_GET["w"], $_GET["h"], $_GET["w"], 
          $_GET["h"]).'<br>';    

  imagepng($newTruecolorImage,$file);
}
if ($_GET["file_type"] == "jpg" || $_GET["file_type"] == "jpeg"){

  $newImage = imagecreatefromjpeg($_GET['img']) or die("error");

  echo 'from : '.$newImage.'<br>';
    
  $newTruecolorImage = @imagecreatetruecolor(
              $_GET["w"], $_GET["h"]);

  echo 'color : '.$newTruecolorImage.'<br>';
    
  echo imagecopyresampled($newTruecolorImage, 
          $newImage, 0, 0, $_GET["x"], $_GET["y"], 
          $_GET["w"], $_GET["h"], $_GET["w"], 
          $_GET["h"]).'<br>';
  
  imagejpeg($newTruecolorImage,$file);
}


  
  $address = $_GET["origin_img"];
  unlink($address);
?>

<meta http-equiv="refresh" content="0;url=./i83_home.php?s=1">


  