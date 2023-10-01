<?php
include("./add_items/name.php");
include("./add_items/employee.php");
session_start();
if (!isset($_SESSION["name"])) {
    echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php">';
} else {
    $name = $_SESSION["name"];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排</title>
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    <link rel="stylesheet" href="../css/shift.css">
    <link rel="stylesheet" href="../css/shift_class.css">
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script-->
    <script type="text/javascript" src="../js/shift.js"></script>
    <script type="text/javascript" src="../js/shift_class.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/shift_add.js"></script>
</head>

<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel_search">
                        基本資料
                    </h4>
                </div>
                <form id="update" role="form" class="form-inline hidden-element">
                    <div id="modal-body-search" class="modal-body">

                    </div>
                    <div id="modal-footer-search" class="modal-footer">
                        <button type="button" class="btn btn-secondary change-to-update">
                            編輯
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        刪除確認
                    </h4>
                </div>
                <div class="modal-body text-center">
                    確認刪除?
                </div>
                <div class="modal-footer">
                    <form id="delete_form" class="form-inline hidden-element" role="form" action="./add_items/drop.php" method="POST">
                        <div class="form-group">
                            <div class="input">
                                <input id="allow" class="form-control" type="hidden" name="allow_name" value="0">
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="confirm(<?php $k = count($result_emp0) + count($result_emp1);
                                                                                                                    echo $k; ?>)">取消</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" onclick="confirm(<?php $k = count($result_emp0) + count($result_emp1);
                                                                                                                echo $k; ?>);document.getElementById('delete_form').submit();">
                            確認
                        </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        新增員工
                    </h4>
                </div>
                <div class="modal-body">

                    <form id="insert_form" class="form-inline hidden-element" role="form" action="./add_items/insert.php" method="post">
                        <div class="form-group">
                            <div class="input">
                                <label>姓名<input type="text" class="form-control" name="new_name" maxlength="10" placeholder="ex. 董峰瑋" pattern="^[\u4e00-\u9fa5a-zA-Z]+$" required></label>
                                <br>
                                <label>身分證字號<input type="text" class="form-control" name="new_id" maxlength="10" placeholder="ex. A123456789" pattern="^[A-Z]{1}[1-2]{1}[0-9]{8}$" required></label>
                                <br>
                                <label>
                                    性別
                                    <select name="new_gender" class="form-select" aria-label="Default select example" required>
                                        <option value="男" required>男性</option>
                                        <option value="女" required>女性</option>
                                    </select>
                                </label>
                                <br>
                                <label>生日<input type="date" class="form-control" name="new_birthday" required></label>
                                <br>
                                <label>電話<input type="text" class="form-control" name="new_phone" maxlength="10" placeholder="ex. 0987654321" pattern="^09\d{8}$" required></label>
                                <br>
                                <label>電子郵件<input type="email" class="form-control" name="new_email" placeholder="ex. ccc@gmail.com" pattern="[_.0-9a-z-]+@([0-9a-z-]+.)+[a-z]{2,3}$" require></label><br>
                                <label>地址<input type="text" class="form-control" name="new_address" maxlength="100" placeholder="ex. 40256台中市南區復興北路372號" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9]+$" required></label>
                                <br>
                            </div>
                            <label>
                                職稱
                                <select name="new_employ" class="form-select" aria-label="Default select example" required>
                                    <option value="正職" required>正職</option>
                                    <option value="兼職" required>兼職</option>
                                </select>
                            </label>
                            <p></p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">送出</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        關閉
                    </button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <form id="search_form" class="form-inline hidden-element" role="form" action="" method="POST">
        <div class="form-group">
            <div class="input">
                <input id="search" class="form-control" type="hidden" name="search_name" value="0">
                <input id="submit" class="form-control" type="submit" style="display:none;">
            </div>
        </div>
    </form>

   <?php include("items/header.php");?>
    </div>

    <div>
        <p></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6 d-none d-sm-block list-group" id="reset">
                <div class="shadow" style="height: 450px;background-color:#FFEEDD;overflow-y:auto">
                    <br>
                    <h2>正職</h2>
                    <br>

                    <?php
                    $i = 0;
                    $y = 0;
                    while (isset($result_emp1[$i])) {
                        $w = implode($result_emp1[$i]);
                        echo '<input id="' . $y . '" onclick="tdclick(';
                        echo 'this.id';
                        echo ')" style="margin-left:5%;width: 90%;" class="btn btn-secondary list-group-item list-group-item-light drop_allow shadow search" data-bs-toggle="modal" data-bs-target="#myModal" data-id="' . $w . '" value="' . $w . '" name="drop_allow">';
                        echo '</input>';
                        echo '<br>';
                        $i++;
                        $y++;
                    }
                    ?>
                </div>
            </div>

            <div class="col-12 d-block d-sm-none list-group" id="reset">
                <div class="shadow" style="height: 100%;background-color:#FFEEDD;overflow-y:auto;margin-left:4%">
                    <br>
                    <h2>正職</h2>
                    <br>

                    <?php
                    $i = 0;
                    while (isset($result_emp1[$i])) {
                        $w = implode($result_emp1[$i]);
                        echo '<input id="' . $y . '" onclick="tdclick(';
                        echo 'this.id';
                        echo ');" style="margin-left:5%;width: 90%;" class="btn btn-secondary list-group-item list-group-item-light drop_allow shadow search" data-bs-toggle="modal" data-bs-target="#myModal" data-id="' . $w . '" value="' . $w . '" name="drop_allow">';

                        echo '</input>';
                        echo '<br>';
                        $i++;
                        $y++;
                    }
                    ?>
                </div>
            </div>

            <div class="col-6 d-none d-sm-block list-group">
                <div class="shadow" style="height: 450px;background-color:#E8FFF5;overflow-y:auto">
                    <br>
                    <h2>兼職</h2>
                    <br>

                    <?php
                    $i = 0;
                    while (isset($result_emp0[$i])) {
                        $w = implode($result_emp0[$i]);
                        echo '<input id="' . $y . '" onclick="tdclick(';
                        echo 'this.id';
                        echo ')" style="margin-left:5%;width: 90%;" class="btn btn-secondary list-group-item list-group-item-light drop_allow shadow search" data-bs-toggle="modal" data-bs-target="#myModal" data-id="' . $w . '" value="' . $w . '">';
                        echo '</input>';
                        echo '<br>';
                        $i++;
                        $y++;
                    }
                    ?>

                </div>
            </div>

            <div class="col-12 d-block d-sm-none list-group">
                <div class="shadow" style="height: 100%;background-color:#E8FFF5;overflow-y:auto;margin-left:4%">
                    <br>
                    <h2>兼職</h2>
                    <br>

                    <?php
                    $i = 0;
                    while (isset($result_emp0[$i])) {
                        $w = implode($result_emp0[$i]);
                        echo '<input id="' . $y . '" onclick="tdclick(';
                        echo 'this.id';
                        echo ')" style="margin-left:5%;width: 90%;" class="btn btn-info list-group-item list-group-item-light drop_allow shadow search" data-bs-toggle="modal" data-bs-target="#myModal" data-id="' . $w . '" value="' . $w . '">';
                        echo '</input>';
                        echo '<br>';
                        $i++;
                        $y++;
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
    <p></p>
    <div class="container d-none d-sm-block" style="margin-left:6.7%">
        <button class="btn btn-lg btn-secondary btn-block" type="button" id="insert" data-bs-toggle="modal" data-bs-target="#myModal2">新增</button>
        <button class="btn btn-lg btn-danger btn-block" type="button" id="drop" onclick="del(<?php $k = count($result_emp0) + count($result_emp1);
                                                                                                echo $k; ?>)">刪除</button>
        <button class="btn btn-lg btn-secondary btn-block" style="display:none" type="button" id="cancel" onclick="confirm(<?php $k = count($result_emp0) + count($result_emp1);
                                                                                                                            echo $k; ?>)">取消</button>
    </div>
    <div class="container d-block d-sm-none">
        <br><br>
        <button class="btn btn-lg btn-secondary btn-block" type="button" id="insert1" data-bs-toggle="modal" data-bs-target="#myModal2">新增</button>
        <button class="btn btn-lg btn-danger btn-block" type="button" id="drop1" onclick="del(<?php $k = count($result_emp0) + count($result_emp1);
                                                                                                echo $k; ?>)">刪除</button>
        <button class="btn btn-lg btn-secondary btn-block" style="display:none" type="button" id="cancel1" onclick="confirm(<?php $k = count($result_emp0) + count($result_emp1);
                                                                                                                            echo $k; ?>)">取消</button>
        <br><br>
    </div>
    <p></p>
    <footer id="id_footer">

    </footer>

    <!--bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>

</html>