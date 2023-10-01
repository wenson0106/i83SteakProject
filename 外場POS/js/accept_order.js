$(document).ready(function() {
    display();
})

function display() {
    $.getJSON('../php/search_order.php', function(data) {
        $("#order_record_ajax").html(function() {
            var tsr = "";
            for (var i = 0; i < data.length; i++) {
                for (var j = 0; j < 7; j++) {
                    if (j == 0) {
                        tsr += "<p style='font-size:20px;'>" + data[i][j] + "</p>";
                    } else if (j == 1 && data[i][j] != '') {
                        tsr += data[i][j] + "+" + data[i][j + 1] + ",";
                    } else if (j == 3 && data[i][j] != '') {
                        tsr += data[i][j];
                    } else if (j == 4 && data[i][j] != '') {
                        tsr += "," + data[i][j] + "<br>";
                    } else if (j == 5 && data[i][j] != '') {
                        tsr += "備註:" + data[i][j] + "<br>";
                    } else if (j == 6) {
                        tsr += "<div style='color:red;'>數量:" + data[i][j] + "</div><p></p><hr style='margin:auto;width:90%;'>";
                    }
                }

            }
            return tsr;
        })
        setTimeout('display()', 1000);
    })
}

$(document).on('click', '.rice_snack', function() {
    var search_menu = $(this).data('id');
    $("#id_storage_menu_name").val(search_menu);
    $("#input").html(
        '<h5>備註</h5>&nbsp;&nbsp;&nbsp;' +
        '<input type="text" name="memo" rows="3" col="20" style="resize:none;width:210px;height:40px;border-radius:10px;" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9_]+$"></input>'
    );
})

$(document).on('click', '.menu', function() {
    $.ajax({
        type: "POST",
        url: "count_order_id.php",
        success: function(data) {
            var order_arr = [];
            var j = 0;
            for (var i = 3; i < data.length; i = i + 6) {
                order_arr[j] = data[i];
                j++;
            }
            max_order = Math.max.apply(null, order_arr);
            if (max_order >= 0) {
                $("#hidden_modal_id").val(max_order + 1);
                $("#hidden_id").val(max_order + 1);
            }
        }
    })
    var search_menu = $(this).data('id');
    $('#id_storage_menu_name').val(search_menu);
    $.ajax({
        type: "POST",
        url: "choose_maturity_double_meal.php",
        data: {
            storage_menu_name: $(this).data('id'),
        },
        success: function(data) {
            if (data[3] == 1 && data[7] == 0) {
                $("#input").html(
                    '<h5>熟度</h5>&nbsp;&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="三分" required>三分</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="五分" required>五分</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="七分" required>七分</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="全熟" required>全熟</label>' +
                    '<p></p>' +
                    '<h5>醬料</h5>&nbsp;&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="蘑菇醬" required>蘑菇醬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="黑胡椒醬" required>黑胡椒醬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="綜合" required>綜合</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="不要醬" required>不要醬</label>' +
                    '<p></p>' +
                    '<h5>備註</h5>&nbsp;&nbsp;&nbsp;' +
                    '<input type="text" name="memo" rows="3" col="20" style="resize:none;width:210px;height:40px;border-radius:10px;" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9_]+$"></input>'
                );
            } else if (data[3] == 0 && data[7] == 0) {
                $("#input").html(
                    '<h5>醬料</h5>&nbsp;&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="蘑菇醬" required>蘑菇醬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="黑胡椒醬" required>黑胡椒醬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="綜合" required>綜合</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="不要醬" required>不要醬</label>' +
                    '<p></p>' +
                    '<h5>備註</h5>&nbsp;&nbsp;&nbsp;' +
                    '<input type="text" name="memo" rows="3" col="20" style="resize:none;width:210px;height:40px;border-radius:10px;" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9_]+$"></input>'
                );
            } else if (data[3] == 0 && data[7] == 1) {
                $("#input").html(
                    '<h5>雙拚</h5>' +
                    '<p>第一種</p>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat" value="牛" required>牛</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat" value="雞" required>雞</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat" value="豬" required>豬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat" value="魚" required>魚</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat" value="鮭魚" required>+40鮭魚</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat" value="羊" required>羊</label>&nbsp;&nbsp;<br><p></p>' +
                    '<p>第二種</p>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat2" value="牛" required>牛</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat2" value="雞" required>雞</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat2" value="豬" required>豬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat2" value="魚" required>魚</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat2" value="鮭魚" required>+40鮭魚</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="bimeat2" value="羊" required>羊</label>&nbsp;&nbsp;<br><p></p>' +
                    '<h5>熟度</h5>&nbsp;&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="三分" required>三分</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="五分" required>五分</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="七分" required>七分</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="maturity" value="全熟" required>全熟</label>' +
                    '<p></p>' +
                    '<h5>醬料</h5>&nbsp;&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="蘑菇醬" required>蘑菇醬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="黑胡椒醬" required>黑胡椒醬</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="綜合" required>綜合</label>&nbsp;&nbsp;' +
                    '<label><input type="radio" name="sauce" value="不要醬" required>不要醬</label>' +
                    '<p></p>' +
                    '<h5>備註</h5>&nbsp;&nbsp;&nbsp;' +
                    '<input type="text" name="memo" rows="3" col="20" style="resize:none;width:210px;height:40px;border-radius:10px;" pattern="^[\u4e00-\u9fa5_a-zA-Z0-9_]+$"></input>'
                );
            }
        }
    })
})