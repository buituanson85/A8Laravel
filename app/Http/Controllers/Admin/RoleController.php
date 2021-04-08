<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        $permissions = Permission::all();
        return View('admin.administration.roles.index')->with(array('roles'=>$roles,'permissions'=>$permissions));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.administration.roles.create', compact('permissions'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);

        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->with('success', 'Roles Created Successfully!');
    }

    public function edit($id)
    {
        $role = Role::find($id);

        return view('admin.administration.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);
        $role = Role::find($id);
        $role->update([
            'name' => $request->name
        ]);
        $request->session()->flash('success', 'Roles Update Successfully!');
        return redirect(route('roles.index'));
    }

    public function destroy(Request $request,$id)
    {
        Role::find($id)->delete();
        $request->session()->flash('success', 'Delete roles success!');
        return redirect(route('roles.index'));
    }
}
