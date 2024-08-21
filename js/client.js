$(document).ready(function () {
    var socket = io();

    // Manejar el envío de mensajes
    $('#message-form').submit(function (e) {
        e.preventDefault(); // Evitar que se recargue la página

        var message = $('#message-input').val().trim();

        if (message !== '') {
            socket.emit('chat message', message);
            $('#message-input').val('');
        }
    });

    // Recibir y mostrar mensajes nuevos
    socket.on('chat message', function (msg) {
        $('.messages-container').append($('<div class="message">').text(msg));
        $('.messages-container').scrollTop($('.messages-container')[0].scrollHeight); // Hacer scroll al último mensaje
    });
});
