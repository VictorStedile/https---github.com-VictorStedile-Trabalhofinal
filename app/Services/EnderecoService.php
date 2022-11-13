<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log;

class EnderecoService {

    public function alterarEndereco(Endereco $newe, $endereco){
        try{

            \DB::beginTransaction();

                $newe->logradouro = $endereco->input('logradouro');
                $newe->numero = $endereco->input('numero');
                $newe->cidade = $endereco->input('cidade');
                $newe->estado = $endereco->input('estado');
                $newe->complemento = $endereco->input('complemento');

                $novo = $endereco->input('cep');
                $novo = preg_replace('/[^0-9]/', '', $novo);
                
                $newe->cep = $novo;

                $newe->save();
            
            \DB::commit();
            return ['status' => 'ok', 'message' => 'endereco alterado com sucesso'];

        }catch(\Exception $e){

            \Log::error("ERRO", ['file' => 'ClienteService.alterarUsuario', 'message' => $e->getMessage()]);
            \DB::rollback(); //Cancela a transação

            return ['status' => 'err', 'message' => 'Não consegui alterar o endereco'];

        }
    }

}