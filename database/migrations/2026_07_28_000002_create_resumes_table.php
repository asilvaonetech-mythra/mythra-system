<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('talent_profile_id')
                ->constrained('talent_profiles')
                ->cascadeOnDelete();

            $table->string('titulo');

            $table->text('resumo')
                ->nullable();

            $table->longText('experiencias_texto')
                ->nullable();

            $table->longText('formacao_texto')
                ->nullable();

            $table->longText('certificacoes_texto')
                ->nullable();

            $table->longText('projetos_texto')
                ->nullable();

            $table->boolean('principal')
                ->default(false);

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};