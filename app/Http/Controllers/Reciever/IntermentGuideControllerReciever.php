<?php

namespace App\Http\Controllers\Reciever;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Carbon\Carbon;
use App\Models\IntermentGuide;

class IntermentGuideControllerReciever extends Controller
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
                $guidesPending = IntermentGuide::where('stat_approved', 1)
                                                ->where('stat_recieved', 0)
                                                ->where('stat_rejected', 0)->get();

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
                    $btn = '<a href="'.route('recieverGuides.show', $guide).'"
                            data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'recieved')
            {
                $guidesRecieved = $user->receiverGuides()->where('stat_approved', 1)
                                                        ->where('stat_recieved', 1)->get();

                $allGuides = DataTables::of($guidesRecieved)
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
                    $btn = '<a href="'.route('recieverRecievedGuides.show', $guide).'"
                            data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'rejected')
            {
                $guidesRejected = $user->receiverGuides()->where('stat_rejected', 1)
                                                        ->where('stat_recieved', 0)->get();

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
                    $btn = '<a href="'.route('recieverRejectedGuides.show', $guide).'"
                            data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allGuides;
            }
        }

        return view('principal.viewReciever.internmentGuides.pending.index');
    }


    public function pendingShow(IntermentGuide $guide)
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

        return view('principal.viewReciever.internmentGuides.pending.show', [
            "guide" => $guide,
            "wasteTypes" => $wasteTypes,
            "totalWeight" => $totalWeight
        ]);
    }

    public function updateRecieved(IntermentGuide $guide)
    {
        $user = Auth::user();

        if($guide->stat_recieved == 0 && $guide->stat_rejected == 0)
        {
            $guide->update([
                "stat_recieved" => 1,
                "date_recieved" => Carbon::now()->toDateTimeString(),
                "id_reciever" => $user->id
            ]);
        }

        return redirect()->route('recieverGuides.index');
    }


    public function updateReject(IntermentGuide $guide)
    {
        $user = Auth::user();

        if($guide->stat_recieved == 0 && $guide->stat_rejected == 0)
        {
            $guide->update([
                "stat_rejected" => 1,
                "date_rejected" => Carbon::now()->toDateTimeString(),
                "id_reciever" => $user->id
            ]);
        }

        return redirect()->route('recieverGuides.index');
    }


    public function recievedIndex()
    {
        return view('principal.viewReciever.internmentGuides.recieved.index');
    }


    public function recievedShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
        $query->with(['front','company','location','lot','projectArea','stage'])
        ])
        ->with('approvant.userType')
        ->with('applicant.userType')
        ->with('reciever.userType')
        ->where('id', $guide->id)->first();

        $wasteTypes = $guide->wasteTypes()->with('classesWastes')->get();

        $totalWeight = $wasteTypes->sum(function($waste){
                            return $waste->pivot->actual_weight;
                        });
        
        return view('principal.viewReciever.internmentGuides.recieved.show', [
            "guide" => $guide,
            "wasteTypes" => $wasteTypes,
            "totalWeight" => $totalWeight
        ]);
    }

    public function rejectedIndex()
    {
        return view('principal.viewReciever.internmentGuides.rejected.index');
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

        $totalPackage = $wasteTypes->sum(function($waste){
        return $waste->pivot->package_quantity;
        });

        return view('principal.viewReciever.internmentGuides.rejected.show',[
            "guide" => $guide,
            "wasteTypes" => $wasteTypes,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }


    public function undoReject(IntermentGuide $guide)
    {
        $guide->update([
            'stat_rejected' => 0,
            'id_reciever' => null
        ]);
        
        return redirect()->route('recieverGuides.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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