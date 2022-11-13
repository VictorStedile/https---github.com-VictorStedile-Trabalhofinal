@if(isset($produtos))
  @foreach($produtos as $prod)
    <div class="col-3 mb-3">
      <div class="card">
        <img style="max-width: 200px;" class="card-img-top" src="{{ asset($prod->foto) }}" />
        <div class="card-body text-white bg-dark">
          <h6 class="card-title">{{$prod->nome}} - R${{$prod->valor}}</h6>
          <p class="card-text">{{$prod->descricao}}</p>
          <a href="{{route('adicionar_carrinho', ['idproduto' => $prod->id])}}" class="btn btn-sm btn-secondary bg-dark">Comprar</a>
        </div>
      </div>
    </div>
  @endforeach
@endif