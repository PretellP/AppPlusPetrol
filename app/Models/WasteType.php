<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{WasteClass, GuideWaste};

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

    public function guideWastes()
    {
        return $this->hasMany(GuideWaste::class, 'id_wasteType', 'id');
    }
}
