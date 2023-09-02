<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->name;
        $routeApproved = '';
        $routePending = '';
        $routeRejected = '';
        $routeWastes = '';

        if ($role == 'APROBANTE') {
            $routeApproved = route('approvingApprovedGuides.index');
            $routePending = route('approverGuides.index');
            $routeRejected = route('approvingRejectedGuides.index');
            $routeWastes = route('generatedWastesApproving.index');
        }
        elseif($role == 'RECEPTOR')
        {
            $routeApproved = route('recieverRecievedGuides.index');
            $routePending = route('recieverGuides.index');
            $routeRejected = route('recieverRejectedGuides.index');
            $routeWastes = route('generatedWastesReciever.index');
        }
        elseif($role == 'SUPERVISOR')
        {
            $routeApproved = route('verificatorVerifiedGuides.index');
            $routePending = route('verificatorGuides.index');
            $routeRejected = route('verificatorRejectedGuides.index');
            $routeWastes = route('generatedWastesVerificator.index');
        }
        elseif($role == 'SOLICITANTE')
        {
            $routeApproved = route('guidesApproved.index');
            $routePending = route('guidesPending.index');
            $routeRejected = route('guidesRejected.index');
            $routeWastes = route('generatedWastesApplicant.index');
        }
        elseif($role == 'ADMINISTRADOR')
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
