<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Role, Company, OwnerCompany};
use DataTables;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $allUsers = DataTables::of(User::with(['role', 'company', 'ownerCompany']))
                ->addColumn('company', function($user){
                    $company = '- -';

                    if($user->company != null){
                        $company = $user->company->name;
                    }elseif($user->ownerCompany != null){
                        $company = $user->ownerCompany->name;
                    }
                    return $company;
                })
                ->editColumn('status', function($user){
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
                ->rawColumns(['status', 'action'])
                ->make(true);
            return $allUsers;
        }
        else
        {
            $roles = Role::all();
        }

        return view('principal.viewAdmin.users.index', [
            'roles' => $roles,
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

            $companies = in_array($role, ['SOLICITANTE', 'APROBANTE']) ? Company::all() : OwnerCompany::all();

            $validManager = $role == 'GESTOR' ? true : false;

            return response()->json([
                'valid' => $status,
                'approvings' => $approvings,
                'companies' => $companies,
                'validManager' => $validManager
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
        $storeUrl = '';
        
        if($request->hasFile('userImageSignatureRegister'))
        {
            $path = 'img/signatures/';
            $file = $request->file('userImageSignatureRegister');
            $uuid = $file->hashName();
            $storeUrl = $path.$uuid;
            Storage::putFileAs($path, $file, $uuid);
        }

        $status = $request['user-status-checkbox'] == 'on' ? 1 : 0;

        if($request['id_role'] == 1){
            $status = 1;
        }
       
        $company = in_array($request['id_role'], [2, 3]) ? $request['id_user_company'] : null;
        $ownerCompany = in_array($request['id_role'], [2, 3]) ? null : $request['id_user_company'];
        
        $user = User::create(
                    [
                        "id_role" => $request['id_role'],
                        "id_company" => $company,
                        "id_owner_company" => $ownerCompany,
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
        $user = User::where('id', $user->id)->with(['role', 'approvings', 'company', 'ownerCompany'])->first();  

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
            $selectedApprovings = $user->approvings->pluck('id')->toArray();
            $approvings = User::whereHas('role', function($query){
                                        $query->where('name', 'APROBANTE');
                                })
                                ->where('id_company', $user->id_company)
                                ->get();
        }

        $isAdmin = $role == 'ADMINISTRADOR' ? true : false;

        $last_login = $user->last_login_at == null ? '- -' : getDiffForHumansFromTimestamp($user->last_login_at);

        $companyName = null;

        if($user->company != null)
        {
            $companyName = $user->company->name;
        }elseif($user->ownerCompany != null){
            $companyName = $user->ownerCompany->name;
        }

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
            'approvings' => $approvings,
            'is_admin' => $isAdmin
        ]);
    }

    public function update(Request $request, User $user)
    {
        $status = $request['user-status-checkbox'] == 'on' ? 1 : 0;
        $role = $user->role->name;

        if($role == 'ADMINISTRADOR'){
            $status = 1;
        }

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
