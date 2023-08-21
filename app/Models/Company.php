<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Warehouse, User};

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = [];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'id_company', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_company', 'id');
    }
}
