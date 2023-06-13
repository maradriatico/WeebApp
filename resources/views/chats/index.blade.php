<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white">
            {{-- @livewire('chat', ['receptorId'=> $receptorId, 'productoId'=>$productoId]) --}}
            <div>
                {{-- @dd($chats) --}}
                @foreach ($chats as $chat)
                <a href="/chat/{{$chat->id}}">
                    <div class="w-full md:w-1/2 lg:w-1/3 border">
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
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
