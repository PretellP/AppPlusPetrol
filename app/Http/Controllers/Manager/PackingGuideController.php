<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{IntermentGuide, PackingGuide, GuideWaste};

class PackingGuideController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if($request->ajax())
        {     
            if($request['table'] == 'intGuide')
            {
                $wastes = GuideWaste::whereHas('guide', function($query){
                                        $query->where('stat_approved', 1)
                                            ->where('stat_recieved', 1)
                                            ->where('stat_verified', 1);
                                    })
                                    ->with(['waste.classesWastes',
                                            'guide',
                                            'guide.warehouse.company',
                                            'package'
                                    ]);

                // if($request->filled('from_date') && $request->filled('end_date')){
                //     $wastes = $wastes->whereHas('guide', function($query2) use($request){
                //             $query2->whereBetween('date_verified', [$request->from_date, $request->end_date]);
                //         });
                // }

                // if($request->filled('status')){
                //     if($request['status'] != 'all'){
                //         $wastes = $wastes->where('stat_stock', $request['status']);
                //     }
                // }

                $allWastes = DataTables::of($wastes)
                            ->addColumn('choose', function($waste){
                                $checkbox = '<div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="guides-selected[]"  data-status="'.$waste->stat_stock.'" class="custom-control-input" id="checkbox-'.$waste->id.'" value="'.$waste->id.'">
                                                <label for="checkbox-'.$waste->id.'" class="custom-control-label checkbox-guide-label">&nbsp;</label>
                                            </div>';
                                return $checkbox;
                            })
                            ->addColumn('waste.classes_wastes', function($waste){
                                return $waste->waste->classesWastes->first()->symbol;
                            })
                            ->editColumn('stat_stock', function($waste){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($waste->stat_stock == 1)
                                {
                                    $status = '<span class="info-guide-checked">
                                                    Gestionado
                                                </span>';
                                }
                                return $status;
                            })
                            ->editColumn('stat_departure', function($waste){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($waste->stat_departure == 1)
                                {
                                    $status = '<span class="info-guide-checked">
                                                    Gestionado
                                                </span>';
                                }
                                return $status;
                            })
                            ->rawColumns(['choose','stat_stock', 'stat_departure'])
                            ->make(true);

                return $allWastes;
            }
            elseif($request['table'] == 'packing')
            {
                $wastes = GuideWaste::whereHas('guide', function($query){
                                            $query->where('stat_approved', 1)
                                                ->where('stat_recieved', 1)
                                                ->where('stat_verified', 1);
                                        })
                                        ->where('stat_stock', 1)
                                        ->with(['waste.classesWastes',
                                                'guide.warehouse.company',
                                                'package',
                                                'packingGuide'
                                        ]);

                // if($request->filled('from_date') && $request->filled('end_date')){
                //     $wastes = $wastes->whereHas('packingGuide', function($query2) use($request){
                //             $query2->whereBetween('date_guides_departure', [$request->from_date, $request->end_date]);
                //         });
                // }

                // if($request->filled('status')){
                //     if($request['status'] != 'all'){
                //         $wastes = $wastes->where('stat_departure', $request['status']);
                //     }
                // }

                $allWastes = DataTables::of($wastes)
                            ->addColumn('choose', function($wastes){
                                $checkbox = '<div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="packingGuides-selected[]"  data-status="'.$wastes->stat_departure.'" class="custom-control-input" id="packingCheckbox-'.$wastes->id.'" value="'.$wastes->id.'">
                                                <label for="packingCheckbox-'.$wastes->id.'" class="custom-control-label checkbox-packingGuide-label">&nbsp;</label>
                                            </div>';
                                return $checkbox;
                            })
                            ->editColumn('packing_guide.cod_guide', function($waste){
                                $link = '<a href="" class="btn-show-packingGuide" data-url="'.route('loadPackingGuideDetail.manager', ["guide" => $waste->packingGuide] ).'">'.$waste->packingGuide->cod_guide.'</a>';
                                return $link;
                            })
                            ->addColumn('waste.classes_wastes', function($waste){
                                return $waste->waste->classesWastes->first()->symbol;
                            })
                            ->editColumn('stat_stock', function($waste){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($waste->stat_stock == 1)
                                {
                                    $status = '<span class="info-guide-checked">
                                                    Gestionado
                                                </span>';
                                }
                                return $status;
                            })
                            ->editColumn('stat_departure', function($waste){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($waste->stat_departure == 1)
                                {
                                    $status = '<span class="info-guide-checked">
                                                    Gestionado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('created_at', function($waste){
                                return $waste->packingGuide->created_at;
                            })
                            ->rawColumns(['choose','packing_guide.cod_guide', 'stat_stock', 'stat_departure'])
                            ->make(true);

                return $allWastes;
            }
            
        }

        return view('principal.viewManager.packingGuides.index');
    }

    public function loadGuidesSelected(Request $request)
    {
        if($request['table'] == 'packingGuide')
        {
            $wastes = GuideWaste::whereIn('id', $request['values'])
                                ->with(['waste.classesWastes',
                                        'guide',
                                        'guide.warehouse.company',
                                        'package'
                                ])->get();

            $weight = $wastes->sum(function($waste){
                                    return $waste->actual_weight;
                                });

            $packages = $wastes->sum(function($waste){
                                    return $waste->package_quantity;
                                });

            return response()->json([
                "wastes" => $wastes,
                "weight" => $weight,
                "packages" => $packages
            ]);
        }
        elseif($request['table'] == "departure")
        {
            $wastes = GuideWaste::whereIn('id', $request['values'])
                                        ->with(['packingGuide',
                                                'guide.warehouse.company',
                                                'package',
                                                'waste.classesWastes'
                                        ])
                                        ->get();

            return response()->json([
                "wastes" => $wastes
            ]);
        }

    }

    public function storePackageGuide(Request $request)
    {
        $packingGuide = PackingGuide::create([
            "cod_guide" => $request['code'],
            "date_guides_departure" => $request['date'],
            "volum" =>  $request['volume'],
        ]);

        $wastes = GuideWaste::whereIn('id', $request['guides-pg-ids'])->get();

        foreach($wastes as $waste)
        {
            $waste->update([
                "stat_stock" => 1,
                "id_packing_guide" => $packingGuide->id,
            ]);
        }   

        return response()->json([
            "success" => "store successfully"
        ]);
    }

    public function loadPackingGuideDetail(Request $request, PackingGuide $guide)
    {
        $guide = $guide->where('id', $guide->id)
                        ->with(['wastes.guide.warehouse.company',
                                'wastes.waste.classesWastes',
                                'wastes.package'
                        ])
                        ->first();

        $weight = $guide->wastes->sum(function($waste){
                                        return $waste->actual_weight;
                                    });

        $packages = $guide->wastes->sum(function($waste){
                                        return $waste->package_quantity;
                                    });

        return response()->json([
            "guide" => $guide,
            "weight" => $weight,
            "packages" => $packages
        ]);
    }

    public function updateDeparturePg(Request $request)
    {
        $wastes = GuideWaste::whereIn('id', $request['wastes-departure-selected'])->get();

        foreach($wastes as $waste){
            $waste->update([
                "stat_departure" => 1,
                "date_departure" => $request['date'],
                "shipping_type" => $request['transport-type'],
                "destination" => $request['destination'],
                "ppc_code" => $request['n-guideppc'],
                "manifest_code" => $request['n-manifest']
            ]);
        }

        return response()->json([
            "success" => "updated successfully"
        ]);
    }
}
