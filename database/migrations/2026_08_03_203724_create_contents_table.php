<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

            $table->string('title', 150);

            $table->longText('body')
                ->nullable();

            $table->string('type', 50);

            $table->string('status', 30)
                ->default('draft');

            $table->string('author')
                ->nullable();

            $table->json('tags')
                ->nullable();

            $table->json('metadata')
                ->nullable();

            $table->foreignId('campaign_id')
                ->nullable()
                ->constrained('campaigns')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index('type');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};