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
        Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('date'); 
        $table->string('phone');
        $table->text('address'); 
        $table->integer('total');
        $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending'); 
        $table->timestamps();

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
