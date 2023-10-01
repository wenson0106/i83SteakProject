<?php
$s=0;

include("conn.php");

$image_address=$_POST["image_address"];
foreach($image_address as $address){
    echo $address.'<br>';
    if (file_exists($address)) {
        unlink($address);
        $sql = "delete from home_image where image_address like '".$address."'";
        echo $sql;
        if ($link->query($sql) === TRUE) {
            $s=2;
        }else{
            die('Error');
        }
        echo 1;
        
    }else{
        echo 2;
    }

}

?>
<html>
    <head>
        <meta http-equiv="refresh" content="0;url=./i83_home.php?s=<?php echo $s;?>">
    </head>
</html>