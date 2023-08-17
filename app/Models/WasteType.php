<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{WasteClass, IntermentGuide};

class WasteType extends Model
{
    use HasFactory;
    protected $table = 'waste_types';
    protected $guarded = [];

    public function classesWastes()
    {
        return $this->belongsToMany(WasteClass::class, 'classes_has_wastes', 'id_waste', 'id_class')
                    ->withPivot(['id'])->withTimestamps();
    }


    
    public function intermentGuides()
    {
        return $this->belongsToMany(IntermentGuide::class, 'guide_has_wastes', 'id_wasteType', 'id_guide')
                    ->withPivot(['id', 'aprox_weight', 'actual_weight', 'package_quantity', 'package_type'])
                    ->withTimestamps();
    }
}
