<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{GuideWaste};

class Departure extends Model
{
    use HasFactory;
    protected $table = 'departures';
    protected $guarded = [];

    public function wastes()
    {
        return $this->hasMany(GuideWaste::class, 'id_departure', 'id');
    }
}
