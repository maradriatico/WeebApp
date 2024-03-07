<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">

        <div>
            <h1>Posibles compradores</h1>
        </div>

        <div class="">
            @foreach ($chats as $chat)
                    <div class="w-full md:w-1/2 lg:w-1/3 border bg-gray-400">
                        <a href="/productos/{{$chat->producto_id}}/vender">
                        <div class="flex flex-col space-y-4">
                            <!-- Item -->
                            <div class="flex justify-between py-6 px-4 bg-white/30 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" class="h-20 w-20" alt="">
                                    <div class="flex flex-col space-y-1">
                                        <span class="font-bold text-lg">{{ $chat->otro->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
                <div class="w-full md:w-1/2 lg:w-1/3 border bg-gray-400">
                    <a href="/productos/{{$producto->id}}/vender">
                    <div class="flex flex-col space-y-4">
                        <!-- Item -->
                        <div class="flex justify-between py-6 px-4 bg-white/30 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" class="h-20 w-20" alt="">
                                <div class="flex flex-col space-y-1">
                                    <span class="font-bold text-lg">Persona ajena a WeebApp</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

        </div>
    </div>

</x-app-layout>
