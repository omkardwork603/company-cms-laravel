<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            if (! Schema::hasColumn('menus', 'status')) {
                $table->boolean('status')->default(true)->after('location');
            }

            if (! Schema::hasColumn('menus', 'order')) {
                $table->unsignedInteger('order')->default(0)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            if (Schema::hasColumn('menus', 'order')) {
                $table->dropColumn('order');
            }

            if (Schema::hasColumn('menus', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
