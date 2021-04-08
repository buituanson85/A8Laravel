<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::paginate(10);
        return view('admin.administration.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.administration.permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required'
        ]);

        Permission::create([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request ->icon
        ]);
        return redirect()->route('permissions.index')->with('success', 'Permission Created Successfully!');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.administration.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required'
        ]);

        if ($permission = Permission::findOrFail($id)){
            $permission->update([
                'name' => $request->name,
                'url' => $request->url,
                'icon' => $request ->icon
            ]);
        }

        return redirect()->route('permissions.index')->with('success', 'Permission Update Successfully!');
    }

    public function destroy(Request $request,$id)
    {
        Permission::find($id)->delete();
        $request->session()->flash('success', 'Delete Permission success!');
        return redirect(route('permissions.index'));
    }
}
