<?php

namespace App\Http\Controllers\User;

use App\ServiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Input, Redirect;
use App\User;
use App\Company;
use App\Service;
use App\Archived;

class UserProfileController extends Controller
{
    use AuthenticatesUsers;

    function showUserProfile(){
        //return "am in here";

        /*$orders = Company::find(31);

            return $orders->requests;*/

        $auth_user_id = Auth::guard('user')->id();

        //$user = User::find($auth_user_id);
        $company = Company::where('user_id',$auth_user_id)->paginate(9);
        //return $company;

        return view('user.user_profile')
            //->with('user',$user)
            ->with('companies',$company);
        //->with('property_type',$this->property_types)
        //->with('t','agent');
    }

    function userUpdatePassword (Request $request){
        $id = $this->guard()->user()->id;
        $hashedPassword = $this->guard()->user()->password;
        $agent = User::find($id);

        if (\Hash::check(Input::get('oldpass'), $hashedPassword)) {
            // The passwords match...
            if(Input::get('newpass') == Input::get('confirmpass')){

                if(Input::has('newpass')) $agent->password = bcrypt(Input::get('newpass'));
                if($agent->save()){
                    flash('Password update was successfully done.')->success();
                    return redirect(route('user.profile'));
                }
            }else{
                flash('Un successfull Update, Password miss-match')->success();
                return redirect(route('user.profile'));
            }
        }else{
            flash('Un successfull Update. Provide correct old password')->success();
            return redirect(route('user.profile'));
        }

    }

    public function userEditSubmit(Request $request){

        $id = $this->guard()->user()->id;
        $user = User::find($id);

        if(Input::has('first_name')) $user->first_name = Input::get('first_name');
        if(Input::has('last_name')) $user->last_name = Input::get('last_name');
        if(Input::has('email')) $user->email = Input::get('email');
        if(Input::has('phone')) $user->phone = Input::get('phone');

        if($user->save()){
            flash('Update was successfully done.')->success();
            return redirect(route('user.profile'));
        }
        else {
            # code...
            flash('Update was unsuccessfully done.')->success();
            return redirect(route('user.profile'));
        }

        /*if( $request->hasFile('edit_photo') ) {

          $imageName = $request->input('username').'.'.$request->edit_photo->extension();

          $imageName = str_replace(' ', '_', $imageName);
          if($path = $request->edit_photo->move(public_path().'/cache_uploads/', $imageName)){
              $agent->profile_picture = $imageName;

              if($agent->save()){
                $path = public_path().'/cache_uploads/'.$imageName;

                    $this->resizeProfileImage($path,$imageName);

                  flash('Update was successfully done.')->success();
                  return redirect(route('agent.profile'));
              }
              else{
                flash('Un successfull Update')->success();
                return redirect(route('agent.profile'));
              }

        }else{
          if($agent->save()){
              flash('Update was successfully done.')->success();
              return redirect(route('agent.profile'));
          }
          else{
            flash('Un successfull Update')->success();
            return redirect(route('agent.profile'));
          }

        }
      }*/


    }
    function myAds($userId)
    {
        /*$services = Company::where('user_id',$userId)->where('active', 1)->orderBy('id','DESC')->paginate(5);
        return $services;*/
        if($userId != Auth::guard('user')->id()){
            flash('Please Login to view your Ads')->success();
            return redirect(route('user.login'));
        }else{
            $services = Company::where('user_id',$userId)->where('active', 1)->orderBy('id','DESC')->paginate(5);
            $user = User::find($userId);
            //return $services;
            return view('user.myadds')->with(['user'=>$user,'services'=>$services]);
        }
    }

    public function mySearch()
    {
        # code...
        return view("user.saved_search");
    }

    public function showArchived($user_id)
    {
        $archives = User::find($user_id)->user_archived()->paginate(5);
        //return $archives;
        return view("user.archived")->with('services',$archives);
    }
    public function pendingAds()
    {
        # code...
        $id = Auth::guard('user')->id();
        $services = Company::where('active',0)->where('user_id',$id)->paginate(5);
        return view("user.pending")
            ->with('services',$services);
    }


}
