<?php

namespace App\Http\Controllers\User;

use App\ServiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
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


        $auth_user_id = Auth::guard('user')->id();

        /*foreach ($orders as $order){
            if($order->company->user_id == $auth_user_id){
                return $order->name;
            }

        }
        exit;*/

        //$user = User::find($auth_user_id);
        $company = Company::where('user_id',$auth_user_id)->paginate(9);
        //return $company;

        return view('user.user_profile')
            //->with('user',$user)
            ->with('companies',$company);
        //->with('property_type',$this->property_types)
        //->with('t','agent');
    }

    function editUserProfile()
    {
        $auth_user_id = Auth::guard('user')->id();

        $user = User::find($auth_user_id);
        return view('user.user_profile_edit')
            ->with('user',$user);
    }

    function userUpdatePassword (Request $request){
        $id = Auth::guard('user')->id();
        $hashedPassword = $this->guard()->user()->password;
        $agent = User::find($id);

        if (\Hash::check(Input::get('oldpass'), $hashedPassword)) {
            // The passwords match...
            if(Input::get('newpass') == Input::get('confirmpass')){

                if(Input::has('newpass')) $agent->password = bcrypt(Input::get('newpass'));
                if($agent->save()){
                    flash('Password update was successfully done.')->success();
                    return redirect(route('user.profile.edit'));
                }
            }else{
                flash('Un successfull Update, Password miss-match')->success();
                return redirect(route('user.profile.edit'));
            }
        }else{
            flash('Un successfull Update. Provide correct old password')->success();
            return redirect(route('user.profile.edit'));
        }

    }

    public function userEditSubmit(Request $request){

        $id = Auth::guard('user')->id();
        $user = User::find($id);

        if(Input::has('name')) $user->name = Input::get('name');
        if(Input::has('country')) $user->country = Input::get('country');
        if(Input::has('address')) $user->address = Input::get('address');
        if(Input::has('phone')) $user->phone = Input::get('phone');
        if(Input::has('email')) $user->email = Input::get('email');

        if( $request->hasFile('edit_photo') ) {

          $imageName = $request->input('name').'.'.$request->edit_photo->extension();

          $imageName = str_replace(' ', '_', $imageName);
          if($path = $request->edit_photo->move(public_path().'/cache_uploads/', $imageName)){
              $user->image = $imageName;

              if($user->save()){
                $path = public_path().'/cache_uploads/'.$imageName;

                    $this->resizeProfileImage($path,$imageName);

                  flash('Update was successfully done.')->success();
                  return redirect(route('user.profile.edit'));
              }
              else{
                flash('Un successfull Update')->error();
                return redirect(route('user.profile.edit'));
              }

        }else{
          if($user->save()){
              flash('Update was successfully done.')->success();
              return redirect(route('user.profile.edit'));
          }
          else{
            flash('Un successfull Update')->error();
              return redirect(route('user.profile.edit'));
          }

        }
      }


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
            ->with('companies',$services);
    }

    function resizeProfileImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

        Image::make($image_path)
            ->resize(239, 239)
            ->save(public_path().'/images/users/all_user_239x239/'.$image_name);

        Image::make($image_path)
            ->resize(74, 74)
            ->save(public_path().'/images/users/contact_user_74x74/'.$image_name);

        Image::make($image_path)
            ->resize(71, 71)
            ->save(public_path().'/images/users/home_71x71/'.$image_name);

        Image::make($image_path)
            ->resize(330, 330)
            ->save(public_path().'/images/users/profile_330x330/'.$image_name);
    }


}
