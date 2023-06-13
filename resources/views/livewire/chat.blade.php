<div>
    <div>
        {{-- @dd($mensajes) --}}
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
</div>
