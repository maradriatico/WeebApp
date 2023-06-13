<div>
    <div>

        @foreach ($mensajes as $mensaje)
            <div>
                <strong>From:</strong> {{ $mensaje->emisor_id }}
                <br>
                <strong>To:</strong> {{ $mensaje->receptor_id }}
                <br>
                <strong>Mensaje:</strong> {{ $mensaje->mensaje }}
            </div>
            <hr>
        @endforeach
    </div>

    <br>

    <form wire:submit.prevent="enviar">
        <input wire:model="mensaje" type="text" placeholder="Escribe tu mensaje">
        <button type="submit">Enviar </button>

    <script>

        Pusher.logToConsole = true;

        var pusher = new Pusher('14a86b5e868d5c8033e9', {
              cluster: 'eu'
            });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('message-sent', function(data) {
              window.livewire.emit('enviar', data);
            });
    </script>
</div>
