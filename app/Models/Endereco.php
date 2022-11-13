<?php

namespace App\Models;

class Endereco extends ModeloReal
{
    protected $table = "enderecos";
    
    protected $fillable = ['logradouro', 'complemento', 'numero', 'cep', 'cidade', 'estado'];

    public function setCepAttribute($cep){
        /*
            89163-083
            89163083
        */
        $value = preg_replace('/[^0-9]/', '', $cep);
        $this->attributes['cep'] = $value;
    }
}
