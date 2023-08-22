<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    IntermentGuide
};
use Auth;
use DataTables;

class ApplicantGeneratedWastesController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $wastes = $user->applicantGuides()->with(['guideWastes' => fn($query) =>
                                            $query->with('waste.classesWastes')
                                                ->with([
                                                    'guide' => fn($query2) => 
                                                        $query2->with([
                                                            'warehouse'=>fn($query3)=>
                                                                $query3->with([
                                                                    'company:id,name',
                                                                    'front:id,name',
                                                                    'location:id,name',
                                                                    'lot:id,name',
                                                                    'projectArea:id,name',
                                                                    'stage:id,name'
                                                                ])
                                                            ])
                                                    ])
                                            ])
                                            ->where('stat_verified', 1)
                                            ->get()
                                            ->pluck('guideWastes')
                                            ->flatten();

        if($request->ajax())
        {
            if($request->filled('from_date') && $request->filled('end_date')){
                $wastes = $wastes->whereBetween('guide.date_verified', [$request->from_date, $request->end_date]);
            }

            $allWastes = DataTables::of($wastes)
            ->addColumn('code', function($waste){
                return $waste->guide->code;
            })
            ->addColumn('date', function($waste){
                return $waste->guide->date_verified;
            })
            ->addColumn('lot', function($waste){
                return $waste->guide->warehouse->lot->name;
            })
            ->addColumn('stage', function($waste){
                return $waste->guide->warehouse->stage->name;
            })
            ->addColumn('location', function($waste){
                return $waste->guide->warehouse->location->name;
            })
            ->addColumn('proyect', function($waste){
                return $waste->guide->warehouse->projectArea->name;
            })
            ->addColumn('company', function($waste){
                return $waste->guide->warehouse->company->name;
            })
            ->addColumn('front', function($waste){
                return $waste->guide->warehouse->front->name;
            })
            ->addColumn('class', function($waste){
                return $waste->waste->classesWastes->first()->symbol;
            })
            ->addColumn('waste', function($waste){
                return $waste->waste->name;
            })
            ->addColumn('weight', function($waste){
                return $waste->actual_weight;
            })
            ->addColumn('packages', function($waste){
                return $waste->package_quantity;
            })
            ->make(true);

            return $allWastes;
        }

        return view('principal.viewApplicant.generatedWastes.index');
    }
}
