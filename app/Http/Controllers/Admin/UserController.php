<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Role, Company};
use DataTables;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        $companies = Company::all();

        if($request->ajax())
        {
            $allUsers = DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('profile', function($user){
                    return $user->role->name;
                })
                ->addColumn('company', function($user){
                    $company = '';
                    if($user->company != null){
                        $company = $user->company->name;
                    }
                    return $company;
                })
                ->addColumn('status-btn', function($user){
                    $status = $user->status == 1 ? 'Activo': 'Inactivo';
                    $statusBtn = '<span class="'.getUserStatusClass($user).'">'.$status.'</span>';
                    return $statusBtn;
                })
                ->addColumn('action', function($user){
                    $btn = '<button data-toggle="modal" data-id="'.
                            $user->id.'" data-url="'.route('users.update', $user).'" 
                            data-send="'.route('users.edit', $user).'"
                            data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                            editUser"><i class="fa-solid fa-pen-to-square"></i></button>';
                    if(Auth::user()->id != $user->id)
                    {
                        $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                        $user->id.'" data-original-title="delete"
                        data-url="'.route('users.delete', $user).'" class="ms-3 edit btn btn-danger btn-sm
                        deleteUser"><i class="fa-solid fa-trash-can"></i></a>';
                    }
                    return $btn;
                })
                ->rawColumns(['status-btn', 'action'])
                ->make(true);
            return $allUsers;
        }

        return view('principal.viewAdmin.users.index', [
            'users' => $users,
            'roles' => $roles,
            'companies' => $companies
        ]);
    }


    public function getApprovings(Request $request)
    {
        if($request['type'] == 'approving')
        {
            $status = 'invalid';
            $role = Role::where('id', $request['id'])->first()->name;
            $approvings = null;

            if($role == 'SOLICITANTE'){
                $status = 'valid';

                if($request['company_id'] != '')
                {
                    $approvings = User::whereHas('role', function($query){
                                    $query->where('name', 'APROBANTE');
                                })
                                ->where('id_company', $request['company_id'])->get();
                }
            }
           
            return response()->json([
                'valid' => $status,
                'approvings' => $approvings
            ]);
        }
        elseif($request['type'] == 'company')
        {
            $approvings = User::whereHas('role', function($query){
                                    $query->where('name', 'APROBANTE');
                                })
                                ->where('id_company', $request['id'])->get();

            return response()->json([
                "approvings" => $approvings
            ]);
        }
   
    }


    public function store(Request $request)
    {
        $path = 'img/signatures/';
        $file = $request->file('userImageSignatureRegister');
        $uuid = $file->hashName();
        $storeUrl = $path.$uuid;
        $status = $request['user-status-checkbox'] == 'on' ? 1 : 0;
        
        Storage::putFileAs($path, $file, $uuid);

        $user = User::create(
                    [
                        "id_role" => $request['id_role'],
                        "id_company" => $request['id_user_company'],
                        'user_name' => $request['username'],
                        'password' => Hash::make($request['password']),
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'phone' => $request['phone'],
                        'comment' => $request['userComment'],
                        'url_signature' => $storeUrl,
                        'status' => $status
                    ]
                );


        if($request->has('id_approvings'))
        {
            $user->approvings()->sync($request['id_approvings']);
        }
        
        return response()->json([
            'success' => 'user added successfully',
        ]);
    }


    public function edit(User $user)
    {      
        if($user->url_signature == '' || $user->url_signature == null)
        {
            $url_signature = '';
        }else{
            $url_signature = asset('storage/'.$user->url_signature);
        }

        $validApplicant = false;
        $selectedApprovings = null;
        $approvings = null;
        $role = $user->role->name;
        if($role == 'SOLICITANTE')
        {
            $validApplicant = true;
            $selectedApprovings = $user->approvings()->get()->pluck('id')->toArray();
            $approvings = User::whereHas('role', function($query){
                                        $query->where('name', 'APROBANTE');
                                })
                                ->where('id_company', $user->id_company)
                                ->get();
        }   

        $last_login = $user->last_login_at == null ? '- -' : getDiffForHumansFromTimestamp($user->last_login_at);

        $companyName = $user->company == null ? null : $user->company->name; 

        return response()->json([
            "username" => $user->user_name,
            "name" => $user->name,
            "email" => $user->email,
            "phone" => $user->phone,
            "comment" => $user->comment,
            "url_signature" => $url_signature,
            "status" => $user->status,
            "last_login" => $last_login,
            "profile" => $user->role->name,
            "company" => $companyName,
            "validApplicant" => $validApplicant,
            "selectedApprovings" => $selectedApprovings,
            'approvings' => $approvings
        ]);
    }

    public function update(Request $request, User $user)
    {
        $status = $request['user-status-checkbox'] == 'on' ? 1 : 0;

        if($request->hasFile('userImageSignatureEdit'))
        {
            $path = 'img/signatures/';
            $file_path = $user->url_signature;
            if($user->url_signature != null && Storage::exists($file_path))
            {
                Storage::delete($file_path);
            }
            $file = $request->file('userImageSignatureEdit');
            $uuid = $file->hashName();
            $store_url = $path.$uuid;

            Storage::putFileAs($path, $file, $uuid);
            $url_signature = $store_url;
        }else{
           $url_signature = $user->url_signature;
        }

        $password = $request['password'] == '' ? $user->password : Hash::make($request['password']);

        $user->update([
            'user_name' => $request['username'],
            'password' => $password,
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'comment' => $request['userComment'],
            'url_signature' => $url_signature,
            'status' => $status
        ]);

        $role = $user->role->name;

        if($role == 'SOLICITANTE')
        {
            if($request->has('id_approvings'))
            {
                $user->approvings()->sync($request['id_approvings']);
            }
        }

        return response()->json([
            'success' => 'user updated successfully' 
        ]);
    }


    public function destroy(User $user)
    {
        $signature_path = $user->url_signature;

        if($user->approvings->isNotEmpty())
        {
            $user->approvings()->detach();
        }

        $user->delete();
        Storage::delete($signature_path);

        return response()->json([
            'success' => true
        ]);
    }
}
