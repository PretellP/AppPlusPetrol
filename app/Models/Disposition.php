<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Departure};

class Disposition extends Model
{
    use HasFactory;
    protected $table = 'dispositions';
    protected $guarded = [];

    public function departures()
    {
        return $this->belongsTo(Departure::class, 'id_disposition', 'id');
    }
}
