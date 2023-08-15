<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Warehouse;

class ProjectArea extends Model
{
    use HasFactory;
    protected $table = 'project_areas';
    protected $guarded = [];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'id_project_area', 'id');
    }
}
