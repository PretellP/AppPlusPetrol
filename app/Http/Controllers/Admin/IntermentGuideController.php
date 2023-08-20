<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use DB;
use Carbon\Carbon;
use Validator;
use App\Models\{Warehouse, WasteClass, WasteType, IntermentGuide};

class IntermentGuideController extends Controller
{
    
    public function index(Request $request)
    {
        $user = Auth::user();

        if($request->ajax())
        {
            $guidesApplicant = $user->applicantGuides;

            $allGuides = DataTables::of($guidesApplicant)
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
            ->addColumn('stat_approved', function($guide){
                $status = '<span class="info-guide-pending">
                                Pendiente
                            </span>';
                if($guide->stat_approved == 1){
                    $status = '<span class="info-guide-checked">
                                Aprobado
                            </span>';
                }elseif($guide->stat_rejected == 1){
                    $status = '<span class="info-guide-rejected">
                                    Rechazado
                                </span>';
                }
                return $status;
            })
            ->addColumn('stat_recieved', function($guide){
                $status = '<span class="info-guide-pending">
                                Pendiente
                            </span>';
                if($guide->stat_recieved == 1){
                    $status = '<span class="info-guide-checked">
                                Recibido
                            </span>';
                }elseif($guide->stat_rejected == 1){
                    $status = '<span class="info-guide-rejected">
                                    Rechazado
                                </span>';
                }
                return $status;
            })
            ->addColumn('stat_verified', function($guide){
                $status = '<span class="info-guide-pending">
                                Pendiente
                            </span>';
                if($guide->stat_verified == 1){
                    $status = '<span class="info-guide-checked">
                                Verificado
                            </span>';
                }elseif($guide->stat_rejected == 1){
                    $status = '<span class="info-guide-rejected">
                                    Rechazado
                                </span>';
                }
                return $status;
            })
            ->addColumn('action', function($guide){
                $btn = '<a href="'.route('guides.show', $guide).'"
                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                return $btn;
            })
            ->rawColumns(['stat_approved','stat_recieved','stat_verified','action'])
            ->make(true);
            return $allGuides;
        }

        return view('principal.viewApplicant.intermentGuides.index');
    }


    public function create()
    {
        $lastGuide =  IntermentGuide::latest()->first();

        $next_id = $lastGuide == null ? 1 : $lastGuide->id + 1;

        $user = Auth::user();

        $guide_code = '';
        $id_str = strval($next_id);

        for($i=1; $i <= (4 - strlen($id_str)) ; $i++)
        {
            $guide_code.='0';
        }

        $warehouses = Warehouse::with('front')->get();
        $wasteClasses = WasteClass::all();

        $guide_code = Carbon::now()->format('Y').'-'.$guide_code.$id_str;

        $approvings = $user->approvings;
 
        return view('principal.viewApplicant.intermentGuides.create', [
            'guide_code' => $guide_code,
            'warehouses' => $warehouses,
            'wasteClasses' => $wasteClasses,
            'approvings' => $approvings
        ]);
    }

    
    public function getDataWarehouse(Request $request)
    {
        if($request->ajax())
        {
            if($request['type'] == 'warehouse')
            {
                $warehouse = Warehouse::with(['lot', 'stage', 'location', 'projectArea', 'company', 'front'])
                ->where('id', $request['id'])->first();
    
                return response()->json([
                'lot' => $warehouse->lot->name,
                'stage' => $warehouse->stage->name,
                'location' => $warehouse->location->name,
                'proyect' => $warehouse->projectArea->name,
                'company' => $warehouse->company->name,
                'front' => $warehouse->front->name
                ]);
            }
            elseif($request['type'] == 'wasteClass')
            {
                $wasteClass = WasteClass::findOrFail($request['id']);

                $wasteTypes = $wasteClass->classesWastes;
        
                return response()->json([
                    "wasteTypes" => $wasteTypes
                ]);
            }
            elseif($request['type'] == 'wasteType')
            {
                $wasteTypes = WasteType::whereIn('id', $request['values'])->with('classesWastes')->get();

                return response()->json([
                    "wasteTypes" => $wasteTypes
                ]);
            }
        }
    }


    public function store(Request $request)
    {
        $success = false;
        $user = Auth::user();
        
        $lastGuide =  IntermentGuide::latest()->first();
        $next_id = $lastGuide == null ? 1 : $lastGuide->id + 1;


        $guide_code = '';

        $id_str = strval($next_id);

        for($i=1; $i <= (4 - strlen($id_str)) ; $i++)
        {
            $guide_code.='0';
        }
        
        $guide_code = Carbon::now()->format('Y').'-'.$guide_code.$id_str;

        $guide = IntermentGuide::create([
            "code" => $guide_code,
            "comment" => $request['guide-comment'],
            "stat_rejected" => 0,
            "stat_approved" => 0,
            "stat_recieved" => 0,
            "stat_verified" => 0,
            "id_warehouse" => $request['select-warehouse'],
            "id_applicant" => $user->id,
            "id_approvant" => $request['id_approvant-guide']
        ]);

        foreach($request['wasteTypesId'] as $id){
            $guide->wasteTypes()->attach($id, [
                "aprox_weight" => $request['aproxWeightType-'.$id],
                "package_quantity" => $request['packageQuantity-'.$id],
                "package_type" => $request['packageType-'.$id]
            ]);
        }

        return redirect()->route('guides.index');
    }


    public function show(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                                    $query->with(['front','company','location','lot','projectArea','stage'])
                                    ])
                                    ->with('approvant.userType')
                                    ->with('applicant.userType')
                                    ->with('reciever.userType')
                                    ->with('checker.userType')
                                    ->where('id', $guide->id)->first();


        $wasteTypes = $guide->wasteTypes()->with('classesWastes')->get();

        $totalWeight = $wasteTypes->sum(function($waste){
                            return $waste->pivot->actual_weight;
                        });

        $totalPackage = $wasteTypes->sum(function($waste){
                            return $waste->pivot->package_quantity;
                        });

        return view('principal.viewApplicant.intermentGuides.show', [
            "guide" => $guide,
            "wasteTypes" => $wasteTypes,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }

}
