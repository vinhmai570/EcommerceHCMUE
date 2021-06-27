<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Order extends Model
{
    use Sortable, HasFactory;

    protected $fillable = ['user_id', 'total', 'address', 'fullname', 'phone', 'status'];

    public $sortable = ['id', 'fullname', 'status', 'total', 'created_at'];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
