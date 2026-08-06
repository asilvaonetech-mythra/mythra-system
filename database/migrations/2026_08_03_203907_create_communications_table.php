<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->id();

            $table->string('title', 150);

            $table->longText('message');

            $table->string('type', 50);

            $table->string('channel', 50);

            $table->string('status', 30)
                ->default('draft');

            $table->timestamp('scheduled_at')
                ->nullable();

            $table->timestamp('sent_at')
                ->nullable();

            $table->json('recipients')
                ->nullable();

            $table->json('metadata')
                ->nullable();

            $table->foreignId('campaign_id')
                ->nullable()
                ->constrained('campaigns')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index('status');
            $table->index('channel');
            $table->index('scheduled_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};