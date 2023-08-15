<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserType extends Model
{
    use HasFactory;
    protected $table = 'user_types';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'id_user_type', 'id');
    }
}
