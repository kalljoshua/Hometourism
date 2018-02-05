<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceRequest;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class ServiceRequestsController extends Controller
{
    function submitRequest(Request $request)
    {
        $requests = new ServiceRequest();
        if(Input::has('service_id')) $requests->company_id = Input::get('service_id');
        if(Input::has('slug')) $slug = Input::get('slug');
        if(Input::has('location')) $requests->location = Input::get('location');
        if(Input::has('type')) $requests->type = Input::get('type');

        if(Auth::guard('user')->user())
        {
            $requests->email = Auth::guard('user')->user()->email;
            $requests->contact = Auth::guard('user')->user()->phone;
            $requests->name = Auth::guard('user')->user()->first_name." ".Auth::guard('user')->user()->last_name;
        }else{
            if(Input::has('email')) $requests->email = Input::get('email');
            if(Input::has('name')) $requests->name = Input::get('name');
            if(Input::has('contact')) $requests->contact = Input::get('contact');
        }

        if(Input::has('details')) $requests->details = Input::get('details');

        if($requests->save()){
            if(Input::get('type')==2) {
                flash('Your request has successfully been sent')->success();
                return redirect(route('company.details', ['slug' => $slug]));
            }else{
                flash('Your request has successfully been sent')->success();
                return Redirect::back();
            }

        }else{
            if(Input::get('type')==2) {
                flash('Failed to send Request')->error();
                return redirect(route('company.details', ['slug' => $slug]));
            }else{
                flash('Failed to send Request')->error();
                return Redirect::back();
            }
        }

    }
}
