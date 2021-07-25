<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ActivityLog extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'activity_logs';
    protected $fillable   = ['mac_address', 'ip_address', 'uri', 'action', 'params', 'method', 'username', 'user_id', 'user_type', 'session_id'];

    public function session()
    {
        return $this->belongsTo('Session');
    }

    public function userable()
    {
        return $this->morphTo(__FUNCTION__, 'user_type', 'user_id');
    }
}
