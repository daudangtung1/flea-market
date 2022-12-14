<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const ADMIN = 0;
    const DOWNLOAD_MEMBER = 1;
    const AFFILIATE_MEMBER = 2;

    const STATUS = [
        'ONGOING' => 0,
        'BANNED' => 1
    ];

    const NOTIFICATION_STATUS = [
        'NO' => 0,
        'YES' => 1,
    ];

    public $arr_status_output = [
        'ongoing',
        'banned',
    ];

    public $arr_role_output = [
        'admin',
        'download member',
        'affiliate member'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'phone',
        'banned_status',
        'notification_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $append = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
