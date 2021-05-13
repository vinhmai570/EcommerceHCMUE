<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public function attribute_values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function sku_values()
    {
        return $this->hasMany(SkuValue::class);
    }
}
