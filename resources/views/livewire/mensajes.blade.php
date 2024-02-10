<div>
    <div id="ventana-chat" wire:poll.1s="actualizar">
        <div class="relative flex items-center justify-center p-1 rounded space-x-4 bg-orange-200 ">
            <a href="/user/{{$chat->otro->id}}" class="flex items-center">
                <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                <b class="text-2xl mt-1 items-center pl-3">{{$chat->otro->name}}</b>
            </a>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M10.3 5.6A2 2 0 0 0 7 7v10a2 2 0 0 0 3.3 1.5l5.9-4.9a2 2 0 0 0 0-3l-6-5Z" clip-rule="evenodd"/>
            </svg>
            <a href="/productos/{{$chat->producto_id}}" class="flex items-center">
                <img src="{{$chat->producto->fotos->foto_1}}" class="w-10 sm:w-16 h-10 sm:h-16">
                <b class="text-2xl mt-1 items-center pl-3">{{$chat->producto->nombre}}</b>
            </a>
         </div>
        <br>
        <div class="overflow-y-auto">
        @foreach ($mensajes as $mensaje)
            <div class="mt-1 mb-4 @if ($mensaje->emisor_id == $yo) text-right @else text-left @endif ">
                <strong class="p-2 mb-2 rounded shadow max-w-sm @if ($mensaje->emisor_id == $yo) bg-orange-400 @else bg-gray-300 @endif ">
                    {{ $mensaje->mensaje }}
                </strong>
                <br>
            </div>
        @endforeach
        </div>
    </div>

    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
        <form wire:submit.prevent="enviar">
            <div class="relative flex">
               <input type="text" wire:model="mensaje" placeholder="Escribe tu mensaje" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-5 bg-gray-200 rounded-md py-3">
               <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                  <button type="submit" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                     <span class="font-bold">Enviar</span>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                     </svg>
                  </button>
               </div>
            </div>
        </form>
     </div>
</div>

