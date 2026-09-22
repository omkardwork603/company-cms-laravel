<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('menu_items')) {
            Schema::create('menu_items', function (Blueprint $table) {

                $table->id();

                $table->foreignId('menu_id')
                    ->constrained('menus')
                    ->cascadeOnDelete();

                $table->foreignId('parent_id')
                    ->nullable()
                    ->constrained('menu_items')
                    ->nullOnDelete();

                $table->string('title');

                $table->string('url')->nullable();

                $table->string('target')
                    ->default('_self');

                $table->unsignedInteger('sort_order')
                    ->default(0);

                $table->boolean('status')
                    ->default(true);

                $table->timestamps();

            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};