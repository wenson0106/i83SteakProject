$(document).ready(function() {
    display_booking();
})

function display_booking() {
    $.getJSON('../php/search_booking.php', function(data) {
        $("#ajax_booking_id").html(function() {
            var tsr = "<tr><td>稱呼</td><td>電話</td><td>人數</td><td>時間</td><td>備註</td></tr>";
            for (var i = 0; i < data.length; i++) {
                for (var j = 0; j < 5; j++) {
                    tsr += '<td>' + data[i][j] + '</td>';
                }
                tsr += "</tr>";
            }
            return tsr;
        })
        setTimeout('display_booking()', 1000);
    })
}