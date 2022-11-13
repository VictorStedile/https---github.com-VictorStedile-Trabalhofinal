@extends("layout")
@section("conteudo")
  @include("_produtos", ['produtos' => $produtos])
@endsection