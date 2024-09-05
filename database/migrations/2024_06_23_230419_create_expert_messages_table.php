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
        Schema::create('expert_messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('expert_name')->nullable();
            $table->string('expert_email')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('subject')->nullable();
            $table->string('message')->nullable();
            $table->integer('status')->nullable();
            $table->foreignUuid('expert_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_messages');
    }
};
