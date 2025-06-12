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
         Schema::create('brigade_musician', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brigade_id')->constrained()->onDelete('cascade');
            $table->foreignId('musician_profile_id')->constrained('musician_profiles')->onDelete('cascade');
            $table->timestamps();
            
            // Prevent duplicate entries
            $table->unique(['brigade_id', 'musician_profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brigade_musician');
    }
};
