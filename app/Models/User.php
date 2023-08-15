<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\{UserType, User};

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id_user_type',
        'user_name',
        'password',
        'name',
        'email',
        'phone',
        'comment',
        'url_signature',
        'status',
        'remember_token',
        'last_login_at',
        'last_login_ip_address',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'id_user_type', 'id');
    }

    public function approvings()
    {
        return $this->belongsToMany(User::class, 'users_has_approvings', 'id_user', 'id_approving')
                    ->withPivot('id')->withTimestamps();
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'users_has_approvings', 'id_approving', 'id_user')
                    ->withPivot('id')->withTimestamps();
    }
}
