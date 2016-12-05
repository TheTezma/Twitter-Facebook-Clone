$(document).ready(function() {
    var interval = setInterval(function() {
        $.ajax({
            url: '../scripts/process-messages.php',
            success: function(data) {
                $('#messages').html(data);
            }
        });
    }, 1000);
});