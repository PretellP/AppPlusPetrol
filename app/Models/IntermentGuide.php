<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Warehouse, User, GuideWaste, PackingGuide};

class IntermentGuide extends Model
{
    use HasFactory;
    protected $table = 'internment_guides';
    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'id_warehouse', 'id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'id_applicant', 'id');
    }

    public function approvant()
    {
        return $this->belongsTo(User::class, 'id_approvant', 'id');
    }

    public function reciever()
    {
        return $this->belongsTo(User::class, 'id_reciever', 'id');
    }

    public function checker()
    {
        return $this->belongsTo(User::class, 'id_checker', 'id');
    }

    public function guideWastes()
    {
        return $this->hasMany(GuideWaste::class, 'id_guide', 'id');
    }

    public function packingGuides()
    {
        return $this->belongsTo(PackingGuide::class, 'id_packing_guide', 'id');
    }

}
