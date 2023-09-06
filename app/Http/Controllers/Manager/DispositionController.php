<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{IntermentGuide, PackingGuide, GuideWaste, Disposition};

class DispositionController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){

            $wastes = GuideWaste::whereHas('guide', function($query){
                                    $query->where('stat_approved', 1)
                                            ->where('stat_recieved', 1)
                                            ->where('stat_verified', 1);
                                    })
                                    ->where('stat_arrival', 1)
                                    ->where('stat_transport_departure', 1)
                                    ->with(['waste.classesWastes',
                                            'guide.warehouse.company',
                                            'package',
                                            'packingGuide',
                                            'departure',
                                            'disposition'
                                    ]);

            $allWastes = DataTables::of($wastes)
                ->addColumn('choose', function($waste){
                    $checkbox = '<div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="wastes-selected[]" 
                                    data-status-disposition="'.$waste->stat_disposition.'" 
                                    class="custom-control-input" id="checkbox-'.$waste->id.'" value="'.$waste->id.'">
                                    <label for="checkbox-'.$waste->id.'" class="custom-control-label checkbox-waste-label">&nbsp;</label>
                                </div>';
                    return $checkbox;
                })
                ->addColumn('waste.classes_wastes', function($waste){
                    return $waste->waste->classesWastes->first()->symbol;
                })



                ->editColumn('disposition.code_dff', function($waste){
                    return $waste->disposition != null ? $waste->disposition->code_dff : '- -';
                })
                ->editColumn('disposition.weigth', function($waste){
                    return $waste->disposition != null ? $waste->disposition->weigth : '- -';
                })
                ->editColumn('disposition.weigth_diff', function($waste){
                    return $waste->disposition != null ? $waste->disposition->weigth_diff : '- -';
                })
                ->editColumn('disposition.disposition_place', function($waste){
                    return $waste->disposition != null ? $waste->disposition->disposition_place : '- -';
                })
                ->editColumn('disposition.code_invoice', function($waste){
                    return $waste->disposition != null ? $waste->disposition->code_invoice : '- -';
                })
                ->editColumn('disposition.code_certification', function($waste){
                    return $waste->disposition != null ? $waste->disposition->code_certification : '- -';
                })
                ->editColumn('disposition.plate', function($waste){
                    return $waste->disposition != null ? $waste->disposition->plate : '- -';
                })
                ->editColumn('disposition.managment_report', function($waste){
                    return $waste->disposition != null ? $waste->disposition->managment_report : '- -';
                })
                ->editColumn('disposition.observations', function($waste){
                    return $waste->disposition != null ? $waste->disposition->observations : '- -';
                })
                ->editColumn('disposition.date_arrival', function($waste){
                    return $waste->disposition != null ? $waste->disposition->date_arrival : '- -';
                })
                ->editColumn('disposition.date_dff', function($waste){
                    return $waste->disposition != null ? $waste->disposition->date_dff : '- -';
                })

                ->editColumn('stat_disposition', function($waste){
                    $status = '<span class="info-guide-pending">
                                    Pendiente
                                </span>';
                    if($waste->stat_disposition == 1)
                    {
                        $status = '<span class="info-guide-checked">
                                        Gestionado
                                    </span>';
                    }
                    return $status;
                })
                ->rawColumns(['choose','stat_disposition'])
                ->make(true);

            return $allWastes;
        }

        return view('principal.viewManager.dispositions.index');
    }

    public function getWastesDetail(Request $request)
    {
        $wastes = GuideWaste::whereIn('id', $request['values'])
                            ->with(['waste.classesWastes',
                                    'package',
                                    'packingGuide',
                                    'departure'
                            ])->get();

        return response()->json([
            "wastes" => $wastes
        ]);
    }

    public function update(Request $request)
    {
        $disposition = Disposition::create([
            "code_dff" => $request['n-ddff-guide'],
            "date_arrival" => $request['date-arrival'],
            "date_dff" => $request['date-ddff'],
            "weigth" => $request['ddff-weight'],
            "weigth_diff" => $request['weight-diff'],
            "disposition_place" => $request['disposition-place'],
            "code_invoice" => $request['n-invoice'],
            "code_certification" => $request['n-certification'],
            "plate" => $request['plate'],
            "managment_report" => $request['report'],
            "observations" => $request['observation'],
        ]);

        $wastes = GuideWaste::whereIn('id', $request['wastes-disposition-ids'])->get();

        foreach($wastes as $waste)
        {
            $waste->update([
                "stat_disposition" => 1,
                "id_disposition" => $disposition->id
            ]);
        }

        return response()->json([
            "success" => true
        ]);
    }
}
