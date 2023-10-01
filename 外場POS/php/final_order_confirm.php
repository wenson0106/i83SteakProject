<?php

//header("Content-type=text/html;charset=utf-8");
//header('Content-type:text/json');
$servername = "localhost";
$username = "wenson";
$password = "a0965658928";
$dbname = "i83order_system";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
$phonenumber = $_POST['phonenumber_name'];
$order_id = $_POST['hidden_name_final'];
$takeout_time = $_POST['takeout_time'];
mysqli_query($conn, 'set names utf8');
$sql_search = "SELECT * FROM order_list_storage AS a,menu AS b WHERE a.meal_name=b.menu_name";
$result_search=$conn->query($sql_search);
$row_search=$result_search->fetch_all();
//2,3 判斷是否鮭魚
//7 數量
//12 價錢
$price=0;
for($i=0;$i<count($row_search);$i++){
    if(isset($row_search[$i][2][0]) && isset($row_search[$i][3][0])){
        if($row_search[$i][2][0]=='鮭' || $row_search[$i][3][0]='鮭'){
            $price+=$row_search[$i][7]*($row_search[$i][12]+40);
        }else{
            $price+=$row_search[$i][7]*$row_search[$i][12];
        }
    }else{
        $price+=$row_search[$i][7]*$row_search[$i][12];
    }
}
$sql_copy = "INSERT INTO order_list SELECT * FROM order_list_storage";
$result_copy = $conn->query($sql_copy);
$sql_orders = "INSERT INTO orders (order_id,phonenumber,takeout_time,order_finished,price) VALUES('$order_id','$phonenumber','$takeout_time','0','$price')";
$result_orders = $conn->query($sql_orders);

$sql = "TRUNCATE TABLE order_list_storage";
$result = $conn->query($sql);
echo "<script>";
echo "alert('訂單已成功送出');";
echo "self.location=document.referrer";
echo "</script>";
?>