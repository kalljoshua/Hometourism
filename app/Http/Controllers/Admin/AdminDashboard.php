<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboard extends Controller
{
    //
    function index()
    {
    	return view('admin.admin_dashboard');
    }
}
