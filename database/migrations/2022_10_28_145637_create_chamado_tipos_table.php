<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadoTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado_tipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ds_tipo_chamado',30);
        });

        Schema::table('chamados', function (Blueprint $table){
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('chamado_tipos');
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
            $table->dropForeign('chamado_tipo_id_foreign');
            $table->dropColumn('tipo_id');
        });
        Schema::dropIfExists('chamado_tipos');
    }
}
