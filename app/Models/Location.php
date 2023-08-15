<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Warehouse;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $guarded = [];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'id_location', 'id');
    }
}
