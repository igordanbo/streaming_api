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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->text('content')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->float('rating')->nullable();
            $table->float('total_time')->nullable();
            $table->foreignId('serie_id')->constrained('series');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
