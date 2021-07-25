<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Sortable, HybridRelations;

    protected $table      = 'users';
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'birthday',
        'image'
    ];

    public $sortable = ['id', 'name', 'email', 'birthday', 'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'userable');
    }

    public function sessions()
    {
        return $this->morphMany(Session::class, 'sessionable');
    }
}
