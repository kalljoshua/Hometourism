<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use Input, Redirect;

class AdminUsersController extends Controller
{
    //

    function showUser(Request $request,$id){

        $user = Admin::find($id);

        return view('admin.admin_user_profile')->with('user',$user);

    }

    function getAllUsers(){
        if(Auth::guard('admin'))
        $admins = User::all();
        return view('admin.admin_users_list')->with('admins',$admins);
    }

    function editUser($id){

        $user = Admin::find($id);

        return view('admin.admin_edit_user_form')->with('user',$user);
    }

    function save(Request $request){

        $id = $request->input('id');
        $user = Admin::find($id);

        if(Input::has('firstname')) $user->firstname = $request->input('firstname');
        if(Input::has('lastname')) $user->lastname = $request->input('lastname');
        if(Input::has('username')) $user->username = $request->input('username');
        if(Input::has('email')) $user->email = $request->input('email');
        if(Input::has('password')) $user->password = bcrypt($request->input('password'));
        if(Input::has('old_password')) $old_pass  = bcrypt($request->input('old_password'));
        //if(Input::has('lastname')) $user->role = $request->input('role');
        $check_old_pass = Admin::where('password',$old_pass,'&','id',$id);
        return $user;
        /*if($firstname != ""){
            $user->firstname = $firstname;
        }
        if($lastname != "")
            $user->lastname = $lastname;
        if($username != "")
            $user->username = $username;
        if($email != "")
            $user->email = $email;
        if(sizeof($check_old_pass)<1){
            flash('Passwords don\'t match')->warning();
            return view('admin.admin_edit_user_form')->with('user',$user);
        }else{
            $user->password = bcrypt($new_pass);
        }

        if($role != "")
            $user->role = $role;*/

        if($user->save()){
            flash('Changes saved successfully')->success();
        }else{
            flash('Save unsuccessful')->error();
        }

        return view('admin.admin_edit_user_form')->with('user',$user);

    }

    function delete(Request $request, $id){
        $admin = Admin::find($id);
        return view('admin.admin_users_delete')->with('admin',$admin);
    }

    function destroy(Request $request){

        $id = $request->input('id');

        if(Admin::destroy($id)){
            flash('User deleted successfully')->success();
            return redirect()->route('admin.user.list');
        }else{
            flash('Failed to delete user')->error();
            return redirect()->route('admin.user.list');
        }
    }
}
