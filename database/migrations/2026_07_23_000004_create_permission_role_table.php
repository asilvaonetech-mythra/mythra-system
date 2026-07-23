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
        Schema::create('permission_role', function (Blueprint $table) {

            $table->id();

            $table->foreignId('permission_id')
                ->constrained('permissions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('role_id')
                ->constrained('roles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->boolean('allowed')->default(true);

            $table->unsignedBigInteger('granted_by')->nullable();

            $table->timestamp('granted_at')->useCurrent();

            $table->timestamps();

            $table->unique(['permission_id', 'role_id']);

            $table->index('permission_id');
            $table->index('role_id');
            $table->index('allowed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_role');
    }
};