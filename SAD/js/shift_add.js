function tdclick(btid) {
    var value_change = document.getElementById(btid).value;
    document.getElementById("allow").setAttribute('value', value_change);
}

function del(k) {
    var i = 0;
    for (i = 0;; i++) {
        try {
            var y = document.querySelector('.list-group-item-light');
            y.setAttribute('class', 'btn btn-danger list-group-item list-group-item-danger drop_allow shadow');
        } catch (e) {
            break;
        }
        var btn = document.getElementById(i);
        try {
            btn.setAttribute('data-bs-target', '#myModal4');
        } catch (e) {
            continue;
        }

    }
    document.getElementById("drop").style.display = "none";
    document.getElementById("insert").style.display = "none";
    document.getElementById("cancel").style.display = "inline-block";
    document.getElementById("drop1").style.display = "none";
    document.getElementById("insert1").style.display = "none";
    document.getElementById("cancel1").style.display = "inline-block";
}

function confirm(k) {
    for (i = 0;; i++) {
        try {
            var y = document.querySelector('.list-group-item-danger');
            y.setAttribute('class', 'btn btn-secondary list-group-item list-group-item-light drop_allow shadow');
        } catch (e) {
            break;
        }
        var btn = document.getElementById(i);
        try {
            btn.setAttribute('data-bs-target', '#myModal');
        } catch (e) {
            continue;
        }
    }
    document.getElementById("drop").style.display = "inline-block";
    document.getElementById("insert").style.display = "inline-block";
    document.getElementById("cancel").style.display = "none";
    document.getElementById("drop1").style.display = "inline-block";
    document.getElementById("insert1").style.display = "inline-block";
    document.getElementById("cancel1").style.display = "none";
}

$(document).on("click", ".search", function() {
    var search_name = $(this).data('id');
    $("#search").val(search_name);
    $.ajax({
        type: 'POST',
        url: './add_items/search.php',
        data: {
            search: document.getElementById("search").value,
        },
        success: function(data) {
            var a = data.split(' ');
            var trStr = '';
            for (var i = 0; i < a.length - 1; i++) {
                trStr += '<p>姓名 : ' + JSON.parse(a[i]).employee_name + '</p>';
                trStr += '<p>身分證字號 : ' + JSON.parse(a[i]).employee_id + '</p>';
                trStr += '<p>性別 : ' + JSON.parse(a[i]).employee_gender + '</p>';
                trStr += '<p>生日 : ' + JSON.parse(a[i]).employee_birthday + '</p>';
                trStr += '<p>電話 : ' + JSON.parse(a[i]).employee_phonenumber + '</p>';
                trStr += '<p>電子郵件: ' + JSON.parse(a[i]).email + '</p>';
                trStr += '<p>地址 : ' + JSON.parse(a[i]).employee_address + '</p>';
                trStr += '<p>職位 : ' + JSON.parse(a[i]).employee_position + '</p>';

            }
            $("#modal-body-search").html(trStr);
        }
    });
})

$(document).on("click", ".change-to-update", function() {
    $("#myModalLabel_search").html("修改員工基本資料");
    $.ajax({
        type: 'POST',
        url: './add_items/search.php',
        data: {
            search: document.getElementById("search").value,
        },
        success: function(data) {
            var a = data.split(' ');
            var trStr = '';
            for (var i = 0; i < a.length - 1; i++) {
                trStr += '<label>姓名<input type="text" id="name" required class="form-control name" name="new_name" maxlength="10" value="' + JSON.parse(a[i]).employee_name + '" pattern="^[\u4e00-\u9fa5a-zA-Z]+$"></label><br>';
                trStr += '<label>身分證字號<input type="text" id="id" class="form-control" name="new_id" maxlength="10" value="' + JSON.parse(a[i]).employee_id + '" pattern="^[A-Z]{1}[1-2]{1}[0-9]{8}$" required></label><br>';
                if (JSON.parse(a[i]).employee_gender == "男") {
                    trStr += '<label>性別<select name="new_gender" id="gender" class="form-select" aria-label="Default select example"><option value="' + JSON.parse(a[i]).employee_gender + '" selected>男性</option><option value="女">女性</option></select>';
                } else {
                    trStr += '<label>性別<select name="new_gender" id="gender" class="form-select" aria-label="Default select example"><option value="男">男性</option><option value="' + JSON.parse(a[i]).employee_gender + '" selected>女性</option></select>';
                }
                trStr += '<label>生日<input type="date" class="form-control" name="new_birthday" id="birthday" value="' + JSON.parse(a[i]).employee_birthday + '" required></label><br>';
                trStr += '<label>電話<input type="text" class="form-control" name="new_phone" id="phone" maxlength="10" value="' + JSON.parse(a[i]).employee_phonenumber + '" pattern="^09[0-9]{8}$" required></label><br>';
                trStr += '<label>電子郵件<input type="email" id="email" class="form-control" name="new_email" placeholder="ex. ccc@gmail.com" pattern="[_.0-9a-z-]+@([0-9a-z-]+.)+[a-z]{2,3}$" value="' + JSON.parse(a[i]).email + '" required></label><br>';
                trStr += '<label>地址<input type="text" class="form-control" name="new_address" id="address" maxlength="100" value="' + JSON.parse(a[i]).employee_address + '" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9]+$" required></label><br>';
                if (JSON.parse(a[i]).employee_position == "正職") {
                    trStr += '<label>職稱<select name="new_employ" id="position" class="form-select" aria-label="Default select example"><option value="' + JSON.parse(a[i]).employee_position + '" selected>正職</option><option value="兼職">兼職</option></select></form>';
                } else {
                    trStr += '<label>職稱<select name="new_employ" id="position" class="form-select" aria-label="Default select example"><option value="正職">正職</option><option value="' + JSON.parse(a[i]).employee_position + '" selected>兼職</option></select></form>';
                }
            }
            var trstr2 = '<button type="submit" id="submit1" class="btn btn-danger confirm_change">確認修改</button><button type="button" class="btn btn-secondary change_cancel">取消</button>';
            $("#modal-body-search").html(trStr);
            $("#modal-footer-search").html(trstr2);
        }
    });
})

$(document).on("click", ".confirm_change", function() {
    $("#update").submit(function() {
        $.ajax({
            type: 'POST',
            url: './add_items/update.php',
            data: {
                change_name: $("#name").val(),
                change_id: $("#id").val(),
                change_gender: $("#gender").val(),
                change_birthday: $("#birthday").val(),
                change_phone: $("#phone").val(),
                change_email: $("#email").val(),
                change_address: $("#address").val(),
                change_position: $("#position").val(),
                e_name: $("#search").val(),
            },
            success: function(data) {
                var a = data.split(' ');
                var trStr = ' ';
                for (var i = 0; i < a.length - 1; i++) {
                    trStr += '<p>姓名 : ' + JSON.parse(a[i]).employee_name + '</p>';
                    trStr += '<p>身分證字號 : ' + JSON.parse(a[i]).employee_id + '</p>';
                    trStr += '<p>性別 : ' + JSON.parse(a[i]).employee_gender + '</p>';
                    trStr += '<p>生日 : ' + JSON.parse(a[i]).employee_birthday + '</p>';
                    trStr += '<p>電話 : ' + JSON.parse(a[i]).employee_phonenumber + '</p>';
                    trStr += '<p>電子郵件: ' + JSON.parse(a[i]).email + '</p>';
                    trStr += '<p>地址 : ' + JSON.parse(a[i]).employee_address + '</p>';
                    trStr += '<p>職位 : ' + JSON.parse(a[i]).employee_position + '</p><p></p><p style="color:red;">修改完成!</p>';

                }
                trstr2 = '<button type="button" class="btn btn-secondary change-to-update">編輯</button>';
                $("#myModalLabel_search").html("基本資料");
                $("#modal-body-search").html(trStr);
                $("#modal-footer-search").html(trstr2);
                $("body").append('<script> setTimeout("history.go(0)",1500); </script>');
            }
        })
        return false;
    })
})

$(document).on("click", ".change_cancel", function() {
    $("#myModalLabel_search").html("基本資料");
    $.ajax({
        type: 'POST',
        url: './add_items/search.php',
        data: {
            search: document.getElementById("search").value,
        },
        success: function(data) {
            var a = data.split(' ');
            var trStr = '';
            for (var i = 0; i < a.length - 1; i++) {
                trStr += '<p>姓名 : ' + JSON.parse(a[i]).employee_name + '</p>';
                trStr += '<p>身分證字號 : ' + JSON.parse(a[i]).employee_id + '</p>';
                trStr += '<p>性別 : ' + JSON.parse(a[i]).employee_gender + '</p>';
                trStr += '<p>生日 : ' + JSON.parse(a[i]).employee_birthday + '</p>';
                trStr += '<p>電話 : ' + JSON.parse(a[i]).employee_phonenumber + '</p>';
                trStr += '<p>電子郵件: ' + JSON.parse(a[i]).email + '</p>';
                trStr += '<p>地址 : ' + JSON.parse(a[i]).employee_address + '</p>';
                trStr += '<p>職位 : ' + JSON.parse(a[i]).employee_position + '</p>';

            }
            trstr2 = '<button type="button" class="btn btn-secondary change-to-update">編輯</button>';
            $("#modal-body-search").html(trStr);
            $("#modal-footer-search").html(trstr2);
        }
    });
})