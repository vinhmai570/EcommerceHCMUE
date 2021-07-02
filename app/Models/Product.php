<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'content', 'category_id', 'is_published', 'is_featured', 'variantion_default_id'];

    const MAIN_CATEGORIES = array(
        2 => 'Headphone',
        3 => 'Watch',
        4 => 'Phone',
        5 => 'Game',
        6 => 'Laptop',
        7 => 'Televison'
    );

    const IMAGE_SIZE = array(
        'small'    => '60x60',
        "medium"   => '256x360',
        "large"    => '600x600',
        "list"     => '500x500',
        "featured" => '400x480',
    );

    public function category()
    {
        return $this->beLongsTo(Category::class);
    }

    public function product_skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public static function boot() {
        parent::boot();

        static::creating(function($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function($product) {
            $product->slug = Str::slug($product->name);
        });

        static::deleting(function($product) {
             $product->product_skus()->delete();
        });
    }

    public function scopeWithVariantionDefault($query)
    {
        return $query->join('product_skus', 'products.id', '=', 'product_skus.product_id')->whereColumn('products.variantion_default_id', 'product_skus.id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
