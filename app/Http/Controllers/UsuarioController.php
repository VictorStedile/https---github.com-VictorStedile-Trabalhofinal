<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Services\ClienteService;
use Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request){
        $data = [];

        if($request->isMethod("post")){
            $login = $request->input('login');
            $senha = $request->input('senha');

            $value = preg_replace('/[^0-9]/', '', $login);

            $credenciais = ['login' => $value, 'password' => $senha];

            if(Auth::attempt($credenciais)){
                return redirect()->route("home");
            }else{
                $request->session()->flash("err", "usuario/senha invalido");
                return redirect()->route("login");
            }

        }

        return view('logar', $data);
    }

    public function sair(Request $request){
        Auth::logout();

        return redirect()->route("home");
    }

    public function verPerfil(Request $request){
        $data = [];

        $listadeinformacoes = \Auth::user();
        $listadeendereco = Endereco::where('usuario_id', $listadeinformacoes->id)->get();
        $data['informacoes'] = $listadeinformacoes;
        $data['endereco'] = $listadeendereco;
        
        return view('perfil', $data);
    }

    public function alterarPerfil(Request $request){
        $data = [];

        $listadeinformacoes = \Auth::user();
        $data['informacoes'] = $listadeinformacoes;

        return view('alterar/informacoes', $data);
    }

    public function alterarEndereco(Request $request){
        $data = [];

        $listadeinformacoes = \Auth::user();

        $listadeendereco = Endereco::where('usuario_id', $listadeinformacoes->id)->get();
        $data['endereco'] = $listadeendereco;

        return view('alterar/endereco', $data);
    }

    public function mudarInformacoes(Request $request){

        $usuario = \Auth::user();

        $clienteService = new ClienteService();
        $result = $clienteService->alterarUsuario($usuario, $request);

        $message = $result['message'];
        $status = $result['status'];

        $request->session()->flash($status, $message);

        return redirect()->route("ver_perfil");
    }

    public function deletarUsuario(Request $request){

        $usuario = \Auth::user();

        $clienteService = new ClienteService();
        $result = $clienteService->deletarUsuario($usuario, $request);

        $message = $result['message'];
        $status = $result['status'];

        $request->session()->flash($status, $message);

        return redirect()->route("home");

    }

}
