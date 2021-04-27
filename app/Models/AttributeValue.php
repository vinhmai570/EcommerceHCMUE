<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    public function attribute()
    {
        $this->belongsTo(Attribute::class);
    }

    public function sku_values()
    {
        return $this->hasMany(SkuValue::class);
    }
}
