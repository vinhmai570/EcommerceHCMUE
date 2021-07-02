<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Banner extends Model
{
    use HasFactory, Sortable;

    protected $table = 'banners';
    
    public $sortable = ['id', 'title', 'image', 'status', 'created_at',];
    
    protected $fillable = [ 'title', 'image', 'status', 'created_at', 'link', 'content'];
}
