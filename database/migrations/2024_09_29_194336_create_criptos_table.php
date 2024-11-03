<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriptosTable extends Migration
{
    public function up()
    {
        Schema::create('criptos', function (Blueprint $table) {
            $table->id(); // ID auto-incrementável
            $table->string('nome'); // Nome da criptomoeda
            $table->decimal('quantidade', 10, 2); // Quantidade de criptomoeda
            $table->date('data_compra'); // Data de compra
            $table->string('descricao');
            $table->float('valorUnitario');
            $table->timestamps(); // Cria as colunas created_at e updated_at
            $table->decimal('valorUnitario', 10, 10);
        });
    }

    public function down()
    {
        Schema::dropIfExists('criptos');
    }
}

