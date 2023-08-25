<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\{IntermentGuide, PackingGuide};

class PackingGuideController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $guides = IntermentGuide::whereHas('checker', function($query) use($user){
                                    $query->where('id_company', $user->id_company);
                                })
                                ->where('stat_approved', 1)
                                ->where('stat_recieved', 1)
                                ->where('stat_verified', 1)
                                ->with(['guideWastes', 'warehouse.company'])
                                ->get();

        $packingGuides = PackingGuide::with('guides.guideWastes')->get();

        if($request->ajax())
        {    
            if($request['table'] == 'intGuide')
            {
                $allGuides = DataTables::of($guides)
                ->addColumn('choose', function($guide){
                    $checkbox = '<div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="guides-selected[]"  data-status="'.$guide->stat_stock.'" class="custom-control-input" id="checkbox-'.$guide->id.'" value="'.$guide->id.'">
                                    <label for="checkbox-'.$guide->id.'" class="custom-control-label checkbox-guide-label">&nbsp;</label>
                                </div>';
                    return $checkbox;
                })
                ->addColumn('code', function($guide){
                    $link = '<a href="" class="btn-show-guide" data-url="'.route('loadGuideDetail.manager', $guide).'">'.$guide->code.'</a>';
                    return $link;
                })
                ->addColumn('date', function($guide){
                    return $guide->date_verified;
                })
                ->addColumn('company', function($guide){
                    return $guide->warehouse->company->name;
                })
                ->addColumn('weight', function($guide){
                    $weight = $guide->guideWastes->sum(function($waste){
                                return $waste->actual_weight;
                            });
                    return $weight;
                })
                ->addColumn('packages', function($guide){
                    $packages = $guide->guideWastes->sum(function($waste){
                        return $waste->package_quantity;
                    });
                    return $packages;
                })
                ->addColumn('status', function($guide){
                    $status = '<span class="info-guide-pending">
                                    Pendiente
                                </span>';
                    if($guide->stat_stock == 1)
                    {
                        $status = '<span class="info-guide-checked">
                                        Gestionado
                                    </span>';
                    }
                    return $status;
                })
                ->rawColumns(['choose','code','status'])
                ->make(true);

                return $allGuides;
            }
            elseif($request['table'] == 'packing')
            {
                $allPackingGuides = DataTables::of($packingGuides)
                ->addColumn('choose', function($guide){
                    $checkbox = '<div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="packingGuides-selected[]"  data-status="'.$guide->stat_departure.'" class="custom-control-input" id="packingCheckbox-'.$guide->id.'" value="'.$guide->id.'">
                                    <label for="packingCheckbox-'.$guide->id.'" class="custom-control-label checkbox-packingGuide-label">&nbsp;</label>
                                </div>';
                    return $checkbox;
                })
                ->addColumn('code', function($guide){
                    $link = '<a href="" class="btn-show-packingGuide" data-url="'.route('loadPackingGuideDetail.manager', $guide).'">'.$guide->cod_guide.'</a>';
                    return $link;
                })
                ->addColumn('date', function($guide){
                    return $guide->date_guides_departure;
                })
                ->addColumn('weight', function($guide){
                    $weight = $guide->guides->sum(function($intGuide){
                                                return $intGuide->guideWastes->sum(function($waste){
                                                    return $waste->actual_weight;
                                                });
                                            });
                    return $weight;
                })
                ->addColumn('packages', function($guide){
                    $packages = $guide->guides->sum(function($intGuide){
                                                return $intGuide->guideWastes->sum(function($waste){
                                                    return $waste->package_quantity;
                                                });
                                            });
                    return $packages;
                })
                ->addColumn('volum', function($guide){
                    return $guide->volum;
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
                ->rawColumns(['choose','code','status'])
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
            $guides = IntermentGuide::whereIn('id', $request['values'])
                                    ->with(['guideWastes', 'warehouse.company'])
                                    ->get();

            $weight = $guides->sum(function($guide){
                                return $guide->guideWastes->sum(function($waste){
                                return $waste->actual_weight;
                                });
            });

            $packages = $guides->sum(function($guide){
                                return $guide->guideWastes->sum(function($waste){
                                return $waste->package_quantity;
                                });
            });

            return response()->json([
                "guides" => $guides,
                "weight" => $weight,
                "packages" => $packages
            ]);
        }
        elseif($request['table'] == "departure")
        {
            $packingGuides = PackingGuide::whereIn('id', $request['values'])
                                        ->with('guides.guideWastes')
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

        $guides = IntermentGuide::whereIn('id', $request['guides-pg-ids'])->get();

        foreach($guides as $guide)
        {
            $guide->update([
                "stat_stock" => 1,
                "id_packing_guide" => $packingGuide->id
            ]);
        }   

        return response()->json([
            "success" => "store successfully"
        ]);
    }

    public function loadGuideDetail(Request $request, IntermentGuide $guide)
    {
        $guide = $guide->where('id', $guide->id)
                        ->with(['warehouse.company'])
                        ->with(['guideWastes' => fn($query) =>
                                $query->with(['waste.classesWastes', 'package'])
                        ])
                        ->first();

        $weight = $guide->guideWastes->sum(function($waste){
                        return $waste->actual_weight;
                    });

        $packages =  $guide->guideWastes->sum(function($waste){
                        return $waste->package_quantity;
                    });

        $comment = $guide->comment == null ? 'Sin obervaciones' : $guide->comment;

        return response()->json([
            "guide" => $guide,
            "weight" => $weight,
            "packages" => $packages,
            "comment" => $comment
        ]);
    }

    public function loadPackingGuideDetail(Request $request, PackingGuide $guide)
    {
        $guide = $guide->where('id', $guide->id)
                        ->with(['guides' => fn($query) => 
                            $query->with(['guideWastes.waste.classesWastes', 'warehouse.company'])
                        ])
                        ->first();

        $weight = $guide->guides->sum(function($intGuide){
                                    return $intGuide->guideWastes->sum(function($waste){
                                        return $waste->actual_weight;
                                    });
                                });

        $packages = $guide->guides->sum(function($intGuide){
                                    return $intGuide->guideWastes->sum(function($waste){
                                        return $waste->package_quantity;
                                    });
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
