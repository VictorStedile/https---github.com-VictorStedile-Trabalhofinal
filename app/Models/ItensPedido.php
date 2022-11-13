<?php

namespace App\Models;

class ItensPedido extends ModeloReal
{
    protected $table = "itens_pedidos";
    protected $fillable = ['valor', 'dt_item', 'quantidade', 'produto_id', 'pedido_id'];
}
