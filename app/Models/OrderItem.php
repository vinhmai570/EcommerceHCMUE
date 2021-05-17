<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'product_sku_id', 'quantity', 'price', 'sub_total'];

    public static function boot() {
        parent::boot();

        static::saving(function($order_item) {
            $order_item->product_sku->quantity -= $order_item->quantity;
            $order_item->product->selled_count += $order_item->quantity;
            $order_item->product->save();
            $order_item->product_sku->save();
        });
    }

    public function order()
    {
        return $this->belongsTo(order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_sku()
    {
        return $this->belongsTo(ProductSku::class);
    }
}
