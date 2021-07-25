<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HybridRelations;

    protected $table      = 'admins';
    protected $guarded    = 'admin';
    protected $connection = 'mysql';

    protected $fillable = [
        'name', 'email', 'password', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'userable');
    }

    public function sessions()
    {
        return $this->morphMany(Session::class, 'sessionable');
    }
}
