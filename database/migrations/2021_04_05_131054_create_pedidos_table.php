<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('email');
            $table->text('finalidade');
            $table->unsignedBigInteger('files_id');
            $table->foreign('files_id')->references('id')->on('files');

            $table->unsignedBigInteger('autorizador_id')->nullable();
            $table->foreign('autorizador_id')->references('id')->on('users')->onDelete('set null');
            $table->dateTime('autorizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicaos');
    }
}
