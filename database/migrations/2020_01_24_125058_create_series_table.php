<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //instruções para a tabela no banco de dados, qualquer coluna insere na tabela
    {
        Schema::create('series', function (Blueprint $table) { //migration é a entidade da modelagem 
            //TRADUÇÃO DA MODELAGEM - CRIAÃO DAS TABELAS
            $table->bigIncrements('id');
            $table->string('nome');
            $table->longText('sinopse');
            $table->integer('ano')->unsigned();
            $table->integer('avaliacao_geral')->unsigned();
            $table->boolean('premiada');
            /* se a relação fosse one to many 
            $table->unsignedBigInteger('user_id')->nullable();
            */
            $table->timestamps();
        });

        /*Foreign Keys - se fosse relação one to many
        Schema::table('series', function (Blueprint $table) { 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
