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
        Schema::create(config('laravel-attributes.tables.name', 'attributes'), function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('value');
            if (config('laravel-attributes.tables.uuids', false)) {
                $table->uuid('attributable_id');
            } else {
                $table->unsignedBigInteger('attributable_id');
            }
            $table->string('attributable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('laravel-attributes.tables.name', 'attributes'));
    }
};
