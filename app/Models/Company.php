<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Warehouse;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = [];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'id_company', 'id');
    }
}
