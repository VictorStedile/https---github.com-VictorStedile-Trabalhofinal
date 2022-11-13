<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Categoria;
use \App\Models\Produto;
use \App\Services\VendaService;
use \App\Models\Pedido;
use \App\Models\ItensPedido;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];

        //busca os produtos

        $listaProdutos = Produto::all();
        $data['produtos'] = $listaProdutos;

        return view("home", $data);
    }

    public function categoria(Request $request, $idcategoria = 0){
        $data = [];

        $listaCategorias = Categoria::all();
        $queryProdutos = Produto::limit(10);

        if($idcategoria != 0){
            $queryProdutos->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProdutos->get(); 

        $data['categorias'] = $listaCategorias;
        $data['produtos'] = $listaProdutos;

        return view("categoria", $data);
    }

    /*
    Deu certo porem tem mais funcionais
    public function adicionarCarrinho(Request $request, $idproduto = 0){
        data = [];

        $listaProdutos = Produto::all();

        if($idproduto != 0){
            $queryProdutos = $listaProdutos->where("idproduto", $idproduto);
        }

        $queryProdutos->get();

        $data['produto'] = $queryProdutos
    }
    */

    public function adicionarCarrinho(Request $request, $idproduto = 0){
        $data = [];

        $prod = Produto::find($idproduto);

        if($prod){
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }

        return redirect()->route("home");
    }

    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        
        $data = ['cart' => $carrinho];

        return view("carrinho", $data);
    }

    public function excluirCarrinho(Request $request, $indice){
        $carrinho = session('cart', []);
        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        session(["cart" => $carrinho]);
        return redirect()->route("ver_carrinho");
    } 

    public function finalizar(Request $request){

        $prods = session('cart', []);

        $vendaService = new VendaService();
        $result = $vendaService->finalizarVenda($prods, \Auth::user());

        if($result['status'] == 'ok'){
            $request->session()->forget('cart');
        }

        $request->session()->flash($result['status'], $result['message']);

        return redirect()->route("ver_carrinho");
    }

    public function historico(Request $request){
        $data = [];

        $idusuario = \Auth::user()->id;

        $listapedido = Pedido::where('usuario_id', $idusuario)->orderBy("dt_pedido", "desc")->get();

        $data['lista'] = $listapedido;

        return view("compra/historico", $data);
    }

    public function detalhes(Request $request){
        $idpedido = $request->input("idpedido");
        
        $listadeitens = ItensPedido::join('produtos', 'produtos.id', '=' , 'itens_pedidos.produto_id')->where('pedido_id', $idpedido)->get(['itens_pedidos.*', 'itens_pedidos.valor as valoritem', 'produtos.*']);
        
        $data = [];
        $data['listaItens'] = $listadeitens;
        return view('/compra/detalhes', $data); 
    }

}
