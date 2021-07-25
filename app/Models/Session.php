<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Session extends Model
{
    use HasFactory, HybridRelations;

    protected $connection = 'mysql';
    protected $fillable = ['ip_address', 'client', 'device_name', 'device_type', 'os', 'user_agent', 'city', 'sessionable_id', 'sessionable_type'];

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function sessionable()
    {
        return $this->morphTo();
    }
}
