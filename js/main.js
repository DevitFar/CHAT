$(document).ready(function () {
    $('#message-form').submit(function (e) {
        e.preventDefault();

        var message = $('#message-input').val();
        if (message.trim() !== '') {
            $.post('send_message.php', { message: message }, function (response) {
                $('#message-input').val('');
                $('#chat-box').prepend(response);
            });
        }
    });
});
