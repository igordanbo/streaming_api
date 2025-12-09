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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->text('content')->nullable();
            $table->string('media_url');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->float('rating')->nullable();
            $table->foreignId('season_id')->nullable()->constrained('seasons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
