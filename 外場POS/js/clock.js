$(document).on('click', '.clock', function() {
    var name_ = $(this).val();
    var date = new Date();
    var now = "";
    now = date.getFullYear() + "-";
    now = now + (date.getMonth() + 1) + "-";
    now = now + date.getDate() + " ";
    now = now + date.getHours() + ":";
    now = now + date.getMinutes() + ":";
    now = now + date.getSeconds();
    $('#modal_clock_in').html(name_);
    $('.inout_name').attr('value', name_);
    $('.inout_time').attr('value', now);

    $.ajax({
        type: 'POST',
        url: 'determine_clock.php',
        data: {
            determine_name: $(this).val(),
        },
        success: function(data) {
            if (data == 1) {
                $('#in').css('display', 'none')
                $('#out').css('display', 'inline-block')
            } else if (data == 03) {
                $('#in').css('display', 'inline-block')
                $('#out').css('display', 'inline-block')
            } else {
                $('#in').css('display', 'none')
                $('#out').css('display', 'none')
            }
        }
    })
})

function show() {
    var date = new Date();
    var now = "";
    var now2 = "";
    now = date.getFullYear() + "年";
    now = now + (date.getMonth() + 1) + "月";
    now = now + date.getDate() + "日";
    now2 = date.getHours() + " " + ":" + " ";
    if (date.getMinutes() < 10) {
        now2 = now2 + '0' + date.getMinutes() + " " + ":" + " ";
    } else {
        now2 = now2 + date.getMinutes() + " " + ":" + " ";
    }
    if (date.getSeconds() < 10) {
        now2 = now2 + '0' + date.getSeconds();
    } else {
        now2 = now2 + date.getSeconds();
    }
    document.getElementById("test").innerHTML = now;
    document.getElementById("test2").innerHTML = now2;
    setTimeout("show()", 1000);
}