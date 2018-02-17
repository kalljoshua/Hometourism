<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Input, Redirect;
use App\User;

class RegisterController extends Controller
{
    public function registerUser( Request $request)
    {
        $user = new User();

        if(Input::has('name')) $user->name = Input::get('name');
        if(Input::has('country')) $user->country = Input::get('country');
        if(Input::has('address')) $user->address = Input::get('address');
        if(Input::has('phone')) $user->phone = Input::get('phone');
        if(Input::has('email')) $user->email = Input::get('email');
        if(Input::has('password')) $user->password = bcrypt(Input::get('password'));

        if( $request->hasFile('photo') ) {
        $imageName = $request->input('name').'.'.$request->photo->extension();

        $imageName = str_replace(' ', '_', $imageName);
        if($path = $request->photo->move(public_path().'/cache_uploads/', $imageName)){
          $user->image = $imageName;


        $check_agent_email = User::where('email',Input::get('email'))->get();
        if(sizeof($check_agent_email)>0)
        {
            flash('Email Address has already been registered.')->warning();
            return Redirect::back();
        }

        if($user->save())
        {
            $path = public_path().'/cache_uploads/'.$imageName;

            $this->resizeProfileImage($path,$imageName);
            flash('Your account has successfully been created')->success();
            return redirect(route('user.login'));
        }
        }
      }else {
            flash('Please select an image')->danger();
            return redirect(route('user.create.service'));
        }

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
