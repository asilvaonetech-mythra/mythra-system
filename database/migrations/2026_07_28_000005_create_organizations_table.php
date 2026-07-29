<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {

            $table->id();

            $table->string('nome');

            $table->string('documento')
                ->nullable();

            $table->string('segmento')
                ->nullable();

            $table->text('descricao')
                ->nullable();

            $table->string('localizacao')
                ->nullable();

            $table->foreignId('responsavel_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->enum('status', [
                'ativo',
                'inativo',
                'analise'
            ])
            ->default('analise');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};