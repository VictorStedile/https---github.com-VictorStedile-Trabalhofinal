<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends ModeloReal implements Authenticatable
{
    protected $table = "usuarios";
    
    protected $fillable = ['email', 'login', 'password', 'nome'];

    public function getAuthIdentifierName(){
        return 'login';
    }

    public function getAuthIdentifier(){
        return $this->login;
    }

    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberToken(){
        
    }

    public function setRememberToken($value){

    }

    public function getRememberTokenName(){

    }

    public function setLoginAttribute($login){
        /*
            123.456.789.00
            12345678900
        */
        $value = preg_replace('/[^0-9]/', '', $login);
        $this->attributes['login'] = $value;
    }

}
