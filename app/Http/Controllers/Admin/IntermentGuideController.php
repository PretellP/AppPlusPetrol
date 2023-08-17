<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\{Warehouse, WasteClass, WasteType};

class IntermentGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = DB::select("SHOW TABLE STATUS LIKE 'internment_guides'");
        $next_id = $id[0]->Auto_increment;

        $guide_code = '';
        $id_str = strval($next_id);

        for($i=1; $i <= (4 - strlen($id_str)) ; $i++)
        {
            $guide_code.='0';
        }

        $warehouses = Warehouse::with('front')->get();
        $wasteClasses = WasteClass::all();

        $guide_code =Carbon::now()->format('Y').'-'.$guide_code.$id_str;

        return view('principal.viewApplicant.intermentGuides.index', [
            'guide_code' => $guide_code,
            'warehouses' => $warehouses,
            'wasteClasses' => $wasteClasses
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


    public function getDataClassTypes(Request $request)
    {
     
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
