<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceRequest;

class ServiceRequestsController extends Controller
{
    //
    function serviceRequests()
    {
        $service = ServiceRequest::where('type',1)->get();
        return view('admin.all_requests')
        ->with('services',$service);
    }

    function serviceOrders()
    {
        $service = ServiceRequest::where('type',2)->get();
        return view('admin.all_orders')
            ->with('services',$service);
    }
}
