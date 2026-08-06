<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('editorial_calendars', function (Blueprint $table) {
            $table->id();

            $table->string('title', 150);

            $table->text('description')
                ->nullable();

            $table->string('content_type', 50);

            $table->string('status', 30)
                ->default('planned');

            $table->date('scheduled_date');

            $table->time('scheduled_time')
                ->nullable();

            $table->foreignId('campaign_id')
                ->nullable()
                ->constrained('campaigns')
                ->nullOnDelete();

            $table->json('channels')
                ->nullable();

            $table->json('metadata')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('status');
            $table->index('scheduled_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('editorial_calendars');
    }
};