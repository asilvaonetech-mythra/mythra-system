<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {


            $table->id();



            /*
            |--------------------------------------------------------------------------
            | Organização proprietária do produto
            |--------------------------------------------------------------------------
            */

            $table->foreignId('organization_id')
                ->constrained('organizations')
                ->cascadeOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Dados principais
            |--------------------------------------------------------------------------
            */

            $table->string('nome');


            $table->string('codigo')
                ->nullable();


            $table->string('tipo')
                ->nullable();



            $table->string('categoria')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Descrição
            |--------------------------------------------------------------------------
            */

            $table->text('descricao')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Valores comerciais
            |--------------------------------------------------------------------------
            */

            $table->decimal('valor', 10, 2)
                ->nullable();



            $table->string('unidade')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Controle
            |--------------------------------------------------------------------------
            */

            $table->enum('status', [

                'ativo',
                'inativo',
                'analise'

            ])
            ->default('ativo');


            $table->timestamps();


        });
    }



    public function down(): void
    {
        Schema::dropIfExists('products');
    }

};