<?php

namespace App\Http\Controllers\Verificator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{GuideWaste};

class VerificatorGeneratedWastesController extends Controller
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
                                        ->where('id_checker', $user->id);
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

        return view('principal.viewVerificator.generatedWastes.index');
    }
}
