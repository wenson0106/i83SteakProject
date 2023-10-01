<?php
require("employee.php")
?>
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
    <script src="../js/clock.js"></script>
</head>

<body onload="show()">
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
                            <a href="" style="margin:auto;align-self:flex-end;"><img src="../image/打卡去背.png" style="width:70%"></a>
                            <br>
                            <h4 style="margin-left:82px;">打卡</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade" id="modal_clock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_clock_in"></h4>
                    <button type="type" class="btn" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                        </svg>
                    </button>

                </div>
                <div id="modal-body-search" class="modal-body">
                    <h5 style="margin-left:5%">現在時間</h5>
                    <p></p>
                    <ul class="list-group">
                        <li id="display_time" class="list-group-item list-group-item-secondary" style="text-align:center;color:black;width:80%;margin-left:10%;box-shadow:2px 2px 2px #444;">
                            <p id="test" style="font-size:20px"></p>
                            <strong>
                                <p id="test2" style="font-size:24px"></p>
                            </strong>
                        </li>
                    </ul>
                    <p id="change_ok" style="color:red;"></p>
                </div>
                <div id="modal-footer-search" class="modal-footer">
                    <form id="clock_form" class="form-inline hidden-element" role="form" action="clock_db.php" method="POST">
                        <div class="form-group">
                            <div class="input">
                                <input id="name" class="form-control inout_name" type="hidden" name="clock_name" value="0">
                                <input id="time" class="form-control inout_time" type="hidden" name="clock_time" value="0">
                            </div>
                        </div>
                        <button type="submit" id="in" class="btn btn-success in" style="margin:auto;padding:3%;width:120px;height:50px;">
                            打卡上班
                        </button>
                    </form>
                    <form id="clock_form" class="form-inline hidden-element" role="form" action="clock_db_out.php" method="POST">
                        <div class="form-group">
                            <div class="input">
                                <input id="name_out" class="form-control inout_name" type="hidden" name="clock_name_out" value="0">
                                <input id="time_out" class="form-control inout_time" type="hidden" name="clock_time_out" value="0">
                            </div>
                        </div>
                        <button type="submit" id="out" class="btn btn-warning out" style="margin:auto;padding:3%;width:120px;height:50px">
                            打卡下班
                        </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="container-fluid" style="text-align:center;">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <p></p>
                <header>
                    <h1>打卡</h1>
                    <p></p>
                    <hr class="online_booking_header">
                </header>
                <p></p>
                <div class="row">
                    <div class="col-6">
                        <?php
                        $i = 0;
                        $y = 0;
                        while (isset($result_emp1[$i])) {
                            $w = implode($result_emp1[$i]);
                            echo '<input id="' . $y . '"';
                            echo 'class="btn btn-secondary clock" data-bs-toggle="modal" data-bs-target="#modal_clock" value="' . $w . '" style="padding:2%;width:80%;margin-left:20%;box-shadow: 3px 3px 3px #444;">';
                            echo '</input>';
                            echo '<p></p>';
                            $i++;
                            $y++;
                        }
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                        $i = 0;
                        $y = count($result_emp1);

                        while (isset($result_emp0[$i])) {
                            $w = implode($result_emp0[$i]);
                            echo '<input id="' . $y . '"';
                            echo 'class="btn btn-secondary clock" data-bs-toggle="modal" data-bs-target="#modal_clock" value="' . $w . '" style="padding:2%;width:80%;margin-right:20%;box-shadow: 3px 3px 3px #444;">';
                            echo '</input>';
                            echo '<p></p>';
                            $i++;
                            $y++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>

</html>