<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado_status', function (Blueprint $table) {
           $table->id();
           $table->timestamps();
            $table->string('ds_status_chamado',30);
        });

       Schema::table('chamados', function (Blueprint $table) {
          $table->unsignedBigInteger('status_id')->default(0)->after('setor_id');
        });

        Schema::table('chamados', function (Blueprint $table){
            $table->foreign('status_id')->references('id')->on('chamado_status');
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
