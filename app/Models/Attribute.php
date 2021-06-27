<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    const FIRST_ATTRIBUTE_ID = 1;
    const SECOND_ATTRIBUTE_ID = 2;

    public function attribute_values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function sku_values()
    {
        return $this->hasMany(SkuValue::class);
    }
}
