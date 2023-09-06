<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Carbon\Carbon;
use App\Models\IntermentGuide;

class IntermentGuideControllerApprover extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

       if($request->ajax())
        {
            if($request['table'] == 'pending')
            {
                $guidesPending = $user->approvantGuides()
                                        ->where('stat_approved', 0)
                                        ->where('stat_rejected', 0)
                                        ->whereHas('applicant.company', function($query) use($user){
                                            $query->where('id', $user->company->id);
                                        })
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
                                $btn = '<a href="'.route('approverGuides.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'approved')
            {
                $guidesApproved = $user->approvantGuides()->where('stat_approved', 1)
                                                        ->with(['warehouse.lot',
                                                        'warehouse.stage',
                                                        'warehouse.location',
                                                        'warehouse.projectArea',
                                                        'warehouse.company',
                                                        'warehouse.front'
                                                ]);

                $allGuides = DataTables::of($guidesApproved)
                            ->editColumn('created_at', function($guide){
                                return $guide->created_at;
                            })
                            ->addColumn('action', function($guide){
                                $btn = '<a href="'.route('approvingApprovedGuides.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'rejected')
            {
                $guidesRejected = $user->approvantGuides()->where('stat_rejected', 1)
                                                            ->where('stat_approved', 0)
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
                                $btn = '<a href="'.route('approvingRejectedGuides.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                            
                return $allGuides;
            }
        }

        return view('principal.viewApproving.intermentGuides.pending.index');
    }


    public function show(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                                $query->with(['front','company','location','lot','projectArea','stage'])
                                ])
                                ->with('applicant.role')
                                ->with(['guideWastes' => fn($query) =>
                                    $query->with(['waste.classesWastes', 'package'])    
                                ])
                                ->where('id', $guide->id)->first();

        $aprox_weight = $guide->guideWastes->sum(function($waste){
                            return $waste->aprox_weight;
                        });

        $totalPackage = $guide->guideWastes->sum(function($waste){
                            return $waste->package_quantity;
                        });

        return view('principal.viewApproving.intermentGuides.pending.show', [
            "guide" => $guide,
            "totalPackage" => $totalPackage,
            "aprox_weight" => $aprox_weight
        ]);
    }


    public function indexApproved()
    {
        return view('principal.viewApproving.intermentGuides.approved.index');
    }

    public function approvedShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                                $query->with(['front','company','location','lot','projectArea','stage'])
                        ])
                        ->with('approvant.role')
                        ->with('applicant.role')
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

        return view('principal.viewApproving.intermentGuides.approved.show', [
            "guide" => $guide,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }

    public function indexRejected()
    {
        return view('principal.viewApproving.intermentGuides.rejected.index');
    }

    public function rejectedShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                            $query->with(['front','company','location','lot','projectArea','stage'])
                        ])
                        ->with('approvant.role')
                        ->with('applicant.role')
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

        return view('principal.viewApproving.intermentGuides.rejected.show', [
            "guide" => $guide,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }

    public function undoReject(IntermentGuide $guide)
    {
        $guide->update([
            'stat_rejected' => 0,
        ]);

        return redirect()->route('approverGuides.index');
    }

    public function update(Request $request, IntermentGuide $guide)
    {
        $guide->update([
            "stat_approved" => 1,
            "date_approved" => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('approverGuides.index');
    }


    public function updateReject(Request $request, IntermentGuide $guide)
    {
        $guide->update([
            "stat_rejected" => 1,
            "date_rejected" => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('approverGuides.index');
    }

}
