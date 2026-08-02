<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {


            $table->id();



            /*
            |--------------------------------------------------------------------------
            | Organização proprietária
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
            | Valores
            |--------------------------------------------------------------------------
            */

            $table->decimal('valor', 10, 2)
                ->nullable();



            $table->integer('duracao')
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
        Schema::dropIfExists('services');
    }

};