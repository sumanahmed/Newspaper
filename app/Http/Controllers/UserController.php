<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function addUser(){
        return view('/admin.user.add-user');
    }
    public function saveUser(Request $request){
        $this->validate($request, [
           'name'=>'required|regex:/^[\pL\s\-]+$/u',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|max:10|min:6',
           'role' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('add-user')->with('message', 'User Created Successfully');
    }

    public function manageUser(){
        $users = User::all();
        return view('/admin.user.manage-user', ['users'=>$users]);
    }

    public function editUser($id){
        $userById = User::where('id', $id)->first();
        return view('/admin.user.edit-user', ['userById' => $userById]);
    }

    public function updateUser(Request $request){
        $userById = User::find($request->user_id);
        $userById->name = $request->name;
        $userById->email = $request->email;
        $userById->role = $request->role;
        return view('/manage-user')->with('message','User Information update Successfully');
    }

    public function changePassword($id){
        $passwordById = User::where('id', $id)->first();
        return view('/admin.user.change-password', ['passwordById' => $passwordById]);
    }

    public function updatePassword(Request $request){
        $passwordById = User::find($request->user_id);
        $passwordById->password = bcrypt($request->new_password);
        $passwordById->save();

        return redirect('manage-user')->with('message');
    }

    public function deleteUser($id){
        $userById = User::where('id', $id)->first();
        $userById->delete();
        return view('/manage-user')->with('message','User Deleted Successfully');
    }


}
