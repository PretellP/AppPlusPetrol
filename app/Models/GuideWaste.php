<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{IntermentGuide, WasteType, PackageType, PackingGuide, Departure, Disposition};

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

    public function packingGuide()
    {
        return $this->belongsTo(PackingGuide::class, 'id_packing_guide', 'id');
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class, 'id_departure', 'id');
    }

    public function disposition()
    {
        return $this->belongsTo(Disposition::class, 'id_disposition', 'id');
    }
}
