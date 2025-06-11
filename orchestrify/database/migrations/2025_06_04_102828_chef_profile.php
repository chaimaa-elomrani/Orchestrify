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
        Schema::create('chef_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('orchestre_name')->nullable();
            $table->integer('experience')->nullable();
            $table->string('formation')->nullable();
            $table->integer('musicians_count')->nullable();
            $table->string('style')->nullable();
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
