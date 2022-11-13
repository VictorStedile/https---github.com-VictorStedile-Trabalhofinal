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
@section("conteudo")

@if(!\Auth::user())

    <div class="col-12">
        <h2 class="mb-4">Cadastrar Cliente</h2>
    </div>
    
    <form action="{{route('cadastrar_cliente')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    Nome: <input type="text" name="nome" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Email: <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Cpf: <input type="text" name="cpf" id="cpf" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Senha: <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    Endereço: <input type="text" name="endereco" class="form-control">
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    Número: <input type="text" name="numero" class="form-control">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    Complemento: <input type="text" name="complemento" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cidade: <input type="text" name="cidade" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cep: <input type="text" name="cep" id="cep" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    Estado: <input type="text" name="estado" class="form-control">
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Cadastrar">
    </form>

@else

    <div class="col-12">
        <h2 class="mb-4">Você já está logado</h2>
    </div>


@endif
@endsection