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

    @if(!\Auth::user())

        <div class="col-12">
            <h2 class="mb-4">Logar</h2>
        </div>

        
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                Login/cpf: <input type="text" name="login" id="cpf" class="form-control mt-2">
            </div>
            <div class="form-group">
                Senha: <input type="password" name="senha" class="form-control">
            </div>

            <input type="submit" value="Logar" class="btn btn-lg btn-primary mt-3">
        </form>
    
    @else

        <div class="col-12">
            <h2 class="mb-4">Você já está logado</h2>
        </div>

    
    @endif

@endsection