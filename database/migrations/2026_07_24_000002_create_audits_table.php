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
            | Identificação da ação
            |--------------------------------------------------------------------------
            */

            $table->string('event', 50);

            $table->string('auditable_type', 150);

            $table->unsignedBigInteger('auditable_id')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Dados alterados
            |--------------------------------------------------------------------------
            */

            $table->json('old_values')
                ->nullable();

            $table->json('new_values')
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Contexto
            |--------------------------------------------------------------------------
            */

            $table->string('module', 100)
                ->nullable();

            $table->string('description', 255)
                ->nullable();



            /*
            |--------------------------------------------------------------------------
            | Segurança
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

            $table->index('event');

            $table->index('auditable_type');

            $table->index('auditable_id');

            $table->index('module');

            $table->index('created_at');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};