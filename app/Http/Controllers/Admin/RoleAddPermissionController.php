<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class RoleAddPermissionController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('admin.administration.roles-permissions.index', compact('roles'));
    }

    public function show($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('admin.administration.roles-permissions.show', compact('role', 'permissions'));
    }

    public function store(Request $request)
    {
        $role_id = $request->id;

        $role = Role::find($role_id);
        $checkRole = Role::where('id',$role_id)->withCount('permissions')->get()->toArray();
        if($checkRole[0]['permissions_count']>0){
            $role->permissions()->detach();//delete all relationship in role_permission
        }
        $role->permissions()->attach($request->permissions);//add list permissions

        return redirect()->route('roles-permissions.index');
    }
}
