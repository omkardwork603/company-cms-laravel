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
        /*
        |--------------------------------------------------------------------------
        | Roles Table
        |--------------------------------------------------------------------------
        */

        if (! Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();

                $table->string('name')->unique();

                $table->string('slug')->unique();

                $table->text('description')->nullable();

                $table->boolean('status')->default(true);

                $table->timestamps();
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Add Role & Status to Users
        |--------------------------------------------------------------------------
        */

        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'role_id')) {
                $table->foreignId('role_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('roles')
                    ->nullOnDelete();
            }

            if (! Schema::hasColumn('users', 'status')) {
                $table->boolean('status')
                    ->default(true)
                    ->after('password');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Remove User Role & Status
        |--------------------------------------------------------------------------
        */

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role_id')) {
                try {
                    $table->dropForeign(['role_id']);
                } catch (\Exception $e) {}
                $table->dropColumn('role_id');
            }

            if (Schema::hasColumn('users', 'status')) {
                $table->dropColumn('status');
            }
        });


        /*
        |--------------------------------------------------------------------------
        | Remove Roles Table
        |--------------------------------------------------------------------------
        */

        Schema::dropIfExists('roles');
    }
};