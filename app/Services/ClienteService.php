<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log;

class ClienteService {

    public function salvarUsuario(Usuario $user, Endereco $endereco){

        try{

            $userExists = Usuario::where('login', $user->login)->first();
            if($userExists){
                return ['status' => 'err', 'message' => 'CPF já cadastrado'];
            }

            \DB::beginTransaction(); //inicia a transação
            
            $user->save();
            $endereco->usuario_id = $user->id;
            $endereco->save();

            \DB::commit(); //completa a transação se der erro ela não ocorre

            return ['status' => 'ok', 'message' => 'usuario cadastrado com sucesso'];
        }catch(\Exception $e){
            //No momento que da erro joga pra cá onde sera resolvido
            \Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario', 'message' => $e->getMessage()]);
            \DB::rollback(); //Cancela a transação

            return ['status' => 'err', 'message' => 'Não consegui cadastrar o usuario'];
        }

    }

    public function alterarUsuario(Usuario $user, $inform){
        try{

            \DB::beginTransaction();

                $user->nome = $inform->input('nome');
                $user->email = $inform->input('email');

                $novo = $inform->input('cpf');
                $novo = preg_replace('/[^0-9]/', '', $novo);

                $user->login = $novo;

                $user->save();
            
            \DB::commit();
            return ['status' => 'ok', 'message' => 'usuario alterado com sucesso'];

        }catch(\Exception $e){
            
            \Log::error("ERRO", ['file' => 'ClienteService.alterarUsuario', 'message' => $e->getMessage()]);
            \DB::rollback(); //Cancela a transação

            return ['status' => 'err', 'message' => 'Não consegui alterar o usuario'];

        }
    }

    public function deletarUsuario(Usuario $user){
        try{

            \DB::beginTransaction();

                $user->delete();    

            \DB::commit();
            return ['status' => 'ok', 'message' => 'usuario deletado com sucesso'];

        }catch(\Exception $e){

            \Log::error("ERRO", ['file' => 'ClienteService.alterarUsuario', 'message' => $e->getMessage()]);
            \DB::rollback(); //Cancela a transação

            return ['status' => 'err', 'message' => 'Não foi possivel apagar o usuario'];

        }
    }

}