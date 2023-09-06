<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Models\PackageType;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $packageTypes =PackageType::query();

            $allTypes = DataTables::of($packageTypes)
                    ->addColumn('action', function($type){
                        $btn = '<button data-id="'.
                                $type->id.'" data-url="'.route('packageType.update', $type).'" 
                                data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                                editType"><i class="fa-solid fa-pen-to-square"></i></button>';

                        $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                                $type->id.'" data-original-title="delete"
                                data-url="'.route('packageType.delete', $type).'" class="ms-3 edit btn btn-danger btn-sm
                                deleteType"><i class="fa-solid fa-trash-can"></i></a>';
                        
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            return $allTypes;
        }
    }


    public function store(Request $request)
    {
        PackageType::create([
            "name" => $request['packageTypeName']
        ]);

        return response()->json([
            "success" => 'store successfully'
        ]);
    }


    public function typeUpdate(Request $request, PackageType $type)
    {
        $type->update([
            "name" => $request['value']
        ]);

        return response()->json([
            "success" => "updated successfully"
        ]);
    }

    public function typeDestroy(PackageType $type)
    {
        $success = false;

        if(($type->guideWastes)->isEmpty())
        {
            $type->delete();
            $success = true;
        }else
        {
            $success = 'invalid';
        }

        return response()->json([
            'success' => $success
        ]);
    }

 




}
