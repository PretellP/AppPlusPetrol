<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{WasteClass, WasteType};
use DataTables;
use Auth;

class WasteController extends Controller
{
    public function index(Request $request)
    {
        $wasteTypes = WasteType::all();

        if($request->ajax())
        {
            $wasteClasses = WasteClass::all();
            $allClasses = DataTables::of($wasteClasses)
                ->addColumn('types', function($class){
                    $types = $class->classesWastes;
                    $typesList = '<ul>';
                    foreach($types as $type){
                        $typesList.= '<li>'.$type->name.'</li>';
                    }
                    $typesList.='</ul>';

                    return $typesList;
                })
                ->addColumn('action', function($class){
                    $btn = '<button data-toggle="modal" data-id="'.
                            $class->id.'" data-url="'.route('wastes.update', $class).'" 
                            data-send="'.route('wastes.edit', $class).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editClass"><i class="fa-solid fa-pen-to-square"></i></button>';

                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $class->id.'" data-original-title="delete"
                            data-url="'.route('wastes.delete', $class).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteClass"><i class="fa-solid fa-trash-can"></i></a>';
                    
                    return $btn;
                })
                ->rawColumns(['types', 'action'])
                ->make(true);

            return $allClasses;
        }

        return view('principal.viewAdmin.wastes.index', [
            'wasteTypes' => $wasteTypes
        ]);
    }



    public function edit(WasteClass $waste)
    {   
        
    }

    public function update(Request $request, WasteClass $waste)
    {

    }

    public function destroy(WasteClass $waste)
    {

    }
}



