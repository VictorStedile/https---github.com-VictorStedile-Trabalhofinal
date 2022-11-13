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
        Schema::create('enderecos', function (Blueprint $table) {

            $table->increments("id");
            $table->string("logradouro", 50)->nullable();
            $table->string("numero", 5)->nullable();
            $table->string("cidade", 45)->nullable();
            $table->string("cep", 12);
            $table->string("complemento", 40)->nullable();
            $table->string("estado", 20)->nullable();
            $table->integer("usuario_id")->unsigned();

            $table->timestamps();

            $table->foreign("usuario_id")
                    ->references("id")->on("usuarios")
                    ->onDelete("cascade");
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
