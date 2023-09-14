<?php

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\{
    User,
    IntermentGuide
};
date_default_timezone_set("America/Lima");


function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'active':'';
}

function getDiffForHumansFromTimestamp($timestamp)
{
    return Carbon::parse($timestamp)->diffForHumans();
}

function getCurrentDate()
{
    return Carbon::now('America/Lima')->format('Y-m-d');
}

function getUserStatusClass(User $user)
{
    return $user->status == 1 ? 'active' : '';
}

function getUserCompany(User $user, IntermentGuide $guide)
{
    $company = null;
    
    if($user->companies->isNotEmpty()){
        if($user->role->name == 'APROBANTE')
        {   
            $company = $guide->warehouse->company->name;
        }else{
            $company = $user->companies->first()->name;
        }     
    }elseif($user->ownerCompany != null){
        $company = $user->ownerCompany->name;
    }

    return $company;
}

?>