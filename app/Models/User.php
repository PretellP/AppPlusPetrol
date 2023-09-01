<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\{Role, User, IntermentGuide, Company, OwnerCompany};

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id_role',
        'id_company',
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
        'updated_at',
        'id_owner_company'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function approvings()
    {
        return $this->belongsToMany(User::class, 'users_has_approvings', 'id_user', 'id_approving')
                    ->withPivot(['id'])->withTimestamps();
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'users_has_approvings', 'id_approving', 'id_user')
                    ->withPivot(['id'])->withTimestamps();
    }

    public function applicantGuides()
    {
        return $this->hasMany(IntermentGuide::class, 'id_applicant', 'id');
    }

    public function approvantGuides()
    {
        return $this->hasMany(IntermentGuide::class, 'id_approvant', 'id');
    }

    public function receiverGuides()
    {
        return $this->hasMany(IntermentGuide::class, 'id_reciever', 'id');
    }

    public function checkerGuides()
    {
        return $this->hasMany(IntermentGuide::class, 'id_checker', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id');
    }

    public function ownerCompany()
    {
        return $this->belongsTo(OwnerCompany::class, 'id_owner_company', 'id');
    }
}
