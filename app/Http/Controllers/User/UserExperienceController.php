<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserExperience;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class UserExperienceController extends Controller
{
    //
    function submitExperience(Request $request)
    {
        $experience = new UserExperience();

        $idUser = Input::get('user_id');
        $check = UserExperience::where('user_id',$idUser)->count();
        if($check>0)
        {
            flash('Your request has successfully been sent')->success();
            return redirect(route('user.profile'));
        }else
        {
            if(Input::has('details')) $experience->details = Input::get('details');
            $experience->user_id = $idUser;

            if ($experience->save())
            {
                flash('Your request has successfully been sent')->success();
                return redirect(route('user.profile'));
            }

        }
    }
}
