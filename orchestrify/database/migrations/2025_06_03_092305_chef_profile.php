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
        Schema::create('conductor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('orchestre_nom');
            $table->integer('experience')->nullable(); 
            $table->string('formation')->nullable();
            $table->integer('nombre_musiciens')->nullable();
            $table->string('style')->nullable();
            $table->text('biographie')->nullable();

            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
