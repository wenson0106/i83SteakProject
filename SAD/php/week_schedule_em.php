<!DOCTYPE html>
<?php
ini_set("display_errors", "On");
ini_set('mysql.connection_timeout', 300);
ini_set('default_socket_timeout', 300);
require("connect.php");
session_start();
if (!isset($_SESSION["name"])) {
    echo '<meta http-equiv="refresh" content="0;url=./i83-steak.php">';
} else {
    $name = $_SESSION["name"];
}
?>
<html lang="zh-tw">

<head>
    <meta charset=utf8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83管理系統 每周班表</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="../js/shift_add.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="../js/table_to_jpg.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
</head>

<body >
    <?php include("items/header_em.php");?>
    <div style="width:100%;display: block;
    overflow-x: auto;
    white-space: nowrap;padding:50px;">
    <strong style="font-size:24px;">每周班表</strong>
        <div style="width:1300px;height:460px;">
            <div>
                <table id="table_to_jpeg" class="table table-secondary" style="border:2px solid black;">
                    <tr>
                        <td style="width:120px;"></td>
                        <td style="width:120px;"></td>
                        <td>星期一</td>
                        <td>星期二</td>
                        <td>星期三</td>
                        <td>星期四</td>
                        <td>星期五</td>
                        <td>星期六</td>
                        <td>星期日</td>
                    </tr>
                    <tr>
                        <td rowspan="2" align='center' valign="middle">早班</td>
                        <td height="100" align='center' valign="middle">正職</td>
                        <?php
                        $i = 1;
                        for ($i = 1; $i < 8; $i++) {
                            switch ($i) {
                                case 1:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期一' AND employee_position='正職'";
                                    break;
                                case 2:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期二' AND employee_position='正職'";
                                    break;
                                case 3:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期三' AND employee_position='正職'";
                                    break;
                                case 4:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期四' AND employee_position='正職'";
                                    break;
                                case 5:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期五' AND employee_position='正職'";
                                    break;
                                case 6:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期六' AND employee_position='正職'";
                                    break;
                                case 7:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期日' AND employee_position='正職'";
                                    break;
                            }
                            $sel = $conn->query($sql);
                            $morning = $sel->fetchAll(PDO::FETCH_ASSOC);
                            echo '<td class="wid" style="background-color:aliceblue;">';
                            if (empty($morning)) {
                            } else {
                                echo '<div class="row">';
                                foreach ($morning as $value) {
                                    echo '<div class="col-6" style="height:33px;"><p class="pp">'.implode($value).'</p></div>';
                                }
                                echo '</div>';
                            }
                            echo '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td height="100" align='center' valign="middle">兼職</td>
                        <?php
                        $i = 1;
                        for ($i = 1; $i < 8; $i++) {
                            switch ($i) {
                                case 1:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期一' AND employee_position='兼職'";
                                    break;
                                case 2:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期二' AND employee_position='兼職'";
                                    break;
                                case 3:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期三' AND employee_position='兼職'";
                                    break;
                                case 4:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期四' AND employee_position='兼職'";
                                    break;
                                case 5:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期五' AND employee_position='兼職'";
                                    break;
                                case 6:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期六' AND employee_position='兼職'";
                                    break;
                                case 7:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='早班' AND finalschedule_date='星期日' AND employee_position='兼職'";
                                    break;
                            }
                            $sel = $conn->query($sql);
                            $morning = $sel->fetchAll(PDO::FETCH_ASSOC);
                            echo '<td class="wid" style="background-color:aliceblue;">';
                            if (empty($morning)) {
                            } else {
                                echo '<div class="row">';
                                foreach ($morning as $value) {
                                    echo '<div class="col-6" style="height:33px;"><p class="pp">'.implode($value).'</p></div>';
                                }
                                echo '</div>';
                            }
                            echo '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td rowspan="2" align='center' valign="middle">晚班</td>
                        <td height="100" align='center' valign="middle">正職</td>
                        <?php
                        $i = 1;
                        for ($i = 1; $i < 8; $i++) {
                            switch ($i) {
                                case 1:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期一' AND employee_position='正職'";
                                    break;
                                case 2:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期二' AND employee_position='正職'";
                                    break;
                                case 3:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期三' AND employee_position='正職'";
                                    break;
                                case 4:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期四' AND employee_position='正職'";
                                    break;
                                case 5:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期五' AND employee_position='正職'";
                                    break;
                                case 6:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期六' AND employee_position='正職'";
                                    break;
                                case 7:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期日' AND employee_position='正職'";
                                    break;
                            }
                            $sel = $conn->query($sql);
                            $morning = $sel->fetchAll(PDO::FETCH_ASSOC);
                            echo '<td class="wid" style="background-color:aliceblue;">';
                            if (empty($morning)) {
                            } else {
                                echo '<div class="row">';
                                foreach ($morning as $value) {
                                    echo '<div class="col-6" style="height:33px;"><p class="pp">'.implode($value).'</p></div>';
                                }
                                echo '</div>';
                            }
                            echo '</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td height="100" align='center' valign="middle">兼職</td>
                        <?php
                        $i = 1;
                        for ($i = 1; $i < 8; $i++) {
                            switch ($i) {
                                case 1:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期一' AND employee_position='兼職'";
                                    break;
                                case 2:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期二' AND employee_position='兼職'";
                                    break;
                                case 3:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期三' AND employee_position='兼職'";
                                    break;
                                case 4:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期四' AND employee_position='兼職'";
                                    break;
                                case 5:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期五' AND employee_position='兼職'";
                                    break;
                                case 6:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期六' AND employee_position='兼職'";
                                    break;
                                case 7:
                                    $sql = "SELECT finalschedule_name FROM finalschedule AS A JOIN employee AS B ON A.finalschedule_name=B.employee_name WHERE finalschedule_shifts='晚班' AND finalschedule_date='星期日' AND employee_position='兼職'";
                                    break;
                            }
                            $sel = $conn->query($sql);
                            $morning = $sel->fetchAll(PDO::FETCH_ASSOC);
                            echo '<td class="wid" style="background-color:aliceblue;">';
                            if (empty($morning)) {
                            } else {
                                echo '<div class="row">';
                                foreach ($morning as $value) {
                                    echo '<div class="col-6" style="height:33px;"><p class="pp">'.implode($value).'</p></div>';
                                }
                                echo '</div>';
                            }
                            echo '</td>';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12" style="text-align:center;">
                    <button class="btn btn-block" type="button" onclick="table_to_jpeg()" style="margin:5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
</body>

</html>