<div class="row flex flex-wrap">
    @foreach ($productos as $article)
        <div class="bg-orange-200 item col-xs-4 col-lg-4">
            <div class="thumbnail p-3">
                <img class="group list-group-image h-52 " src="{{asset('image.png')}}" {{-- src="{{ $article->image }}" --}} alt="No hay na" />
                <div class="caption">
                    <h3 class="group inner list-group-item-heading">
                        {{ $article->producto->nombre }}</h3>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                {{ $article->producto->precio }}€</p>
                        </div>
                    </div>
                </div>
            </div>

                <div class="p-2 text-center flex">

                    <form action="{{route('favoritos.destroy', [$article])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-1 text-sm " type="submit">Eliminar de favoritos</button>
                    </form>

                </div>
        </div>
    @endforeach
</div>
