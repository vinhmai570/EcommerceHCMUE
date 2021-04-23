<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'content', 'category_id', 'is_published', 'is_featured', 'variantion_default_id'];

    public function product_skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($product) {
             $product->product_skus()->delete();
        });
    }
}
