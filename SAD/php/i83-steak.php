<!DOCTYPE html>
<html>

<head>
    <?php
    if (session_start()) {
        session_destroy();
    }
    if (isset($_GET["message"])) {
        if ($_GET["message"] == "ac") {
            $message = "使用者帳號錯誤";
        } else if ($_GET["message"] == "ps") {
            $message = "密碼輸入錯誤";
        }
        echo "<script type='text/javascript'>alert('$message'); location.href='./i83-steak.php'</script>";
    }

    ?>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>i83厚切牛排 員工管理系統</title>
    <link rel="icon" href="../image/i83.ico" type="image/x-icon">
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/shift.css">
    <link rel="stylesheet" href="../css/i83-steak.css">
    <script type="text/javascript" src="../js/shift.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/smtp.js"></script>
</head>

<body>
    <div class="modal fade" id="forgive_pass_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-inline hidden-element" role="form" action="forgive_pass.php" method="post">
                    <div id="modal-body-search" class="modal-body">
                        <label>輸入您註冊的電子信箱<input type="text" id="email" class="form-control" name="forgive_email" placeholder="ex. ccc@gmail.com" require></label>
                    </div>
                    <span id="chkmsg"></span>
                    <div id="modal-footer-search" class="modal-footer">
                        <button type="button" id="forgive_id" class="btn btn-primary forgive_pass" onclick="sendmail()">
                            送出
                        </button>
                        <button type="button" class="btn btn-secondary re_chkmsg" data-bs-dismiss="modal">關閉</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <header>
        <div class="container">
            <div class="row">
                <strong>i83 員工管理系統</strong>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-4 d-none d-md-block" style="margin-top:3%;margin-bottom:5%;">
                <img src="../image/i83.png" width="60%;">
            </div>
            <div class="col-4 d-none d-sm-block d-md-none" style="margin-top:10%;margin-bottom:10%;">
                <img src="../image/i83.png" width="130px">
            </div>
            <div class="col-4 d-block d-sm-none" style="margin-top:15%;margin-bottom:15%;">
                <img src="../image/i83.png" width="100px">
            </div>
            <div class="col-8">
                <div class="row align-items-start">
                    <div class="col-12 d-none d-lg-block">
                        <p><span style="font-size: 3.5em;">i83 厚切牛排</span>　<span style="font-size: 2em;">排餐 丼飯 炸物</span></p>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <p><span style="font-size: 2em;">i83 厚切牛排</span></p>
                        <p><span style="font-size: 1.2em;">排餐 丼飯 炸物</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="logcheck.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <input style="width:80%;margin-bottom:6%;" type="text" name="account" placeholder="帳號" maxlength="15" required>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-md-3 col-lg-3 col-xl-3"></div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <input style="width:80%;margin-bottom:4%;" type="password" name="pass" placeholder="輸入密碼" maxlength="15" required>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3"></div>
            </div>
            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#forgive_pass_id" class="link-primary">忘記密碼?</button><br><br>
            <button class="btn btn-lg btn-primary btn-block">登入</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.forgive_pass', function() {
            var email = $('#email').val();
            $.ajax({
                type: "POST",
                url: "search_email.php",
                data: {
                    search_email: email
                },
                success: function(data) {
                    var send = IsEmail(email);
                    if (data == 0 && send!=0) {
                        alert("查無此信箱");
                    } else if(data!=0 && send!=0){
                        sendmail(send, data);
                        $("#chkmsg").html('<p style="margin-left:4%;color:red">請依所輸之郵件，查看密碼</p><p style="margin-left:4%;color:red">如未收到郵件，請於30秒後再次送出</p>')
                    }
                }
            })
        })

        $(document).on('click','.re_chkmsg',function(){
            $("#chkmsg").html("");
        })

        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                alert("請輸入正確的信箱格式");
                return 0;
            } else {
                return email;
            }
        }

        function sendmail(send, text) {
            Email.send({
                SecureToken: "06d26865-a9c2-4d4e-88bb-8f08762fef10",
                To: '' + String(send),
                From: "ddmknhi@gmail.com",
                Subject: "您的密碼",
                Body: "" + String(text) + "",
                /*Attachments: [{
                    name: "",
                    path: "https://www.google.com/url?sa=i&url=https%3A%2F%2Fstore.line.me%2Fstickershop%2Fproduct%2F14806944%2Fzh-Hant&psig=AOvVaw2LxaJHYkDrGt3UUGp-eXy6&ust=1642097105309000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCOifzMrmrPUCFQAAAAAdAAAAABAD"
                }]*/
            }).then(

            );
        }
    </script>
</body>

</html>