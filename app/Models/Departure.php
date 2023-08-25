<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{PackingGuide, Disposition};

class Departure extends Model
{
    use HasFactory;
    protected $table = 'departures';
    protected $guarded = [];

    public function packingGuides()
    {
        return $this->hasMany(PackingGuide::class, 'id_departure', 'id');
    }

    public function disposition()
    {
        return $this->belongsTo(Disposition::class, 'id_disposition', 'id');
    }
}
