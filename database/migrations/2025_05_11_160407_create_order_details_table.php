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
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id'); // BIGINT, UNSIGNED, PRIMARY KEY, AUTO_INCREMENT
            $table->unsignedBigInteger('order_id'); // BIGINT, UNSIGNED, NOT NULL
            $table->unsignedBigInteger('product_id'); // BIGINT, UNSIGNED, NOT NULL
            $table->unsignedInteger('quantity')->default(1); // INTEGER, UNSIGNED, NOT NULL, DEFAULT 1
            $table->decimal('unit_price', 10, 2); // DECIMAL(10, 2), NOT NULL
            $table->decimal('subtotal', 10, 2); // DECIMAL(10, 2), NOT NULL
            $table->timestamp('created_at')->nullable(); // TIMESTAMP, NULLABLE
            $table->timestamp('updated_at')->nullable(); // TIMESTAMP, NULLABLE

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
