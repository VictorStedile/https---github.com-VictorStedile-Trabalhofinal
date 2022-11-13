@extends("layout")
@section("navbar2")
<nav class="navbar navbar-expand-md navbar-dark bg-dark px-5 mb-5">
  <div class="collapse navbar-collapse" id="navbarColor01">
    <div class="navbar-nav">
        <a class="nav-link" href="{{route('ver_perfil')}}">Perfil</a>
        <a class="nav-link" href="#">Historico de compras</a>
    </div>
  </div>
</nav>
@endsection
@section("script")
<script type="text/javascript">
    $(function(){
        $('.infocompra').on('click', function(){
            let id = $(this).attr('data-value')
            $.post('{{route("compra_detalhes")}}', { idpedido : id }, (result) => {
                $("#conteudopedido").html(result)
            })
        })
    })
</script>
@endsection
@section("conteudo")
    <div class="col-12">
        <h2>Minhas compras</h2>
    </div>    

    <div class='col-12'>
        <table class="table table-bordered">
            <tr>
                <th>Data da compra</th>
                <th>Situação da compra</th>
                <th></th>
            </tr>
            @foreach($lista as $ped)
            <tr>
                <td>{{$ped->dt_pedido->format("d/m/Y H:i")}}</td>
                <td>{{$ped->statusDesc()}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{$ped->id}}" data-toggle="modal" data-target="#modalcompra">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="modalcompra">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes da compra</h5>
                </div>
                <div class="modal-body">
                    <div id="conteudopedido">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection