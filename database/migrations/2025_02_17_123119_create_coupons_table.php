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
    Schema::create('coupons', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable();
        $table->string('slug');
        $table->enum('type', ['percentage', 'fixed'])->nullable(); 
        $table->decimal('value', 10, 2)->nullable(); 
        $table->decimal('card_value', 10, 2)->nullable(); 
        $table->date('expiry_date')->nullable(); 
        $table->string('status')->nullable(); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
