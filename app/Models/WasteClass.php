<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WasteType;

class WasteClass extends Model
{
    use HasFactory;
    protected $table = 'waste_classes';
    protected $guarded = [];

    public function classesWastes()
    {
        return $this->belongsToMany(WasteType::class, 'classes_has_wastes', 'id_class', 'id_waste')
                    ->withPivot('id')->withTimestamps();
    }
}
