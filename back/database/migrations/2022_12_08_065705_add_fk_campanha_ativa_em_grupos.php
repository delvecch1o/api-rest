<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkCampanhaAtivaEmGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos',function(Blueprint $table){
           
            $table->unsignedInteger('campanha_ativa_id')->nullable()->default(null);
            $table->foreign('campanha_ativa_id')->references('id')->on('campanhas')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupos',function(Blueprint $table){
           
           $table->dropColumn('campanha_ativa_id');

        });
    }
}
