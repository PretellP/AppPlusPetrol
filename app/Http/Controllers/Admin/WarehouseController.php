<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Warehouse, 
    Company,
    Front,
    Location,
    Lot,
    ProjectArea,
    Stage,
};
use DataTables;
use Auth;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            if($request['table'] == 'warehouse'){
                    $warehouses = Warehouse::query()->with(['company',
                                                            'front',
                                                            'location',
                                                            'lot',
                                                            'projectArea',
                                                            'stage'
                                                    ]);

                    $allWarehouses = DataTables::of($warehouses)
                                    ->addColumn('action', function($warehouse){
                                        $btn = '<button data-toggle="modal" data-id="'.
                                                $warehouse->id.'" data-url="'.route('warehouses.update', $warehouse).'" 
                                                data-send="'.route('warehouses.edit', $warehouse).'"
                                                data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                                                editWarehouse"><i class="fa-solid fa-pen-to-square"></i></button>';
                                        $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                                                $warehouse->id.'" data-original-title="delete"
                                                data-url="'.route('warehouses.delete', $warehouse).'" class="ms-3 edit btn btn-danger btn-sm
                                                deleteWarehouse"><i class="fa-solid fa-trash-can"></i></a>';
                                        return $btn;
                                    })
                                    ->rawColumns(['action'])
                                    ->make(true);
                                    return $allWarehouses;
            }

            elseif($request['table'] == 'lot'){
                $allLots = DataTables::of(Lot::query())
                ->addColumn('action', function($lot){
                    $btn = '<button data-toggle="modal" data-target="#EditLotModal" data-id="'.
                            $lot->id.'" data-url="'.route('lots.update', $lot).'" 
                            data-send="'.route('lots.edit', $lot).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editLot"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $lot->id.'" data-original-title="delete"
                            data-url="'.route('lots.delete', $lot).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteLot"><i class="fa-solid fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allLots;
            }
            elseif($request['table'] == 'stage')
            {
                $allStages = DataTables::of(Stage::query())
                ->addColumn('action', function($stage){
                    $btn = '<button data-toggle="modal" data-target="#EditStageModal" data-id="'.
                            $stage->id.'" data-url="'.route('stages.update', $stage).'" 
                            data-send="'.route('stages.edit', $stage).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editStage"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $stage->id.'" data-original-title="delete"
                            data-url="'.route('stages.delete', $stage).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteStage"><i class="fa-solid fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allStages;
            }
            elseif($request['table'] == 'location')
            {
                $allLocations = DataTables::of(Location::query())
                ->addColumn('action', function($location){
                    $btn = '<button data-toggle="modal" data-target="#EditLocationModal" data-id="'.
                            $location->id.'" data-url="'.route('locations.update', $location).'" 
                            data-send="'.route('locations.edit', $location).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editLocation"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $location->id.'" data-original-title="delete"
                            data-url="'.route('locations.delete', $location).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteLocation"><i class="fa-solid fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allLocations;
            }
            elseif($request['table'] == 'project')
            {
                $allProjects = DataTables::of(ProjectArea::query())
                ->addColumn('action', function($project){
                    $btn = '<button data-toggle="modal" data-target="#EditProjectModal" data-id="'.
                            $project->id.'" data-url="'.route('projects.update', $project).'" 
                            data-send="'.route('projects.edit', $project).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editProject"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $project->id.'" data-original-title="delete"
                            data-url="'.route('projects.delete', $project).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteProject"><i class="fa-solid fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allProjects;
            }
            elseif($request['table'] == 'company')
            {
                $allCompanies = DataTables::of(Company::query())
                ->addColumn('action', function($company){
                    $btn = '<button data-toggle="modal" data-target="#EditCompanyModal" data-id="'.
                            $company->id.'" data-url="'.route('companies.update', $company).'" 
                            data-send="'.route('companies.edit', $company).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editCompany"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $company->id.'" data-original-title="delete"
                            data-url="'.route('companies.delete', $company).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteCompany"><i class="fa-solid fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allCompanies;
            }
            elseif($request['table'] == 'front')
            {
                $allFronts = DataTables::of(Front::query())
                ->addColumn('action', function($front){
                    $btn = '<button data-toggle="modal" data-target="#EditFrontModal" data-id="'.
                            $front->id.'" data-url="'.route('fronts.update', $front).'" 
                            data-send="'.route('fronts.edit', $front).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editFront"><i class="fa-solid fa-pen-to-square"></i></button>';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                            $front->id.'" data-original-title="delete"
                            data-url="'.route('fronts.delete', $front).'" class="ms-3 edit btn btn-danger btn-sm
                            deleteFront"><i class="fa-solid fa-trash-can"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $allFronts;
            }
        }

        return view('principal.viewAdmin.warehouses.index');
    }

    /* ---------- WAREHOUSE ---------*/

    public function create(Request $request)
    {
        $lots = Lot::all();
        $stages = Stage::all();
        $locations = Location::all();
        $projects = ProjectArea::all();
        $companies = Company::all();
        $fronts = Front::all();

        return response()->json([
            'lots' => $lots,
            'stages' => $stages,
            'locations' => $locations,
            'projects' => $projects,
            'companies' => $companies,
            'fronts' => $fronts
        ]);
    }

    public function store(Request $request)
    {
        $lot = $request['lot_id'];
        $stage = $request['stage_id'];
        $location = $request['location_id'];
        $project = $request['project_id'];
        $company = $request['company_id'];
        $front = $request['front_id'];

        Warehouse::create([
            'id_lot' => $lot,
            'id_stage' => $stage,
            'id_location' => $location,
            'id_project_area' => $project,
            'id_company' => $company,
            'id_front' => $front,
        ]);

        return response()->json([
            "success" => "store successfully"
        ]);
    }


    public function edit(Warehouse $warehouse)
    {
        $lots = Lot::all();
        $stages = Stage::all();
        $locations = Location::all();
        $projects = ProjectArea::all();
        $companies = Company::all();
        $fronts = Front::all();

        $selecLot = $warehouse->id_lot;
        $selectStage = $warehouse->id_stage;
        $selectLocation = $warehouse->id_location;
        $selectProject = $warehouse->id_project_area;
        $selectCompany = $warehouse->id_company;
        $selectFront = $warehouse->id_front;

        return response()->json([
            "lots" => $lots,
            "stages" => $stages,
            "locations" => $locations,
            "projects" => $projects,
            "companies" => $companies,
            "fronts" => $fronts,
            "selecLot" => $selecLot,
            "selectStage" => $selectStage,
            "selectLocation" => $selectLocation,
            "selectProject" => $selectProject,
            "selectCompany" => $selectCompany,
            "selectFront" => $selectFront
        ]);
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $warehouse->update([
            'id_lot' => $request['lot_id'],
            'id_stage' => $request['stage_id'],
            'id_location' => $request['location_id'],
            'id_project_area' => $request['project_id'],
            'id_company' => $request['company_id'],
            'id_front' => $request['front_id'],
        ]);

        return response()->json([
            "success" => "updated successfully"
        ]);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return response()->json([
            "success" => true
        ]);
    }

    /* ----------- LOTS ------------*/

    public function lotStore(Request $request)
    {
        Lot::create([
            'name' => $request['elementName']
        ]);

        return response()->json([
            'success' => 'store successfully'
        ]);
    }

    public function lotEdit(Lot $lot)
    {
        return response()->json([
            'name' => $lot->name
        ]);
    }

    public function lotUpdate(Request $request, Lot $lot)
    {
        $lot->update([
            'name' => $request['elementName']
        ]);
        return response()->json([
            'success' => 'lot updated successfully'
        ]);
    }

    public function lotDestroy(Lot $lot)
    {
        $status = $lot->warehouses->count() == 0 ? true : false;

        if($status)
        {
            $lot->delete();
        }
        if($status == false)
        {
            $status = 'invalid';
        }  

        return response()->json([
            'success' => $status
        ]);
    }


    /* ----- STAGES ----------*/

    public function stageStore(Request $request)
    {
        Stage::create([
            'name' => $request['elementName']
        ]);

        return response()->json([
            'success' => 'store successfully'
        ]);
    }

    public function stageEdit(Stage $stage)
    {
        return response()->json([
            'name' => $stage->name
        ]);
    }

    public function stageUpdate(Request $request, Stage $stage)
    {
        $stage->update([
            'name' => $request['elementName']
        ]);
        return response()->json([
            'success' => 'Updated successfully'
        ]);
    }

    public function stageDestroy(Stage $stage)
    {
        $status = $stage->warehouses->count() == 0 ? true : false;
        if($status == true)
        {
            $stage->delete();
        }
        if($status == false)
        {
            $status = 'invalid';
        }  

        return response()->json([
            'success' => $status
        ]);
    }

    /* --------- LOCATIONS ---------*/

    public function locationStore(Request $request)
    {
        Location::create([
            'name' => $request['elementName']
        ]);

        return response()->json([
            'success' => 'store successfully'
        ]);
    }

    public function locationEdit(Location $location)
    {
        return response()->json([
            'name' => $location->name
        ]);
    }

    public function locationUpdate(Request $request, Location $location)
    {
        $location->update([
            'name' => $request['elementName']
        ]);
        return response()->json([
            'success' => 'Updated successfully'
        ]);
    }

    public function locationDestroy(Location $location)
    {
        $status = $location->warehouses->count() == 0 ? true : false;
        if($status == true)
        {
            $location->delete();
        }
        if($status == false)
        {
            $status = 'invalid';
        }  

        return response()->json([
            'success' => $status
        ]);
    }

    /* --------- PROJECTS --------*/

    public function projectStore(Request $request)
    {
        ProjectArea::create([
            'name' => $request['elementName']
        ]);

        return response()->json([
            'success' => 'store successfully'
        ]);
    }

    public function projectEdit(ProjectArea $project)
    {
        return response()->json([
            'name' => $project->name
        ]);
    }

    public function projectUpdate(Request $request, ProjectArea $project)
    {
        $project->update([
            'name' => $request['elementName']
        ]);
        return response()->json([
            'success' => 'Updated successfully'
        ]);
    }

    public function projectDestroy(ProjectArea $project)
    {
        $status = $project->warehouses->count() == 0 ? true : false;
        if($status == true)
        {
            $project->delete();
        }
        if($status == false)
        {
            $status = 'invalid';
        }  

        return response()->json([
            'success' => $status
        ]);
    }

    /* --------- COMPANY --------*/

    public function companyStore(Request $request)
    {
        Company::create([
            'name' => $request['elementName'],
            'ruc' => $request['ruc']
        ]);

        return response()->json([
            'success' => 'store successfully'
        ]);
    }

    public function companyEdit(Company $company)
    {
        return response()->json([
            'name' => $company->name,
            'ruc' => $company->ruc
        ]);
    }

    public function companyUpdate(Request $request, Company $company)
    {
        $company->update([
            'name' => $request['elementName'],
            'ruc' => $request['ruc']
        ]);
        return response()->json([
            'success' => 'Updated successfully'
        ]);
    }

    public function companyDestroy(Company $company)
    {
        $status = $company->warehouses->count() == 0 ? true : false;
        if($status == true)
        {
            $company->delete();
        }
        if($status == false)
        {
            $status = 'invalid';
        }  

        return response()->json([
            'success' => $status
        ]);
    }

     /* --------- FRONT --------*/

     public function frontStore(Request $request)
     {
        Front::create([
            'name' => $request['elementName']
        ]);

        return response()->json([
            'success' => 'store successfully'
        ]);
    }

    public function frontEdit(Front $front)
    {
        return response()->json([
            'name' => $front->name
        ]);
    }

    public function frontUpdate(Request $request, Front $front)
    {
        $front->update([
            'name' => $request['elementName']
        ]);
        return response()->json([
            'success' => 'Updated successfully'
        ]);
    }

    public function frontDestroy(Front $front)
    {
        $status = $front->warehouses->count() == 0 ? true : false;
        if($status == true)
        {
            $front->delete();
        }
        if($status == false)
        {
            $status = 'invalid';
        }  

        return response()->json([
            'success' => $status
        ]);
    }
}
