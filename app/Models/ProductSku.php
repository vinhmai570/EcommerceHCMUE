<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;

    protected $fillable = ['sku', 'image', 'product_id', 'price', 'sale_price', 'quantity', 'is_default'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sku_values()
    {
        return $this->hasMany(SkuValue::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($product_sku) {
            delete_image($product_sku->image, 'product_sku');
            $product_sku->sku_values()->delete();
        });
    }

    public function scopeDefault($query)
    {
        return $query->where('default', true)->first();
    }
}
