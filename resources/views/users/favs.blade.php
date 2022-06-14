<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">

                @livewire('perfil', ['perfil'=>$perfil])

            </div>

            <p class="bg-white pl-4 font-semibold text-xl">Aquí se muestran los productos que te han gustado</p>

            <div class="bg-white">

                @livewire('favoritos', ['productos'=>$productos])

            </div>
        </div>
    </div>
</x-app-layout>
