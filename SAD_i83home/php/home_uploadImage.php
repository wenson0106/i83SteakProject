<?php
$s=0;
$name=$_POST["name"];
include("conn.php");
$sql="select * from home_image";
$result=$link->query($sql);
while($row=$result->fetch_array()){
    if($name==$row[0]){
        echo '<meta http-equiv="refresh" content="0;url=./i83_home.php?a=圖片名稱重複&s='.$s.'">';
    }
}
//限制圖片型別格式，大小
if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 1000000)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        echo '<meta http-equiv="refresh" content="0;url=./i83_home.php?a=1&s='.$s.'">';
    } else {
        if (file_exists("../image/home_image/original_" . $_FILES["file"]["name"])) {
            unlink("../image/home_image/original_" . $_FILES["file"]["name"]);
            move_uploaded_file($_FILES["file"]["tmp_name"],"../image/home_image/original_" . $_FILES["file"]["name"])or die("gg");
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],"../image/home_image/original_" . $_FILES["file"]["name"])or die("gg");
        }
        
    }
} else {
    echo "上傳失敗";
    $fileSize=$_FILES["file"]["size"];
    echo '<meta http-equiv="refresh" content="0;url=./i83_home.php?a=檔案格式不符>"';
}
if ($_FILES["file"]["type"] == "image/gif"){
    $crop_img = "../image/home_image/".$name.".gif";
    $file_type="gif";
}
if ($_FILES["file"]["type"] == "image/png"){
    $crop_img = "../image/home_image/".$name.".png";
    $file_type="png";
}
if ($_FILES["file"]["type"] == "image/jpg"){
    $crop_img = "../image/home_image/".$name.".jpg";
    $file_type="jpg";
}
if ($_FILES["file"]["type"] == "image/jpeg"){
    $crop_img = "../image/home_image/".$name.".jpg";
    $file_type="jpeg";
}

$origin_img = "../image/home_image/original_".$_FILES["file"]["name"];
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title></title>
        <link href="../css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
        <style>
        body {
            width: 500px;
            height: 380px;
            font-family: Arial, Sans-serif;
        }
  
        .btnSubmitClass {
            background-color: #696969;
            padding: 5px 30px;
            border: #696969 1px solid;
            border-radius: 4px;
            color: #FFFFFF;
            margin-top: 10px;
        }
  
        #cropBtnID {
            padding: 5px 25px 5px 25px;
            background: #D3D3D3;
            border: #98b398 1px solid;
            color: #FFF;
            visibility: hidden;
        }
  
        #outputImage {
            margin-top: 40px;
        }
    </style>
    </head>
    <body width="100%">
        
        <div width="100%">
            <h2>
                預覽圖片
            </h2>
            <div style="width:80%;">
                <div>
                    <img src="<?php echo $origin_img;?>" id="cropImageID"/><br> 
                </div>
                <div id="btn">
                    <input type='button' id="cropBtnID" value='確定'>
                </div>
            </div>
        </div>

        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/jquery.Jcrop.min.js"></script>
        <?php
        echo '<script type="text/javascript">
            $(document).ready(function () {
                var size;
                $("#cropImageID").Jcrop({

                    /* Some settings for 
                    basic configuration*/
                    allowSelect: true,
                    allowMove: true,
                    allowResize: true,
                    fixedSupport: true,
                    aspectRatio: 16/9,
                    onSelect: function (c) {
                        size = { x: c.x, y: c.y, 
                                w: c.w, h: c.h };

                        $("#cropBtnID").css(
                            "visibility", "visible");
                    }
                });

                $("#cropBtnID").click(function (){
                    var img = $("#cropImageID").attr("src");
                        
                    window.location.href="crop.php?x=" +
                    size.x + "&y=" + size.y +
                    "&w=" + size.w + "&h=" + 
                    size.h + "&img=" + img + "&crop_img='.$crop_img.'&name='.$name.'&origin_img='.$origin_img.'&file_type='.$file_type.'";
                });
            });
        </script>';
        ?>
    </body>
</html>