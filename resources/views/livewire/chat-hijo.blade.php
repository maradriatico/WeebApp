<div>
    <div id="ventana-chat" wire:poll.2s="actualizar">
        <b>Conversación con {{$chat->otro->name}} sobre {{$chat->producto->nombre}}</b>
        <br>
        @foreach ($mensajes as $mensaje)
            <div class=" mb-4 @if ($mensaje->emisor_id == $yo) text-right @else text-left @endif ">
                <strong class="p-2 mb-2 rounded shadow max-w-sm @if ($mensaje->emisor_id == $yo) bg-blue-500 @else bg-gray-300 @endif ">
                    {{ $mensaje->mensaje }}
                </strong>
                <br>
            </div>
        @endforeach
    </div>

    <br>

    <form wire:submit.prevent="enviar">
        <input wire:model="mensaje" type="text" placeholder="Escribe tu mensaje">
        <button type="submit">Enviar </button>


</div>

