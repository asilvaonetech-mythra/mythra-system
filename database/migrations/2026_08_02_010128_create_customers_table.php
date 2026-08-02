<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->id();


            /*
            |--------------------------------------------------------------------------
            | Organização proprietária do cliente
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


            $table->string('tipo')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Documentação
            |--------------------------------------------------------------------------
            */

            $table->string('documento')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Comunicação
            |--------------------------------------------------------------------------
            */

            $table->string('email')
                ->nullable();


            $table->string('telefone')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Localização
            |--------------------------------------------------------------------------
            */

            $table->string('endereco')
                ->nullable();


            $table->string('cidade')
                ->nullable();


            $table->string('estado')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Informações adicionais
            |--------------------------------------------------------------------------
            */

            $table->text('observacoes')
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
        Schema::dropIfExists('customers');
    }
};