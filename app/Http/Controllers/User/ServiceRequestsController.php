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
        if(Input::has('location')) $requests->location = Input::get('location');
        if(Input::has('type')) $requests->type = Input::get('type');
        if(Input::has('age')) $requests->age = Input::get('age');
        if(Input::has('gender')) $requests->gender = Input::get('gender');
        if(Input::has('guests')) $requests->guests = Input::get('guests');
        if(Input::has('profession')) $requests->profession = Input::get('profession');
        if(Input::has('period')) $requests->period = Input::get('period');

        if(Auth::guard('user')->user())
        {
            $requests->email = Auth::guard('user')->user()->email;
            $requests->contact = Auth::guard('user')->user()->phone;
            $requests->name = Auth::guard('user')->user()->name;
        }else{
            if(Input::has('email')) $requests->email = Input::get('email');
            if(Input::has('name')) $requests->name = Input::get('name');
            if(Input::has('contact')) $requests->contact = Input::get('contact');
        }

        if(Input::has('expectations')) $requests->expectations = Input::get('expectations');

        if($requests->save()){
            if(Input::get('type')==2) {
                flash('Your request has successfully been sent')->success();
                return redirect()->back();
            }else{
                flash('Your Booking has successfully been sent')->success();
                return redirect()->back();
            }

        }else{
            if(Input::get('type')==2) {
                flash('Failed to send Request')->error();
                return redirect()->back();
            }else{
                flash('Failed to send Booking')->error();
                return redirect()->back();
            }
        }

    }
}
