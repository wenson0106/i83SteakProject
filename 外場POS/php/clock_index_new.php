<!DOCTYPE html>
<html>

<head>
    <meta charset=utf8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83打卡與點餐系統</title>
    <!--bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/clock_on_index.css">
    <script src="../js/clock_index_new.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark" style="background-color:#782222;height:80px">
            <div class="container-fluid">
                <button class="navbar-toggler" style="background-color:#984949;margin-left:20px;" type="button" data-bs-toggle="collapse" data-bs-target="#colnavbar" aria-controls="colnavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h3 style="color:white;font-family: Microsoft JhengHei;margin:auto;text-align:center">i83-POS系統</h3>
            </div>
        </nav>
        <div class="collapse" id="colnavbar">
            <div class="p-4" style="background-color:white;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1 d-none d-md-block"></div>
                        <div class="col-md-3 d-none d-md-block" style="display:flex">
                            <a href="clock_index_new.php" style="margin:auto;align-self:flex-start;"><img src="../image/訂位去背.png" style="width:70%"></a>
                            <br>
                            <h4 style="margin-left:78px;">訂位</h4>
                        </div>
                        <div class="col-md-1 d-none d-md-block"></div>
                        <div class="col-md-3 d-none d-md-block" style="display:flex">
                            <a href="accept_order_new.php" style="margin:auto;align-self:flex-end;"><img src="../image/點餐去背.png" style="width:70%"></a>
                            <br>
                            <h4 style="margin-left:82px;">點餐</h4>
                        </div>
                        <div class="col-md-1 d-none d-md-block"></div>
                        <div class="col-md-3 d-none d-md-block" style="display:flex">
                            <a href="clock_new.php" style="margin:auto;align-self:flex-end;"><img src="../image/打卡去背.png" style="width:70%"></a>
                            <br>
                            <h4 style="margin-left:82px;">打卡</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>
    <div style="text-align:center;">
        <h1>線上訂位</h1>
        <hr class="online_booking_header">
    </div>
    <br>
    <div>
        <table id="ajax_booking_id" align="center" class="table table-striped"  style="width:80%;border-bottom:3px #E0E0E0 solid;" cellpadding="10" border='0'>
            
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>

</html>