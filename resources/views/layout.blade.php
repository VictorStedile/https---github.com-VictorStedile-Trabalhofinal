<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    @yield("script")
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark px-5">
    <a class="navbar-brand" href="{{route('home')}}"><i class="fa-solid fa-computer"></i>Informatics</a>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href=" {{ route('home') }}">Home</a>
        <a class="nav-link" href=" {{ route('categoria') }} ">Categorias</a>
        @if(!\Auth::user())
          <a class="nav-link" href=" {{ route('cadastro') }}">Cadastrar</a>
          <a class="nav-link" href=" {{ route('login') }}">Logar</a>
        @else
          <a class="nav-link" href="{{route('compras_historico')}}">Perfil do usuario</a>
          <a class="nav-link" href=" {{ route('logout') }}">Sair</a>
        @endif
      </div>
  </div>
  @if(\Auth::user())
  <a href=" {{ route('ver_carrinho') }}" class="navbar-brand"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
  @endif
</nav>
@yield("navbar2")

<div class="container">
  <div class="row">

    @if($message = Session::get("err"))
      <div class="col-12">
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      </div>
    @elseif($message = Session::get("ok"))
    <div class="col-12">
        <div class="alert alert-success">
          {{ $message }}
        </div>
      </div>
    @endif

    @yield("conteudo")
  </div>
</div>
</body>
</html>