<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OwnerCompany extends Model
{
    use HasFactory;
    protected $table = 'owner_companies';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'id_owner_company', 'id');
    }
}
