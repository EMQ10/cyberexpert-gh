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
        Schema::create('experts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('picture')->nullable();
            $table->string('name')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('contact')->nullable();
            $table->string('profile_message')->nullable();
            $table->integer('publish')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experts');
    }
};
