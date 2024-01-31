<div class="bg-white h-max">
    Este es la ventana donde se ven los chats {{-- {{dd($conver[1]->id)}} --}}
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white">
            @foreach ($chats as $chat)
            <div>
                <button class="w-full md:w-1/2 lg:w-1/3 border bg-gray-500" wire:click="cambiarContenido('{{$chat->id}}')">
                    <div class="flex flex-col space-y-4">
                        <!-- Item -->
                        <div class="flex justify-between py-6 px-4 bg-white/30 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" class="h-20 w-20" alt="">
                                <div class="flex flex-col space-y-1">
                                    <span>{{ $chat->otro->name }}</span>
                                    <span class="font-bold text-lg">{{ $chat->producto->nombre }}</span>
                                    <span class="text-sm">{{ $chat->mensajes->last()->mensaje }}</span>
                                </div>
                            </div>
                            <div class="flex-none px-4 py-2 text-stone-600 text-xs md:text-sm">
                                17m ago
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            @endforeach


            <div>
                @if ($contenido)
                    @livewire('chat-hijo', ['contenido' => $contenido], key($contenido))
                @else
                    <h1>Selecciona una conversación</h1>
                @endif
            </div>

        </div>
    </div>

</div>
