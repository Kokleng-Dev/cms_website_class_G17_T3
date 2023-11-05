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
        Schema::create('client_sections', function (Blueprint $table) {
            $table->id();
            $table->text('website')->nullable();
            $table->string('name')->nullable();
            $table->text('logo')->nullable();
            $table->tinyInteger('is_public')->default(1)->comment('1: show to website, 0: no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_sections');
    }
};
