<!DOCTYPE html>

<html>
  <head>
    <?php 
        include("conn.php");
        $Individual_meal_sql="select * from menu where menu_class like 'Individual'";
        $Individual_meal_result=$link->query($Individual_meal_sql);
    
        $Multiple_meal_sql="select * from menu where menu_class like 'Multiple'";
        $Multiple_meal_result=$link->query($Multiple_meal_sql);

        $Rice_meal_sql="select * from menu where menu_class like 'Rice'";
        $Rice_meal_result=$link->query($Rice_meal_sql);

        $Dessert_meal_sql="select * from menu where menu_class like 'Dessert'";
        $Dessert_meal_result=$link->query($Dessert_meal_sql);
    ?>

    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排 菜單</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">  
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  </head> 
  <body style="overflow-x:hidden;">
    <?php include("items/header.php");?>

    <div class="d-block d-sm-none">
    <?php 
    for($i=1;$i<=8;$i++){
        echo '<div style="margin:20px;text-align: center;"><img src="../image/menu_image/I83_menu'.$i.'.jpg" style="box-shadow:3px 3px 12px gray;width:100%;"></div>';
    }
    ?>   
    </div>

    <div class="row d-none d-sm-block">
        <div class="col-sm-8 col-md-6 offset-sm-2 offset-md-3">
    <?php 
    for($i=1;$i<=8;$i++){
        echo '<div style="margin:50px;text-align: center;"><img src="../image/menu_image/I83_menu'.$i.'.jpg" style="box-shadow:3px 3px 12px gray;width:100%;"></div>';
    }
    ?>   
        </div>
    </div>

    <?php include("items/footer.php") ?>

  </body>

</html>

<!--bootstrap JS-->






