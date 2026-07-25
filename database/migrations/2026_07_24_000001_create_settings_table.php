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
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Identificação
            |--------------------------------------------------------------------------
            */

            $table->string('group', 100);

            $table->string('key', 150)->unique();

            $table->string('display_name', 150);

            $table->text('description')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Valor
            |--------------------------------------------------------------------------
            */

            $table->longText('value')->nullable();

            $table->string('type', 50)->default('string');

            $table->string('default_value')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Organização
            |--------------------------------------------------------------------------
            */

            $table->integer('sort_order')->default(0);

            $table->boolean('autoload')->default(true);

            $table->boolean('encrypted')->default(false);

            $table->boolean('is_public')->default(false);

            $table->boolean('is_system')->default(false);

            $table->boolean('is_active')->default(true);


            /*
            |--------------------------------------------------------------------------
            | Auditoria
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('created_by')->nullable();

            $table->unsignedBigInteger('updated_by')->nullable();


            $table->timestamps();

            $table->softDeletes();


            /*
            |--------------------------------------------------------------------------
            | Índices
            |--------------------------------------------------------------------------
            */

            $table->index('group');

            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};