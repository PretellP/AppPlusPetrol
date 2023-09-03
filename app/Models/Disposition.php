<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{GuideWaste};

class Disposition extends Model
{
    use HasFactory;
    protected $table = 'dispositions';
    protected $guarded = [];

    public function wastes()
    {
        return $this->hasMany(GuideWaste::class, 'id_disposition', 'id');
    }
}
