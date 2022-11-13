<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloReal extends Model
{
    use HasFactory;

    protected $PrimaryKey = "id";
    public $timestamps = true; //created_at e updatade_at
    public $incrementing = true;
    protected $fillable = [];

    public function BeforeSave(){
        return true;
    }

    public function save(array $options = []){
        try{
            
            if(!$this->BeforeSave()){
                return false;
            }

            return parent::save($options);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
