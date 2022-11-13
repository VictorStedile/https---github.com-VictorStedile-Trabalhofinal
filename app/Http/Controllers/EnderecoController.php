<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Services\EnderecoService;
use Auth;

use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function mudarEndereco(Request $request){

        $user = \Auth::user();
        $endereco = Endereco::where('usuario_id', $user->id)->get();

        $EnderecoService = new EnderecoService;
        foreach($endereco as $endereco){
            $atualiza = $EnderecoService->alterarEndereco($endereco, $request);
        }

        $message = $atualiza['message'];
        $status = $atualiza['status'];

        $request->session()->flash($status, $message);

        return redirect()->route("ver_perfil");
    }

}
