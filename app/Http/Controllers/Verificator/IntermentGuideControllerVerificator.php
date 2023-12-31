<?php

namespace App\Http\Controllers\Verificator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Carbon\Carbon;
use App\Models\IntermentGuide;

class IntermentGuideControllerVerificator extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        if($request->ajax())
        {
            if($request['table'] == 'pending')
            {
                $guidesPending = IntermentGuide::where('stat_approved', 1)
                                                ->where('stat_recieved', 1)
                                                ->where('stat_verified', 0)
                                                ->where('stat_rejected', 0)
                                                ->with(['warehouse.lot',
                                                        'warehouse.stage',
                                                        'warehouse.location',
                                                        'warehouse.projectArea',
                                                        'warehouse.company',
                                                        'warehouse.front'
                                                ]);

                $allGuides = DataTables::of($guidesPending)
                            ->editColumn('created_at', function($guide){
                                return $guide->created_at;
                            })
                            ->addColumn('action', function($guide){
                                $btn = '<a href="'.route('verificatorGuides.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'verified')
            {
                $guidesVerified = $user->checkerGuides()->where('stat_approved', 1)
                                                        ->where('stat_recieved', 1)
                                                        ->where('stat_verified', 1)
                                                        ->with(['warehouse.lot',
                                                                'warehouse.stage',
                                                                'warehouse.location',
                                                                'warehouse.projectArea',
                                                                'warehouse.company',
                                                                'warehouse.front'
                                                        ]);

                $allGuides = DataTables::of($guidesVerified)
                            ->editColumn('created_at', function($guide){
                                return $guide->created_at;
                            })
                            ->addColumn('action', function($guide){
                                $btn = '<a href="'.route('verificatorVerifiedGuides.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })
                            ->addColumn('pdf', function($guide){
                                $btn ='<a href="'.route('generateIntermentGuidePdf', $guide).'" target="BLANK"
                                        data-original-title="show" class="icon-pdf-generate">
                                            <i class="fa-solid fa-file-pdf fa-xl"></i>
                                        </a>';
            
                                return $btn;
                            }) 
                            ->rawColumns(['action','pdf'])
                            ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'rejected')
            {
                $guidesRejected = $user->checkerGuides()->where('stat_rejected', 1)
                                                        ->where('stat_verified', 0)
                                                        ->with(['warehouse.lot',
                                                                'warehouse.stage',
                                                                'warehouse.location',
                                                                'warehouse.projectArea',
                                                                'warehouse.company',
                                                                'warehouse.front'
                                                        ]);

                $allGuides = DataTables::of($guidesRejected)
                            ->editColumn('created_at', function($guide){
                                return $guide->created_at;
                            })
                            ->addColumn('action', function($guide){
                                $btn = '<a href="'.route('verificatorRejectedGuides.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                return $allGuides;
            }
        }

        return view('principal.viewVerificator.internmentGuides.pending.index');
    }


    public function pendingShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                            $query->with(['front','company','location','lot','projectArea','stage'])
                        ])
                        ->with('approvant.role')
                        ->with('applicant.role')
                        ->with('reciever.role')
                        ->with(['guideWastes' => fn($query) =>
                            $query->with(['waste.classesWastes', 'package'])    
                        ])
                        ->where('id', $guide->id)->first();

        $totalWeight = $guide->guideWastes->sum(function($waste){
                            return $waste->actual_weight;
                        });

        $totalPackage = $guide->guideWastes->sum(function($waste){
                            return $waste->package_quantity;
                        });

        return view('principal.viewVerificator.internmentGuides.pending.show', [
            "guide" => $guide,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }

    public function updateVerified(IntermentGuide $guide)
    {
        $user = Auth::user();

        if($guide->stat_verified == 0 && $guide->stat_rejected == 0)
        {
            $guide->update([
                "stat_verified" => 1,
                "date_verified" => Carbon::now()->toDateTimeString(),
                "id_checker" => $user->id
            ]);
        }


        return redirect()->route('verificatorGuides.index');
    }


    public function updateRejected(IntermentGuide $guide)
    {
        $user = Auth::user();

        if($guide->stat_verified == 0 && $guide->stat_rejected == 0)
        {
            $guide->update([
                "stat_rejected" => 1,
                "date_rejected" => Carbon::now()->toDateTimeString(),
                "id_checker" => $user->id
            ]);
        }

        return redirect()->route('verificatorGuides.index');
    }


    public function verifiedIndex()
    {
        return view('principal.viewVerificator.internmentGuides.verified.index');
    }


    public function verifiedShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                                $query->with(['front','company','location','lot','projectArea','stage'])
                                        ])
                            ->with('approvant.role')
                            ->with('applicant.role')
                            ->with('reciever.role')
                            ->with('checker.role')
                            ->with(['guideWastes' => fn($query) =>
                                    $query->with(['waste.classesWastes', 'package'])    
                            ])
                            ->where('id', $guide->id)->first();

        $totalWeight = $guide->guideWastes->sum(function($waste){
                        return $waste->actual_weight;
                    });

        $totalPackage = $guide->guideWastes->sum(function($waste){
                        return $waste->package_quantity;
                    });

        return view('principal.viewVerificator.internmentGuides.verified.show', [
            "guide" => $guide,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }


    public function rejectedIndex()
    {
        return view('principal.viewVerificator.internmentGuides.rejected.index');
    }

    public function rejectedShow(IntermentGuide $guide)
    {

        $guide = $guide->with(['warehouse' => fn($query) =>
                                $query->with(['front','company','location','lot','projectArea','stage'])
                                        ])
                                ->with('approvant.role')
                                ->with('applicant.role')
                                ->with('reciever.role')
                                ->with(['guideWastes' => fn($query) =>
                                        $query->with(['waste.classesWastes', 'package'])    
                                    ])
                                ->where('id', $guide->id)->first();

        $totalWeight = $guide->guideWastes->sum(function($waste){
                            return $waste->actual_weight;
                        });
        
        $totalPackage = $guide->guideWastes->sum(function($waste){
                            return $waste->package_quantity;
                        });

        return view('principal.viewVerificator.internmentGuides.rejected.show', [
            "guide" => $guide,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }


    public function undoReject(IntermentGuide $guide)
    {
        $guide->update([
            "stat_rejected" => 0,
            "id_checker" => null
        ]);

        return redirect()->route('verificatorGuides.index');
    }


}
