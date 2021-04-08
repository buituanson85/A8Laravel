<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $allRole = Role::all();
        if (isset($name)){
            $users = User::where('name', 'like','%'.$name.'%')->orWhere('email', 'LIKE', "%$name%")->with('roles')->paginate(5);
        }else{
            $users = User::with('roles')->paginate(5);
        }

//        $users = User::with('roles')->get();
        return view('admin.administration.users.index')->with(array('users'=>$users));

    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.administration.users.create', compact( 'roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:users',
            'password' => 'required|alpha_num|min:6',
            'role' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $request->session()->flash('success', 'Users Create Successfully!');
        return redirect()->route('users.index');
    }

//
    public function show($id)
    {
        $users = User::find($id);
        $users ->with('roles')->get();
        $roles = Role::with('users','permissions')->get();
        return view('admin.administration.users.show')->with(array('users'=>$users,'roles'=>$roles));

    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $user ->with('roles')->get();
        return view('admin.administration.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user_id = $request->id;

        $user = User::find($user_id);
        $checkUser = User::where('id',$user_id)->withCount('roles')->get()->toArray();
        if($checkUser[0]['roles_count']>0){
            $user->roles()->detach();//delete all relationship in role_permission
        }
        $user->roles()->attach($request->roles);//add list permissions
        $user ->with('roles')->get();
        return redirect()->route('users.index')->with('success', 'User Edit Successfully!');
    }

    public function destroy(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('success', 'Users Deleted Successfully!');
        return redirect(route('users.index'));
    }

//    /////////////////// User defined Method

    public function  profile(){
        return view('admin.administration.profile.index');
    }

    public function editProfile(Request $request){
        //dd($request->all());
        $user = auth()->user();
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|alpha_num',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if ($request ->photo != null){
            $images = $request->photo;
            $imageName = $images->getClientOriginalName();
            $imageName = time().".".$imageName;
            $image_resize = Image::make($images->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save(public_path('assets/uploads/users/'.$imageName));
            $request->photo->storeAs('products', $imageName);
            $user -> photo = $imageName;
        }
        $user->save();

        return redirect()->back()->with('success','Profile has been Updated Successfully!');
    }

    public function getPassword(){
        return view('admin.administration.profile.password');
    }

    public function editPassword(Request $request){
        $this->validate($request, [
            'newpassword' =>'required|min:6|max:30|confirmed'
        ]);
        $user = auth()->user();

        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);

        return redirect()->back()->with('success', 'Password has been Changed Successfully');
    }
}
