<?php
include("conn.php");


$sql="select news_title from news";
$result=$link->query($sql);
$i=0;
while($row[$i]=$result->fetch_array()){
    $i++;
}

$deleteNews=$_GET["delete_news"];
foreach($deleteNews as $news){
    echo '<br>'.$news.'<br>';
    for($j=0;$j<$i;$j++){
        
        echo $row[$j][0].' ';
        
        if($news==$row[$j][0]){
            $delete_sql='delete from news where news_title="'.$news.'"';
            $link->query($delete_sql);
        }
    }
}
echo '<meta http-equiv="refresh" content="0;url=./i83_home.php">';
?>
