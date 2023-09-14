<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\IntermentGuide;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role->name;

        $routeApproved = '';
        $routePending = '';
        $routeRejected = '';
        $routeWastes = '';

        $countApproved = 0;
        $countPending = 0;
        $countRejected = 0;


        if ($role == 'APROBANTE') {
            $routeApproved = route('approvingApprovedGuides.index');
            $routePending = route('approverGuides.index');
            $routeRejected = route('approvingRejectedGuides.index');
            $routeWastes = route('generatedWastesApproving.index');
            $countApproved = $user->approvantGuides()->where('stat_approved', 1)
                                                    ->count();
            $countPending = $user->approvantGuides()->where('stat_approved', 0)
                                                    ->where('stat_rejected', 0)
                                                    ->count();
            $countRejected = $user->approvantGuides()->where('stat_rejected', 1)
                                                        ->where('stat_approved', 0)
                                                        ->count();
        }
        elseif($role == 'RECEPTOR')
        {
            $routeApproved = route('recieverRecievedGuides.index');
            $routePending = route('recieverGuides.index');
            $routeRejected = route('recieverRejectedGuides.index');
            $routeWastes = route('generatedWastesReciever.index');
            $countApproved = $user->receiverGuides()->where('stat_approved', 1)
                                                    ->where('stat_recieved', 1)
                                                    ->count();
            $countPending = IntermentGuide::where('stat_approved', 1)
                                            ->where('stat_recieved', 0)
                                            ->where('stat_rejected', 0)
                                            ->count();
            $countRejected = $user->receiverGuides()->where('stat_rejected', 1)
                                                    ->where('stat_recieved', 0)
                                                    ->count();
        }
        elseif($role == 'SUPERVISOR')
        {
            $routeApproved = route('verificatorVerifiedGuides.index');
            $routePending = route('verificatorGuides.index');
            $routeRejected = route('verificatorRejectedGuides.index');
            $routeWastes = route('generatedWastesVerificator.index');
            $countApproved = $user->checkerGuides()->where('stat_approved', 1)
                                                    ->where('stat_recieved', 1)
                                                    ->where('stat_verified', 1)
                                                    ->count();
            $countPending = IntermentGuide::where('stat_approved', 1)
                                            ->where('stat_recieved', 1)
                                            ->where('stat_verified', 0)
                                            ->where('stat_rejected', 0)
                                            ->count();
            $countRejected = $user->checkerGuides()->where('stat_rejected', 1)
                                                    ->where('stat_verified', 0)
                                                    ->count();
        }
        elseif($role == 'SOLICITANTE')
        {
            $routeApproved = route('guidesApproved.index');
            $routePending = route('guidesPending.index');
            $routeRejected = route('guidesRejected.index');
            $routeWastes = route('generatedWastesApplicant.index');
            $countApproved = $user->applicantGuides()->where('stat_approved', 1)
                                                    ->where('stat_recieved', 1)
                                                    ->where('stat_verified', 1)
                                                    ->count();
            $countPending = $user->applicantGuides()->where('stat_rejected', 0)
                                                    ->where(function($query){
                                                        $query->where('stat_approved', 0)
                                                            ->orWhere('stat_recieved', 0)
                                                            ->orWhere('stat_verified', 0);
                                                    })
                                                    ->count();
            $countRejected = $user->applicantGuides()->where('stat_rejected', 1)
                                                    ->count();
        }
        elseif($role == 'ADMINISTRADOR')
        {
            $routeApproved = route('guidesAdminApproved.index');
            $routePending = route('guidesAdminPending.index');
            $routeRejected = route('guidesAdminRejected.index');
            $routeWastes = route('generatedWastesAdmin.index');
            $countApproved = IntermentGuide::where('stat_approved', 1)
                                            ->where('stat_recieved', 1)
                                            ->where('stat_verified', 1)
                                            ->count();
            $countPending = IntermentGuide::where('stat_rejected', 0)
                                            ->where(function($query){
                                                $query->where('stat_approved', 0)
                                                    ->orWhere('stat_recieved', 0)
                                                    ->orWhere('stat_verified', 0);
                                            })
                                            ->count();
            $countRejected = IntermentGuide::where('stat_rejected', 1)
                                            ->count();
        }

        return view('principal.common.home.home', [
            "routeApproved" => $routeApproved,
            "routePending" => $routePending,
            "routeRejected" => $routeRejected,
            "routeWastes" => $routeWastes,
            'countPending' => $countPending,
            'countApproved' => $countApproved,
            "countRejected" => $countRejected
        ]);
    }
}
