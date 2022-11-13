<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function cadastro(Request $request){ 
        $data = [];

        return view("cadastro", $data);
    }

    public function cadastrarCliente(Request $request){
        
        $values = $request->all();
        $usuario = new Usuario();
        $usuario->fill($values);
        $usuario->login = $request->input("cpf", "");

        $senha = $request->input("password", "");
        $usuario->password = \Hash::make($senha);
        

        $endereco = new Endereco($values);
       //da certo desta forma tambem = $endereco->logradouro = $request->endereco;
        $endereco->logradouro = $request->input("endereco", "");

        $clienteService = new ClienteService();
        $result = $clienteService->salvarUsuario($usuario, $endereco);

        $message = $result['message'];
        $status = $result['status'];
        
        //ok, cadastrado
        //err, nao possivel
        $request->session()->flash($status, $message);

        return redirect()->route("cadastro");
    }
}
