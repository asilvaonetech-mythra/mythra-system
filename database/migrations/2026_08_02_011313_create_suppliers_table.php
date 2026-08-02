<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {

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


            $table->string('tipo')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Documento
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
            | Endereço
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
        Schema::dropIfExists('suppliers');
    }
};