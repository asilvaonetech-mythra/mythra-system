<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {

            $table->id();


            /*
            |--------------------------------------------------------------------------
            | Dados da competência
            |--------------------------------------------------------------------------
            */

            $table->string('nome');

            $table->string('categoria')
                ->nullable();

            $table->text('descricao')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Controle Mythra
            |--------------------------------------------------------------------------
            */

            $table->enum(
                'status',
                [
                    'ativo',
                    'inativo'
                ]
            )
            ->default('ativo');


            $table->timestamps();


            /*
            |--------------------------------------------------------------------------
            | Índices
            |--------------------------------------------------------------------------
            */

            $table->index('nome');

            $table->index('categoria');

            $table->index('status');

        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }

};