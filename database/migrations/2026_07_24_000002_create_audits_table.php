<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Criação da tabela de auditoria do Mythra Core.
     */
    public function up(): void
    {
        Schema::create('audits', function (Blueprint $table) {

            $table->id();


            /*
            |--------------------------------------------------------------------------
            | Usuário responsável
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('user_id')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Domínio e ação executada
            |--------------------------------------------------------------------------
            */

            $table->string('module', 100)
                ->nullable();

            $table->string('action', 100);


            /*
            |--------------------------------------------------------------------------
            | Modelo afetado
            |--------------------------------------------------------------------------
            */

            $table->string('model', 150);

            $table->unsignedBigInteger('model_id')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Estado anterior e novo estado
            |--------------------------------------------------------------------------
            */

            $table->json('old_values')
                ->nullable();

            $table->json('new_values')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Segurança e contexto
            |--------------------------------------------------------------------------
            */

            $table->ipAddress('ip_address')
                ->nullable();

            $table->text('user_agent')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Controle
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            $table->softDeletes();



            /*
            |--------------------------------------------------------------------------
            | Índices
            |--------------------------------------------------------------------------
            */

            $table->index('user_id');

            $table->index('module');

            $table->index('action');

            $table->index('model');

            $table->index('model_id');

            $table->index('created_at');

        });
    }


    /**
     * Remoção da tabela.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};