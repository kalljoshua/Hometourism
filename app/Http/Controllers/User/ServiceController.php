<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Company;
use App\Category;

class ServiceController extends Controller
{
    //
    public function getAll()
    {
        $services = Company::orderby('created_at','DESC')->paginate(5);
        return view("user.all_homes")->with('services',$services);
    }
}
