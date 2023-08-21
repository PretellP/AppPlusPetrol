<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{IntermentGuide, WasteType, PackageType};

class GuideWaste extends Model
{
    use HasFactory;
    protected $table = 'guide_wastes';
    protected $guarded = [];

    public function guide()
    {
        return $this->belongsTo(IntermentGuide::class, 'id_guide', 'id');
    }

    public function waste()
    {
        return $this->belongsTo(WasteType::class, 'id_wasteType', 'id');
    }

    public function package()
    {
        return $this->belongsTo(PackageType::class, 'id_packageType', 'id');
    }
}
