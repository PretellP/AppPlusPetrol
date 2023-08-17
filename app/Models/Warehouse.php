<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Company,
    Front,
    Location,
    Lot,
    ProjectArea,
    Stage,
    IntermentGuide
};

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id');
    }

    public function front()
    {
        return $this->belongsTo(Front::class, 'id_front', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_location', 'id');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'id_lot', 'id');
    }

    public function projectArea()
    {
        return $this->belongsTo(ProjectArea::class, 'id_project_area', 'id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'id_stage', 'id');
    }

    public function guides()
    {
        return $this->hasMany(IntermentGuide::class, 'id_warehouse', 'id');
    }
}
