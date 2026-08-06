<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_assets', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->string('file_path');

            $table->string('file_name')
                ->nullable();

            $table->string('mime_type')
                ->nullable();

            $table->unsignedBigInteger('file_size')
                ->nullable();

            $table->unsignedInteger('duration')
                ->nullable();

            $table->string('resolution')
                ->nullable();

            $table->string('category')
                ->nullable();

            $table->text('description')
                ->nullable();

            $table->json('metadata')
                ->nullable();

            $table->foreignId('content_id')
                ->nullable()
                ->constrained('contents')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_assets');
    }
};