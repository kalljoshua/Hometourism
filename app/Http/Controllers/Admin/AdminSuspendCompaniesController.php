<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class AdminSuspendCompaniesController extends Controller
{
    //
    function suspendCompany(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $company_id = $_GET['company_id'];

        $state = $_GET['state'];

        if($state == 1){
            $company = Company::find($company_id);

            $company->suspended = 1;

            $company->save();

            $error = 0;
            $status = 1;
            $message = "Company suspended";
        }elseif($state == 0){
            $company = Company::find($company_id);

            $company->suspended = 0;

            $company->save();

            $error = 0;
            $status = 2;
            $message = "Company unsuspended";
        }else{
            $error = 0;
            $status = 3;
            $message = "Suspension state unknown";
        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);
    }

    function getSuspendedCompanies(){

        $companies = Company::where('suspended',1)->get();

        $res = array();

        $company_array = array();
        foreach ($companies as $company) {
            array_push($company_array,$company->id);
        }

        $res["suspended"] = $company_array;
        return json_encode($res);

    }

    public function unsuspendCompany(Request $request,$id)
    {
        $company = Company::find($id);

        $company->suspended = 0;

        if($company->save()){
            flash('Company unsuspended successfully')->success();
            return redirect()->route('admin.all.companies');
        }else{
            flash('Failed to unsuspend Company')->error();
            return redirect()->route('admin.all.companies');
        }
    }
}
