<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen pb-10">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">

                @if ($productos->count() == 0)
                    <div class="text-center">
                        <p>Lo siento.. No encontramos lo que buscas</p>
                    </div>
                @endif

                @livewire('producto', ['productos'=>$productos])

            </div>
        </div>
    </div>
</x-app-layout>
