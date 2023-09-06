<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{GuideWaste};

class AdminGeneratedWastesController extends Controller
{
    public function index(Request $request)
    {
        // $wastes = IntermentGuide::with(['guideWastes' => fn($query) =>
        //                                 $query->with('waste.classesWastes')
        //                                     ->with([
        //                                         'guide' => fn($query2) => 
        //                                             $query2->with([
        //                                                 'warehouse'=>fn($query3)=>
        //                                                     $query3->with([
        //                                                         'company:id,name',
        //                                                         'front:id,name',
        //                                                         'location:id,name',
        //                                                         'lot:id,name',
        //                                                         'projectArea:id,name',
        //                                                         'stage:id,name'
        //                                                     ])
        //                                                 ])
        //                                         ])
        //                             ])
        //                             ->where('stat_verified', 1)
        //                             ->get()
        //                             ->pluck('guideWastes')
        //                             ->flatten();

        if($request->ajax())
        {        
            $wastes = GuideWaste::whereHas('guide', function($query){
                                    $query->where('stat_approved', 1)
                                        ->where('stat_recieved', 1)
                                        ->where('stat_verified', 1);
                                })
                                ->with(['waste.classesWastes',
                                        'guide.warehouse.company',
                                        'package',
                                        'packingGuide'
                                ]);

            $allWastes = DataTables::of($wastes)
                                ->editColumn('packing_guide.cod_guide', function($waste){
                                    return $waste->packingGuide != null ? $waste->packingGuide->cod_guide : '- -';
                                })
                                ->addColumn('waste.classes_wastes', function($waste){
                                    return $waste->waste->classesWastes->first()->symbol;
                                })
                                ->editColumn('packing_guide.date_guides_departure', function($waste){
                                    return $waste->packingGuide != null ? $waste->packingGuide->date_guides_departure : '- -';
                                })
                                ->editColumn('packing_guide.volum', function($waste){
                                    return $waste->packingGuide != null ? $waste->packingGuide->volum : '- -';
                                })
                                ->make(true);

            return $allWastes;
        }

        return view('principal.viewAdmin.generatedWastes.index');
    }
}
