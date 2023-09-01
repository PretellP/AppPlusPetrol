<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{GuideWaste, Departure};

class PackingGuide extends Model
{
    use HasFactory;
    protected $table = 'packing_guides';
    protected $guarded = [];

    public function wastes()
    {
        return $this->hasMany(GuideWaste::class, 'id_packing_guide', 'id');
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class, 'id_departure', 'id');
    }
}
