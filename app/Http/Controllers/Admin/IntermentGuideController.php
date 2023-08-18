<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use Validator;
use App\Models\{Warehouse, WasteClass, WasteType, IntermentGuide};

class IntermentGuideController extends Controller
{
    
    public function index()
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
 
        return view('principal.viewApplicant.intermentGuides.index', [
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

        return response()->json(['success' => 'store successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
