<?php

namespace App\Models;

class Produto extends ModeloReal
{

    protected $table = "produtos";
    protected $fillable = ['nome', 'foto', 'valor', 'descricao', 'categoria_id'];

}
