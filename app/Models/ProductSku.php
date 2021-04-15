<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;

    protected $fillable = ['sku', 'product_id', 'price', 'sale_price', 'quantity', 'is_default'];
}
