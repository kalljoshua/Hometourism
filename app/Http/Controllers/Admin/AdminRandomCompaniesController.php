<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class AdminRandomCompaniesController extends Controller
{
    function randomCompany(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $company_id = $_GET['company_id'];

        $state = $_GET['state'];

        if($state == 1){
            $company = Company::find($company_id);

            $company->random = 1;

            $company->save();

            $error = 0;
            $status = 1;
            $message = "Company Randomised";
        }elseif($state == 0){
            $company = Company::find($company_id);

            $company->random = 0;

            $company->save();

            $error = 0;
            $status = 2;
            $message = "Company unrandomised";
        }else{
            $error = 0;
            $status = 3;
            $message = "Randomising state unknown";
        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);
    }

    function getRandom(){

        $companies = Company::where('random',1)->get();

        $res = array();

        $company_array = array();
        foreach ($companies as $company) {
            array_push($company_array,$company->id);
        }

        $res["random"] = $company_array;
        return json_encode($res);

    }
}
