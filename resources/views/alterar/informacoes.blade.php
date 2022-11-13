@extends("layout")
@section("script")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#cpf").mask('000.000.000-00');
});
</script>
@endsection
@section("conteudo")

    <div class="col-12">
        <h1 class="mt-3 mb-3">Alterando informações</h1>
    </div>

    <form action="{{route('mudar_informacoes')}}" method="post">
    @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    Nome: <input type="text" name="nome" class="form-control" value="{{$informacoes->nome}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Email: <input type="email" name="email" class="form-control" value="{{$informacoes->email}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Cpf: <input type="text" name="cpf" id="cpf" class="form-control" readonly="readonly" value="{{$informacoes->login}}">
                </div>
            </div>
        <div>
        
        <input type="submit" value="Alterar" class="btn btn-success mt-3">
    </form>
@endsection