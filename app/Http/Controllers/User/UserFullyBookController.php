<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class UserFullyBookController extends Controller
{
    function suspendCompany(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $company_id = $_GET['company_id'];

        $state = $_GET['state'];

        if($state == 1){
            $company = Company::find($company_id);

            $company->full_booking = 1;

            $company->save();

            $error = 0;
            $status = 1;
            $message = "Home Fully Booked";
        }elseif($state == 0){
            $company = Company::find($company_id);

            $company->full_booking = 0;

            $company->save();

            $error = 0;
            $status = 2;
            $message = "Home Full unbooked";
        }else{
            $error = 0;
            $status = 3;
            $message = "Booking state unknown";
        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);
    }

    function getSuspendedCompanies(){

        $companies = Company::where('full_booking',1)->get();

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
        $slug = $company->slug;

        $company->full_booking = 0;

        if($company->save()){
            flash('Home Full unbook successfully')->success();
            return redirect()->route('company.details',['slug'=>$slug]);
        }else{
            flash('Failed to ful unbook home')->error();
            return redirect()->route('company.details',['slug'=>$slug]);
        }
    }
}
