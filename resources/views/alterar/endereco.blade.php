@extends("layout")
@section("script")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#cep").mask('00000-000');
});
</script>
@endsection
@section("conteudo")

    <div class="col-12">
        <h1 class="mt-3 mb-3">Alterando informações</h1>
    </div>

    <form action="{{route('mudar_endereco')}}" method="post">
    @csrf
    @foreach($endereco as $endereco)
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    Endereço: <input type="text" name="logradouro" class="form-control" value="{{$endereco->logradouro}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    CEP: <input type="text" name="cep" class="form-control" id="cep" value="{{$endereco->cep}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Numero: <input type="text" name="numero" class="form-control" value="{{$endereco->numero}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Cidade: <input type="text" name="cidade" class="form-control" value="{{$endereco->cidade}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Estado: <input type="text" name="estado" class="form-control" value="{{$endereco->estado}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    Complemento: <input type="text" name="complemento" class="form-control" value="{{$endereco->complemento}}">
                </div>
            </div>
        <div>
      @endforeach
        
        <input type="submit" value="Alterar" class="btn btn-success mt-3">
    </form>
@endsection