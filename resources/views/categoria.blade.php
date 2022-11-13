@extends("layout")
@section("conteudo")

    @if(isset($categorias) && count($categorias) > 0)
        <div class="list-group mb-3">
            <a href="{{route('categoria')}}" class="list-group-item list-group-item-action">Todas</a></li>
            @foreach($categorias as $cat)
                <a href="{{route('categoria_por_id', ['idcategoria' => $cat->id])}}" class="list-group-item list-group-item-action)">{{$cat->categoria}}</a>
            @endforeach
        </div>
    @endif

    @include("_produtos", ['produtos' => $produtos])

@endsection