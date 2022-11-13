@extends("layout")
@section("script")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#cpf").mask('000.000.000-00');
   $("#cep").mask('00000-000');
});
</script>
@endsection
@section("navbar2")
<nav class="navbar navbar-expand-md navbar-dark bg-dark px-5 mb-5">
  <div class="collapse navbar-collapse" id="navbarColor01">
    <div class="navbar-nav">
        <a class="nav-link" href="{{route('ver_perfil')}}">Perfil</a>
        <a class="nav-link" href="{{route('compras_historico')}}">Historico de compras</a>
    </div>
  </div>
</nav>
@endsection
@section('conteudo')
    <h3>Olá {{$informacoes->nome}}</h3>
    <div class="col-12">
    <p class="display-4">Informações pessoais<p>
    <table class="table table-bordered">
        <tr>
            <th class="col-3">Nome</th>
            <td class="col-9">{{$informacoes->nome}}</td>
        </tr>
        <tr>
            <th class="col-3">Email</th>
            <td class="col-9">{{$informacoes->email}}</td>
        </tr>
        <tr>
            <th class="col-3">Cpf</th>
            <td class="col-9" id="cpf">{{$informacoes->login}}</td>
        </tr>
    </table>
    <a href="{{route('alterar_perfil', $informacoes->id)}}" class="btn btn-danger mb-3 col-2">Alterar informacoes</a>
    <a href="{{route('deletar_perfil', $informacoes->id)}}" class="btn btn-danger mb-3 col-2" data-toggle="modal" data-target="#modalcompra">DELETAR PERFIL</a>

    <p class="display-4">Endereço<p>
    @foreach($endereco as $local)
    <table class="table table-bordered">
        <tr>
            <th class="col-3">Endereço</th>
            <td class="col-9">{{$local->logradouro}}</td>
        </tr>
        <tr>
            <th class="col-3">Cep</th>
            <td class="col-9" id='cep'>{{$local->cep}}</td>
        </tr>
        <tr>
            <th class="col-3">Numero</th>
            <td class="col-9">{{$local->numero}}</td>
        </tr>
        <tr>
            <th class="col-3">Complemento</th>
            <td class="col-9">{{$local->complemento}}</td>
        </tr>
        <tr>
            <th class="col-3">Cidade</th>
            <td class="col-9">{{$local->cidade}}</td>
        </tr>
        <tr>
            <th class="col-3">Estado</th>
            <td class="col-9">{{$local->estado}}</td>
        </tr>
    </table>
    <a href="{{route('alterar_endereco', $informacoes->id)}}" class="btn btn-danger col-2">Alterar endereço</a>
    @endforeach
    </div>

    <div class="modal fade" id="modalcompra">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atenção</h5>
                </div>
                <div class="modal-body">
                    <div id="conteudopedido">
                        Tem certeza que deseja excluir sua conta?
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('deletar_perfil', $informacoes->id)}}" id="delete" class="btn btn-success btn-sm">Sim</a>
                    <button class="btn btn-sm btn-danger" data-dismiss="modal">Nao</button>
                </div>
            </div>
        </div>
    </div>

@endsection