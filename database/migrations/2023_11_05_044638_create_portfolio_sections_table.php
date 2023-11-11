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
        Schema::create('portfolio_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('is_public')->default(1)->comment('1: show to website, 0: no');
            $table->timestamps();
        });

        Schema::create('portfolio_section_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('portfolio_section_id');
            $table->string('name')->nullable();
            $table->text('note')->nullable();
            $table->text('photo')->nullable();
            $table->tinyInteger('is_public')->default(1)->comment('1: show to website, 0: no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_sections');
    }
};
