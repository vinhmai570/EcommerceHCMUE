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
}
