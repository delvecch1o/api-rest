<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_produto', function (Blueprint $table) {
            
            $table->unsignedInteger('campanha_id');
            $table->unsignedInteger('produto_id');
            $table->float('preco');
            
            $table->foreign('campanha_id')->references('id')->on('campanhas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanha_produto');
    }
}
