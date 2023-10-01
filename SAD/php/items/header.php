<nav class="navbar navbar-expand-lg navbar-light" style="background-image:url(../image/home_background.jpg);background-repeat: no-repeat;background-size: cover;">
    <div class="container">
    <a class="navbar-brand" href="./main_boss.php"><img src="../image/i83.png" width="80px"><strong style="font-size:28px;">&nbspi83厚切牛排</strong></a>
    
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" >
        <li class="nav-item active" style="padding-left:10px;">
            <a class="nav-link" href="roster.php"><span style="font-size:17px;"><image src="../image/arrow.png" style="width:15px;"><strong style="margin-top:4px;">&nbsp排班</strong></span></a>
        </li>
        <li class="nav-item" style="padding-left:10px;">
            <a class="nav-link" href="employee_attendance.php"><span style="font-size:17px;"><image src="../image/arrow.png" style="width:15px;"><strong style="margin-top:4px;">&nbsp員工出席狀況</strong></span></a>
        </li>
        <li class="nav-item" style="padding-left:10px;">
            <a class="nav-link" href="add.php"><span style="font-size:17px;"><image src="../image/arrow.png" style="width:15px;"><strong style="margin-top:4px;">&nbsp員工基本資料</strong></span></a>
        </li>
        <li class="nav-item" style="padding-left:10px;">
            <a class="nav-link" href="week_schedule.php"><span style="font-size:17px;"><image src="../image/arrow.png" style="width:15px;"><strong style="margin-top:4px;">&nbsp每週班表</strong></span></a>
        </li>
        <li class="nav-item d-block d-lg-none" style="border-top:2px solid rgba(181, 182, 181, 0.459); margin-top:10px; padding-top:10px; margin-bottom:5px; padding-left:10px;">
            <a class="nav-link" href="./i83-steak.php">登出&nbsp(<?php echo $name;?>)</a>
        </li>
        </ul>
    </div>
    <div class="float-right d-none d-lg-block">
        <strong style="font-size:18px;"><?php echo $name;?></strong>&nbsp&nbsp<a href="./i83-steak.php" style="font-size:16px;">登出</a>
    </div>
    </div>
</nav>