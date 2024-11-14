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
        Schema::create('reservation_list', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_updated');
            $table->string('code');
            $table->timestamp('schedule');
            $table->string('client');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled']);
            $table->text('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_list');
    }
};
