<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterChamadosFkUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chamados', function (Blueprint $table) {   
            $table->unsignedBigInteger('usuario_id')->after('setor_id');
        });
        
        Schema::table('chamados', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('cadastros');
        });
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
}
