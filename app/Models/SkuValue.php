<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkuValue extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_id', 'attribute_value_id'];

    /**
     * Get the user that owns the SkuValue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute_value()
    {
        return $this->belongsTo(AttributeValue::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function product_sku()
    {
        $this->belongsTo(ProductSku::class);
    }
}
