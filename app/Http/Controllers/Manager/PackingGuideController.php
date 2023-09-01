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

        // $wastes = GuideWaste::whereHas('guide', function($query){
        //     $query->where('stat_approved', 1)
        //         ->where('stat_recieved', 1)
        //         ->where('stat_verified', 1);
        // })
        // ->with(['waste.classesWastes',
        //         'guide',
        //         'guide.warehouse.company',
        //         'package'
        // ])->get();
    
        // dd($wastes);

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
                            ->addColumn('status', function($waste){
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
                            ->rawColumns(['choose','status'])
                            ->make(true);

                return $allWastes;
            }
            elseif($request['table'] == 'packing')
            {
                $packingGuides = PackingGuide::with('wastes');

                $allPackingGuides = DataTables::of($packingGuides)
                ->addColumn('choose', function($guide){
                    $checkbox = '<div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="packingGuides-selected[]"  data-status="'.$guide->stat_departure.'" class="custom-control-input" id="packingCheckbox-'.$guide->id.'" value="'.$guide->id.'">
                                    <label for="packingCheckbox-'.$guide->id.'" class="custom-control-label checkbox-packingGuide-label">&nbsp;</label>
                                </div>';
                    return $checkbox;
                })
                ->editColumn('cod_guide', function($guide){
                    $link = '<a href="" class="btn-show-packingGuide" data-url="'.route('loadPackingGuideDetail.manager', $guide).'">'.$guide->cod_guide.'</a>';
                    return $link;
                })
                ->addColumn('weight', function($guide){
                    $weight = $guide->wastes->sum(function($waste){
                                                    return $waste->actual_weight;
                                                });
                    return $weight;
                })
                ->addColumn('packages', function($guide){
                    $packages = $guide->wastes->sum(function($waste){
                                                    return $waste->package_quantity;
                                                });
                    return $packages;
                })
                ->addColumn('status', function($guide){
                    $status = '<span class="info-guide-pending">
                                    Pendiente
                                </span>';
                    if($guide->stat_departure == 1)
                    {
                        $status = '<span class="info-guide-checked">
                                        Gestionado
                                    </span>';
                    }
                    return $status;
                })
                ->rawColumns(['choose','cod_guide','status'])
                ->make(true);

                return $allPackingGuides;
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
            $packingGuides = PackingGuide::whereIn('id', $request['values'])
                                        ->with('wastes')
                                        ->get();

            return response()->json([
                "packingGuides" => $packingGuides
            ]);
        }

    }

    public function storePackageGuide(Request $request)
    {
        $packingGuide = PackingGuide::create([
            "cod_guide" => $request['code'],
            "date_guides_departure" => $request['date'],
            "volum" =>  $request['volume'],
            "stat_departure" => 0,
            "stat_arrival" => 0,
            "stat_transport_departure" => 0
        ]);

        $wastes = GuideWaste::whereIn('id', $request['guides-pg-ids'])->get();

        foreach($wastes as $waste)
        {
            $waste->update([
                "stat_stock" => 1,
                "id_packing_guide" => $packingGuide->id
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
        $packingGuides = PackingGuide::whereIn('id', $request['packingGuides-departure-selected'])->get();

        foreach($packingGuides as $guide){
            $guide->update([
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
