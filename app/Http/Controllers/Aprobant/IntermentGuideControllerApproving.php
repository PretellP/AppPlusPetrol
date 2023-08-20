<?php

namespace App\Http\Controllers\Aprobant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Carbon\Carbon;
use App\Models\IntermentGuide;

class IntermentGuideControllerApproving extends Controller
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
                $guidesPending = $user->approvantGuides()->where('stat_approved', 0)->where('stat_rejected', 0)->get();

                $allGuides = DataTables::of($guidesPending)
                ->addColumn('date', function($guide){
                    return $guide->created_at;
                })
                ->addColumn('lot', function($guide){
                    return $guide->warehouse->lot->name;
                })
                ->addColumn('stage', function($guide){
                    return $guide->warehouse->stage->name;
                })
                ->addColumn('location', function($guide){
                    return $guide->warehouse->location->name;
                })
                ->addColumn('proyect', function($guide){
                    return $guide->warehouse->projectArea->name;
                })
                ->addColumn('company', function($guide){
                    return $guide->warehouse->company->name;
                })
                ->addColumn('front', function($guide){
                    return $guide->warehouse->front->name;
                })
                ->addColumn('action', function($guide){
                    $btn = '<a href="'.route('approvingGuides.show', $guide).'"
                            data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'approved')
            {
                $guidesApproved = $user->approvantGuides()->where('stat_approved', 1)->get();

                $allGuides = DataTables::of($guidesApproved)
                ->addColumn('date', function($guide){
                    return $guide->created_at;
                })
                ->addColumn('lot', function($guide){
                    return $guide->warehouse->lot->name;
                })
                ->addColumn('stage', function($guide){
                    return $guide->warehouse->stage->name;
                })
                ->addColumn('location', function($guide){
                    return $guide->warehouse->location->name;
                })
                ->addColumn('proyect', function($guide){
                    return $guide->warehouse->projectArea->name;
                })
                ->addColumn('company', function($guide){
                    return $guide->warehouse->company->name;
                })
                ->addColumn('front', function($guide){
                    return $guide->warehouse->front->name;
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
                                                            ->where('stat_approved', 0)->get();

                $allGuides = DataTables::of($guidesRejected)
                ->addColumn('date', function($guide){
                    return $guide->created_at;
                })
                ->addColumn('lot', function($guide){
                    return $guide->warehouse->lot->name;
                })
                ->addColumn('stage', function($guide){
                    return $guide->warehouse->stage->name;
                })
                ->addColumn('location', function($guide){
                    return $guide->warehouse->location->name;
                })
                ->addColumn('proyect', function($guide){
                    return $guide->warehouse->projectArea->name;
                })
                ->addColumn('company', function($guide){
                    return $guide->warehouse->company->name;
                })
                ->addColumn('front', function($guide){
                    return $guide->warehouse->front->name;
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
                                ->with('applicant.userType')
                                ->where('id', $guide->id)->first();

        $wasteTypes = $guide->wasteTypes()->with('classesWastes')->get();

        return view('principal.viewApproving.intermentGuides.pending.show', [
            "guide" => $guide,
            "wasteTypes" => $wasteTypes
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
        ->with('approvant.userType')
        ->with('applicant.userType')
        ->where('id', $guide->id)->first();

        $wasteTypes = $guide->wasteTypes()->with('classesWastes')->get();

        $totalWeight = $wasteTypes->sum(function($waste){
                            return $waste->pivot->actual_weight;
                        });

        return view('principal.viewApproving.intermentGuides.approved.show', [
            "guide" => $guide,
            "wasteTypes" => $wasteTypes,
            "totalWeight" => $totalWeight
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
        ->with('approvant.userType')
        ->with('applicant.userType')
        ->where('id', $guide->id)->first();

        $wasteTypes = $guide->wasteTypes()->with('classesWastes')->get();

        $totalWeight = $wasteTypes->sum(function($waste){
                            return $waste->pivot->actual_weight;
                        });

        return view('principal.viewApproving.intermentGuides.rejected.show', [
            "guide" => $guide,
            "wasteTypes" => $wasteTypes,
            "totalWeight" => $totalWeight
        ]);
    }

    public function undoReject(IntermentGuide $guide)
    {
        $guide->update([
            'stat_rejected' => 0,
        ]);

        return redirect()->route('approvingGuides.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, IntermentGuide $guide)
    {
        foreach($request['waste-types-approved'] as $id)
        {
            $guide->wasteTypes()->updateExistingPivot($id, [
                "actual_weight" => $request['input-actual-weight-'.$id]
            ]);
        }

        $guide->update([
            "stat_approved" => 1,
            "date_approved" => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('approvingGuides.index');
    }


    public function updateReject(Request $request, IntermentGuide $guide)
    {
        $guide->update([
            "stat_rejected" => 1,
            "date_rejected" => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('approvingGuides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
