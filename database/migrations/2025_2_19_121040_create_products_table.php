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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->foreignId('categories_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('subcategories_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('childcategories_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('brands_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('regular_price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sku')->nullable();
            $table->enum('featured', ['yes', 'no'])->default('yes'); 
            $table->enum('stock_status', ['instock', 'out of stock'])->default('instock'); 
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
