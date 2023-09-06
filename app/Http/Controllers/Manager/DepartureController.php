<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{IntermentGuide, PackingGuide, GuideWaste, Departure};

class DepartureController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            
            $wastes = GuideWaste::whereHas('guide', function($query){
                                    $query->where('stat_approved', 1)
                                            ->where('stat_recieved', 1)
                                            ->where('stat_verified', 1);
                                    })
                                    ->where('stat_departure', 1)
                                    ->with(['waste.classesWastes',
                                            'guide',
                                            'guide.warehouse.company',
                                            'package',
                                            'packingGuide',
                                            'departure'
                                    ]);

            $allWastes = DataTables::of($wastes)
                        ->addColumn('choose', function($waste){
                            $checkbox = '<div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="wastes-selected[]" 
                                             data-status-arrival="'.$waste->stat_arrival.'" 
                                             data-status-departure="'.$waste->stat_transport_departure.'"
                                             class="custom-control-input" id="checkbox-'.$waste->id.'" value="'.$waste->id.'">
                                            <label for="checkbox-'.$waste->id.'" class="custom-control-label checkbox-waste-label">&nbsp;</label>
                                        </div>';
                            return $checkbox;
                        })
                        ->addColumn('waste.classes_wastes', function($waste){
                            return $waste->waste->classesWastes->first()->symbol;
                        })
                        ->editColumn('departure.code_green_care', function($waste){
                            return $waste->departure != null ? $waste->departure->code_green_care : '- -';
                        })
                        ->editColumn('departure.destination', function($waste){
                            return $waste->departure != null ? $waste->departure->destination : '- -';
                        })
                        ->editColumn('departure.plate', function($waste){
                            return $waste->departure != null ? $waste->departure->plate : '- -';
                        })
                        ->editColumn('departure.weigth', function($waste){
                            return $waste->departure != null ? $waste->departure->weigth : '- -';
                        })
                        ->editColumn('departure.weigth_diff', function($waste){
                            return $waste->departure != null ? $waste->departure->weigth_diff : '- -';
                        })
                        ->editColumn('departure.date_departure', function($waste){
                            return $waste->departure != null ? $waste->departure->date_departure : '- -';
                        })
                        ->editColumn('stat_arrival', function($waste){
                            $status = '<span class="info-guide-pending">
                                            Pendiente
                                        </span>';
                            if($waste->stat_arrival == 1)
                            {
                                $status = '<span class="info-guide-checked">
                                                Gestionado
                                            </span>';
                            }
                            return $status;
                        })
                        ->editColumn('stat_transport_departure', function($waste){
                            $status = '<span class="info-guide-pending">
                                            Pendiente
                                        </span>';
                            if($waste->stat_transport_departure == 1)
                            {
                                $status = '<span class="info-guide-checked">
                                                Gestionado
                                            </span>';
                            }
                            return $status;
                        })
                        ->rawColumns(['choose','stat_arrival','stat_transport_departure'])
                        ->make(true);
        
            return $allWastes;
        }

        return view('principal.viewManager.departures.index');
    }

    public function getWastesDetail(Request $request)
    {
        $wastes = GuideWaste::whereIn('id', $request['values'])
                            ->with(['waste.classesWastes',
                                    'guide.warehouse.company',
                                    'package',
                                    'packingGuide'
                            ])->get();

        return response()->json([
            "wastes" => $wastes
        ]);
    }

    public function updateWastesArrival(Request $request)
    {
        $wastes = GuideWaste::whereIn('id', $request['wastes-arrival-ids'])->get();

        foreach($wastes as $waste)
        {
            $waste->update([
                "stat_arrival" => 1,
                "date_arrival" => $request['date-arrival'],
                "date_retirement" => $request['date-retreat'],
                "gc_code" => $request['n-guide-gc']
            ]);
        }

        return response()->json([
            "success" => true
        ]);
    }

    public function updateWastesDeparture(Request $request)
    {   
        $departure = Departure::create([
            "code_green_care" => $request['n-green-care-guide'],
            "date_departure" => $request['date-departure'],
            "destination" => $request['destination'],
            "plate" => $request['plate'],
            "weigth" => $request['retrieved-weight'],
            "weigth_diff" => $request['weight-diff']
        ]);

        $wastes = GuideWaste::whereIn('id', $request['wastes-departure-ids'])->get();

        foreach($wastes as $waste)
        {
            $waste->update([
                "stat_transport_departure" => 1,
                "id_departure" => $departure->id
            ]);
        }

        return response()->json([
            "success" => true
        ]);
    }
}
