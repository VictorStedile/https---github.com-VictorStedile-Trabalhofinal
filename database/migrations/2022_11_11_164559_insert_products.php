<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

        $prod = new \App\Models\Produto(['nome' => 'PC mais caro', 'foto' => 'images/pc1.jpg', 'valor' => '7500', 'descricao' => 'PC mais caro de todos', 'categoria_id' => $cat-> id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome' => 'PC 2', 'foto' => 'images/pc2.jpg', 'valor' => '6500', 'descricao' => 'PC mais caro de todos', 'categoria_id' => $cat-> id]);
        $prod2->save();
        
        $prod3 = new \App\Models\Produto(['nome' => 'PC 3', 'foto' => 'images/pc3.jpg', 'valor' => '5500', 'descricao' => 'PC mais caro de todos', 'categoria_id' => $cat-> id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'PC 4', 'foto' => 'images/pc4.jpg', 'valor' => '4500', 'descricao' => 'PC mais caro de todos', 'categoria_id' => $cat-> id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome' => 'PC 5', 'foto' => 'images/pc5.jpg', 'valor' => '3500', 'descricao' => 'PC mais caro de todos', 'categoria_id' => $cat-> id]);
        $prod5->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
