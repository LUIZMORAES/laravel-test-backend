<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaCadimovel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadimovel', function (Blueprint $table){
           $table->id();
           $table->string('Proproetario');
           $table->string('tipo_pessoa');
           $table->string('documento');
           $table->string('e_mail');                      
           $table->string('cep');
           $table->string('logradouro');
           $table->string('numero');
           $table->string('complemento');           
           $table->string('bairro');
           $table->string('cidade');
           $table->string('estado');
           $table->string('status');
           $table->timestamps();
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cad_imovel');
    }
}
