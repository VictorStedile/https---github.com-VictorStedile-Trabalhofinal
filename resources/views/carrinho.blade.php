@extends ("layout")
@section("conteudo")
    <h3>Carrinho</h3>

    @if(\Auth::user())
    @if($cart && count($cart) > 0)

        <table class="table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome do produto</th>
                    <th>Valor</th>
                    <th>Descricao</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $indice => $p)
                    <tr>
                        <td><img src="{{asset($p->foto)}}" height="40"></td>
                        <td>{{$p->nome}}</td>
                        <td>R$ {{$p->valor}}</td>
                        <td>{{$p->descricao}}</td>
                        <td>
                            <a href="{{route('carrinho_excluir', ['indice' => $indice])}}" class="btn btn-danger btn sm"> <i class="fa-solid fa-trash"></i> Retirar</a>
                        </td>
                    </tr>
                    @php $total += $p->valor; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="col-5">
                        Total do carrinho: R$ {{$total}}
                    </td>
                </tr>
            </tfoot>
        </table>

        <form action="{{route('carrinho_finalizar')}}" method="post">
            @csrf
            <input type="submit" value="Finalizar" class="btn btn-lg btn-success">
        </form>
    
    @else

        <div>Nenhum item no carrinho</div>

    @endif

    @else

        <h6>Você não está logado</h6>

    @endif
@endsection