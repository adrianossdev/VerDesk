<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_tipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ds_usuario_tipos', 20);
        });

        Schema::table('cadastros', function (Blueprint $table){
            $table->unsignedBigInteger('usuario_tipo_id')->default(1);
            $table->foreign('usuario_tipo_id')->references('id')->on('usuario_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cadastros', function (Blueprint $table){
            $table->dropForeign('cadastros_usuario_tipo_id_foreign');
            $table->dropColumn('usuario_tipo_id');
        });
   
        Schema::dropIfExists('usuario_tipos');
    }
}
