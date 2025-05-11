<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Product extends Model
// {
// public function up(): void
// {
// Schema::create('products', function (Blueprint $table) {
//     $table->id(); // id, unsignedBigInteger, auto-increment, PK

//     $table->string('name', 255); // required
//     $table->string('slug', 255)->unique(); // SEO-friendly slug
//     $table->text('description')->nullable(); // optional
//     $table->string('sku', 50)->unique(); // unique stock code
//     $table->decimal('price', 10, 2)->unsigned(); // >= 0
//     $table->integer('stock')->default(0)->unsigned(); // default 0

//     $table->unsignedBigInteger('product_category_id')->nullable(); // FK
//     $table->foreign('product_category_id')
//             ->references('id')->on('product_categories')
//             ->onDelete('set null')
//             ->onUpdate('cascade');

//     $table->string('image_url', 255)->nullable(); // optional image
//     $table->boolean('is_active')->default(true); // aktif/tidak

//     $table->timestamps(); // created_at & updated_at
// });
// }

// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'stock',
        'product_category_id',
        'image_url',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
