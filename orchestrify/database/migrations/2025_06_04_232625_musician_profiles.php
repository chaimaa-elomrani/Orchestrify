<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musician_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('instrument_id')->constrained('instruments')->onDelete('cascade');
            $table->enum('level', ['débutant', 'intermédiaire', 'avancé']);
            $table->integer('experience')->nullable();
            $table->string('style')->nullable();
            $table->string('disponibility')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('completed')->default(false);

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
