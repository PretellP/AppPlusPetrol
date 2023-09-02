<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{GuideWaste};

class ApproverGeneratedWastesController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();


        if($request->ajax())
        {
            $wastes = GuideWaste::whereHas('guide', function($query) use($user){
                                    $query->where('stat_approved', 1)
                                        ->where('stat_recieved', 1)
                                        ->where('stat_verified', 1)
                                        ->where('id_approvant', $user->id);
                                })
                                ->with(['waste.classesWastes',
                                        'guide',
                                        'guide.warehouse.company',
                                        'guide.warehouse.front',
                                        'guide.warehouse.location',
                                        'guide.warehouse.lot',
                                        'guide.warehouse.projectArea',
                                        'guide.warehouse.stage',
                                        'package'
                                ]);

            if($request->filled('from_date') && $request->filled('end_date')){
                $wastes = $wastes->whereHas('guide', function($query2) use($request){
                        $query2->whereBetween('date_verified', [$request->from_date, $request->end_date]);
                    });
            }

            $allWastes = DataTables::of($wastes)
                        ->addColumn('waste.classes_wastes', function($waste){
                            return $waste->waste->classesWastes->first()->symbol;
                        })
                        ->make(true);

            return $allWastes;
        }


        return view('principal.viewApproving.generatedWastes.index');
    }
}
