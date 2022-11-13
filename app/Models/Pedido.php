<?php

namespace App\Models;

class Pedido extends ModeloReal
{
    protected $table = "pedidos";
    protected $dates = ['dt_pedido'];
    protected $fillable = ['dt_pedido', 'status', 'usuario_id'];

    public function statusDesc(){
        $desc = '';

        switch($this->status){
            case 'Pen': $desc = 'PENDENTE';break;
            case 'Apr': $desc = 'APROVADO';break;
            case 'Can': $desc = 'CANCELADO';break;
        }
        return $desc;
    }
}
