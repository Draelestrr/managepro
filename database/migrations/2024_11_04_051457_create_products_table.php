<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('supplier_id')->nullable();
        $table->decimal('price', 10, 2);
        $table->integer('stock');
        $table->integer('stock_min')->default(0); // Minimum stock
        $table->timestamps();

        // Foreign keys
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
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
