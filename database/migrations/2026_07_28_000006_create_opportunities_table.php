<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {

            $table->id();

            $table->foreignId('organization_id')
                ->constrained('organizations')
                ->cascadeOnDelete();

            $table->string('titulo');

            $table->text('descricao')
                ->nullable();

            $table->enum('modelo_trabalho', [
                'presencial',
                'hibrido',
                'remoto'
            ])
            ->nullable();

            $table->string('localizacao')
                ->nullable();

            $table->enum('nivel', [
                'iniciante',
                'intermediario',
                'avancado',
                'especialista'
            ])
            ->nullable();

            $table->enum('status', [
                'aberta',
                'pausada',
                'encerrada'
            ])
            ->default('aberta');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};