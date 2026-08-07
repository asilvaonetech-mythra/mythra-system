<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumn('users', 'avatar')) {

                $table->string('avatar')
                    ->nullable()
                    ->after('password');

            }


            if (!Schema::hasColumn('users', 'is_active')) {

                $table->boolean('is_active')
                    ->default(true)
                    ->after('avatar');

            }


            if (!Schema::hasColumn('users', 'last_login_at')) {

                $table->timestamp('last_login_at')
                    ->nullable()
                    ->after('is_active');

            }


            if (!Schema::hasColumn('users', 'deleted_at')) {

                $table->softDeletes();

            }

        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $columns = [];

            foreach ([
                'avatar',
                'is_active',
                'last_login_at',
                'deleted_at',
            ] as $column) {

                if (Schema::hasColumn('users', $column)) {
                    $columns[] = $column;
                }

            }

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }

        });
    }
};