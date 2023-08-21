<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuideWaste;

class PackageType extends Model
{
    use HasFactory;
    protected $table = 'package_types';
    protected $guarded = [];

    public function guideWastes()
    {
        return $this->hasMany(GuideWaste::class, 'id_packageType', 'id');
    }
}
