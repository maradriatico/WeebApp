<div class="bg-white h-max">
    <div class="mx-auto sm:px-6 lg:px-8 bg-white flex h-screen">
        <div class="w-1/4 bg-gray-300 p-4 overflow-y-auto">
            @foreach ($chats as $chat)
            <div>
                <button class="cursor-pointer p-2 mb-2 bg-orange-300 hover:bg-gray-400" wire:click="cambiarContenido('{{$chat->id}}')">
                    <div class="flex flex-col space-y-4">
                        <!-- Item -->
                        <div class="flex justify-between py-6 px-4 bg-white/30 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('foto-perfil.jpg')}}" {{-- src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" --}} class="h-20 w-20" alt="">
                                <div class="flex flex-col text-left">
                                    <span>{{ $chat->otro->name }}</span>
                                    <span class="font-bold text-lg">{{ $chat->producto->nombre }}</span>
                                    {{-- <span class="text-sm">{{ $chat->mensajes->last()->mensaje }}</span> --}}
                                </div>
                            </div>
                            <div class="flex-none px-4 py-2 text-stone-600 text-xs md:text-sm">
                                {{ $chat->mensajes->last()->updated_at->format('d/m - H:i') }}
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            @endforeach
        </div>
        <div class="flex-1 p-4">
            @if ($contenido)
                @livewire('mensajes', ['contenido' => $contenido], key($contenido))
            @else
                <h1>Selecciona una conversación</h1>
            @endif
        </div>
    </div>
</div>
