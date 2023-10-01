<?php
require("menu_name.php");
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
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/accept_order_new.css">
    <script src="../js/accept_order.js"></script>
</head>

<body>
    <div class="modal fade" id="accept_order_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="modal-body" class="modal-body">
                    <form id="accept_order_modal_form" class="form-inline hidden-element" role="form" action="storage_menu.php" method="post">
                        <input id="id_storage_menu_name" class="form-control" type="hidden" name="storage_menu_name" value="0">
                        <input type="hidden" class="form-control" id="hidden_modal_id" name="hidden_name" value="0">
                        <div class="form-group">
                            <div id="input" class="input">
                                <h5>雙拚</h5>
                                <p>第一種</p>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat" value="牛" required>牛</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat" value="雞" required>雞</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat" value="豬" required>豬</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat" value="魚" required>魚</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat" value="鮭魚" required>+40鮭魚</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat" value="羊" required>羊</label>&nbsp;&nbsp;<br>
                                <p></p>
                                <p>第二種</p>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat2" value="牛" required>牛</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat2" value="雞" required>雞</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat2" value="豬" required>豬</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat2" value="魚" required>魚</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat2" value="鮭魚" required>+40鮭魚</label>&nbsp;&nbsp;
                                <label><input type="radio" name="bimeat2" value="羊" required>羊</label>&nbsp;&nbsp;<br>
                                <p></p>
                                <h5>熟度</h5>&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="maturity" value="三分" required>三分</label>&nbsp;&nbsp;
                                <label><input type="radio" name="maturity" value="五分" required>五分</label>&nbsp;&nbsp;
                                <label><input type="radio" name="maturity" value="七分" required>七分</label>&nbsp;&nbsp;
                                <label><input type="radio" name="maturity" value="全熟" required>全熟</label>
                                <p></p>
                                <h5>醬料</h5>&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="sauce" value="蘑菇醬" required>蘑菇醬</label>&nbsp;&nbsp;
                                <label><input type="radio" name="sauce" value="黑胡椒醬" required>黑胡椒醬</label>&nbsp;&nbsp;
                                <label><input type="radio" name="sauce" value="綜合" required>綜合</label>&nbsp;&nbsp;
                                <label><input type="radio" name="sauce" value="不要醬" required>不要醬</label>
                                <p></p>
                                <h5>備註</h5>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="memo" rows="3" col="20" style="resize:none;width:210px;height:40px;border-radius:10px;" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9_]+$"></input>
                            </div>
                        </div>

                </div>
                <div id="modal-footer" class="modal-footer">
                    <button type="submit" class="btn" id="accept_order_confirm_id" name="accept_order_confirm" style="border:1px #2894FF solid;width:70px;height:40px;background-color:#66B3FF">確定</button>
                    <button type="button" class="btn" name="accept_order_cancel" data-bs-dismiss="modal" style="border:1px #BEBEBE solid;width:70px;height:40px;background-color:#F0F0F0">取消</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="modal fade" id="final_accept_order_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="modal-body" class="modal-body">
                    <form class="form-inline hidden-element" role="form" action="final_order_confirm" method="post">
                        <div class="form-group">
                            <div id="input" class="input">
                                <h5>桌號/電話號碼</h5>
                                <br>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber_name" placeholder="請輸入桌號或電話號碼" required>
                                <input type="hidden" class="form-control" id="hidden_id" name="hidden_name_final" value="0">
                                <p></p>
                                <h5>取餐時間</h5>
                                <input type="time" class="form-control" id="time_id" name="takeout_time">
                            </div>
                        </div>
                </div>
                <div id="modal-footer" class="modal-footer">
                    <button type="submit" class="btn" name="final_confirm" id="final_confirm_id" style="border:1px #2894FF solid;width:70px;height:40px;background-color:#66B3FF">確定</button>
                    <button type="button" class="btn" name="final_cancel" id="final_cancel_id" data-bs-dismiss="modal" style="border:1px #BEBEBE solid;width:70px;height:40px;background-color:#F0F0F0">取消</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

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
                            <h4 style="margin:auto;width:52.5%">訂位</h4>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-single-tab" style="width:25%" data-bs-toggle="tab" data-bs-target="#nav-single" type="button" role="tab" aria-controls="nav-single" aria-selected="true">單打獨鬥區</button>
                        <button class="nav-link" id="nav-both-tab" style="width:25%" data-bs-toggle="tab" data-bs-target="#nav-both" type="button" role="tab" aria-controls="nav-both" aria-selected="false">分進合擊區</button>
                        <button class="nav-link" id="nav-rice-tab" style="width:25%" data-bs-toggle="tab" data-bs-target="#nav-rice" type="button" role="tab" aria-controls="nav-rice" aria-selected="false">米食區</button>
                        <button class="nav-link" id="nav-fry-tab" style="width:25%" data-bs-toggle="tab" data-bs-target="#nav-fry" type="button" role="tab" aria-controls="nav-fry" aria-selected="false">炸物區</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active content" id="nav-single" role="tabpanel" aria-labelledby="nav-single-tab">
                        <br>
                        <p></p>
                        <div class="row gy-3 align-items-center">
                            <?php
                            $i = 0;
                            while ($row_menu_name[$i][0] == '單打獨鬥區') {
                                echo '<div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="width:234px;height:90px;background-color:#333333;color:white;border:2px white solid;font-size: 18px;" class="btn btn-secondary menu" data-bs-toggle="modal" data-bs-target="#accept_order_modal" data-id="' . $row_menu_name[$i][1] . '" value="' . $row_menu_name[$i][1] . '">';
                                echo $row_menu_name[$i][1];
                                echo '</button></div>';
                                $i++;
                            }
                            ?>
                            <p></p>
                            <br>
                        </div>
                    </div>
                    <div class="tab-pane fade content" id="nav-both" role="tabpanel" aria-labelledby="nav-both-tab">
                        <br>
                        <p></p>
                        <div class="row gy-3 align-items-center">
                            <?php
                            while ($row_menu_name[$i][0] == '分合進擊區') {
                                echo '<div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="width:234px;height:90px;background-color:#333333;color:white;border:2px white solid;font-size: 18px;" class="btn btn-secondary menu" data-bs-toggle="modal" data-bs-target="#accept_order_modal" data-id="' . $row_menu_name[$i][1] . '" value="' . $row_menu_name[$i][1] . '">';
                                echo $row_menu_name[$i][1];
                                echo '</button></div>';
                                $i++;
                            }
                            ?>
                            <p></p>
                            <br>
                        </div>
                    </div>
                    <div class="tab-pane fade content" id="nav-rice" role="tabpanel" aria-labelledby="nav-rice-tab">
                        <br>
                        <p></p>
                        <div class="row gy-3 align-items-center">
                            <?php
                            while ($row_menu_name[$i][0] == '米食區') {
                                echo '<div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="width:234px;height:90px;background-color:#333333;color:white;border:2px white solid;font-size: 18px;" class="btn btn-secondary rice_snack menu_rice" data-bs-toggle="modal" data-bs-target="#accept_order_modal"  data-id="' . $row_menu_name[$i][1] . '" value="' . $row_menu_name[$i][1] . '">';
                                echo $row_menu_name[$i][1];
                                echo '</button></div>';
                                $i++;
                            }
                            ?>
                            <p></p>
                            <br>
                        </div>
                    </div>
                    <div class="tab-pane fade content" id="nav-fry" role="tabpanel" aria-labelledby="nav-fry-tab">
                        <br>
                        <p></p>
                        <div class="row gy-3 align-items-center">
                            <?php
                            while ($row_menu_name[$i][0] == '游擊區') {
                                echo '<div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="width:234px;height:90px;background-color:#333333;color:white;border:2px white solid;font-size: 18px;" class="btn btn-secondary rice_snack" data-bs-toggle="modal" data-bs-target="#accept_order_modal" data-id="' . $row_menu_name[$i][1] . '" value="' . $row_menu_name[$i][1] . '">';
                                echo $row_menu_name[$i][1];
                                echo '</button></div>';
                                $i++;
                                if ($i == count($row_menu_name)) {
                                    break;
                                }
                            }
                            ?>
                            <p></p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div style="border:2px black solid;border-radius:30px;width:100%;height:420px;background-color: #CCCCCC;box-shadow:2px 2px 2px #7B7B7B;">
                    <p></p>
                    <h3 style="text-align:center">點餐紀錄</h3>
                    <hr style="margin:auto;width:90%;">
                    <div id="order_record_ajax" style="overflow-y:auto;height:330px;text-align:center">

                    </div>
                </div>
                <p></p>
                <br>

                <button type="button" class="btn final menu" style="color:white;margin-left:20px;border:2px #283b42 solid;width:90%;height:50px;background-color:#1D6A96" data-bs-toggle="modal" data-bs-target="#final_accept_order_modal"><strong>送出</strong></button>
                <p></p>
                <form class="form-inline hidden-element" role="form" action="final_order_cancel.php" method="post">
                    <button type="sumbit" class="btn" style="margin-left:20px; border:2px #BEBEBE solid;width:90%;height:50px;background-color:#F0F0F0">取消</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>