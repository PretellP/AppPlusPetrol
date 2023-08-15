<?php

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\{
    User
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

?>