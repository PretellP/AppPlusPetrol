<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $userType = Auth::user()->userType->name;
        $routeApproved = '';
        $routePending = '';
        $routeRejected = '';
        $routeWastes = '';

        if ($userType == 'APROBANTE') {
            $routeApproved = route('approvingApprovedGuides.index');
            $routePending = route('approvingGuides.index');
            $routeRejected = route('approvingRejectedGuides.index');
        }
        elseif($userType == 'RECEPTOR')
        {
            $routeApproved = route('recieverRecievedGuides.index');
            $routePending = route('recieverGuides.index');
            $routeRejected = route('recieverRejectedGuides.index');
        }
        elseif($userType == 'SUPERVISOR')
        {
            $routeApproved = route('verificatorVerifiedGuides.index');
            $routePending = route('verificatorGuides.index');
            $routeRejected = route('verificatorRejectedGuides.index');
        }
        elseif($userType == 'SOLICITANTE')
        {
            $routeApproved = route('guidesApproved.index');
            $routePending = route('guidesPending.index');
            $routeRejected = route('guidesRejected.index');
            $routeWastes = route('generatedWastesApplicant.index');
        }
        elseif($userType == 'ADMINISTRADOR')
        {
            $routeApproved = route('guidesAdminApproved.index');
            $routePending = route('guidesAdminPending.index');
            $routeRejected = route('guidesAdminRejected.index');
            $routeWastes = route('generatedWastesAdmin.index');
        }

        return view('principal.common.home.home', [
            "routeApproved" => $routeApproved,
            "routePending" => $routePending,
            "routeRejected" => $routeRejected,
            "routeWastes" => $routeWastes
        ]);
    }
}
