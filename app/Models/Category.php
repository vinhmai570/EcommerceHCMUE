<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Product;

class Category extends Model
{
    use HasFactory, Sortable;

    const UNCATEGORIZED_ID = 1;

    public $sortable = ['id', 'name', 'created_at'];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function boot() {
        parent::boot();

        static::creating(function($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function($category) {
            $category->slug = Str::slug($category->name);
        });

        static::deleting(function($category) {
            $category->products()->update(['category_id' => self::UNCATEGORIZED_ID]);
        });
    }
}
