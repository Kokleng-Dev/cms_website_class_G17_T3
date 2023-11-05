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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->text('background')->nullable();
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->string('box_1')->nullable();
            $table->string('box_2')->nullable();
            $table->string('box_3')->nullable();
            $table->string('box_4')->nullable();
            $table->string('box_5')->nullable();
            $table->string('icon_box_1')->nullable();
            $table->string('icon_box_2')->nullable();
            $table->string('icon_box_3')->nullable();
            $table->string('icon_box_4')->nullable();
            $table->string('icon_box_5')->nullable();
            $table->tinyInteger('is_public')->default(1)->comment('1: show to website, 0: no');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
