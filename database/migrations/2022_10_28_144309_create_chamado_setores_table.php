<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadoSetoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado_setores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ds_setor_chamado',30);
        });

        Schema::table('chamados', function (Blueprint $table){
            $table->unsignedBigInteger('setor_id');
            $table->foreign('setor_id')->references('id')->on('chamado_setores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('chamados', function (Blueprint $table){
            $table->dropForeign('chamado_setor_id_foreign');
            $table->dropColumn('setor_id');
        });
        
        Schema::dropIfExists('chamado_setores');
    }
}
