<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talent_evolutions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('talent_profile_id')
                ->constrained('talent_profiles')
                ->cascadeOnDelete();

            $table->string('competencia');

            $table->string('nivel_anterior')
                ->nullable();

            $table->string('nivel_atual')
                ->nullable();

            $table->text('observacao')
                ->nullable();

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('talent_evolutions');
    }
};