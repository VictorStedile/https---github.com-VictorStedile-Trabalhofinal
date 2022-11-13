<?php

namespace App\Services;
use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\ItensPedido;
use Log;

class VendaService{

    public function finalizarVenda($prods = [], Usuario $user){
        try{
            \DB::beginTransaction();
            $dthoje = new \DateTime();

            $pedido = new Pedido();

            $pedido->dt_pedido = $dthoje->format("Y-m-d H:i:s");
            $pedido->status = 'Pen';
            $pedido->usuario_id = $user->id;

            $pedido->save();

            foreach($prods as $p){
                $itens = new ItensPedido();

                $itens->valor = $p->valor;
                $itens->dt_item = $dthoje->format("Y-m-d H:i:s");
                $itens->quantidade = 1;
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
                
            }

            \DB::commit();

            return ['status' => 'ok', 'message' => 'Venda Finalizada'];
        }catch(\Exception $e){
            \DB::rollback();
            Log::error('Erro vendaService', ['message' => $e->getMessage()]);
            return ['status' => 'err', 'message' => 'Venda não pode ser finalizada'];
        }
    }

}