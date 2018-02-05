<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class AdminFeatureCompaniesController extends Controller
{
    function featureCompany(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $company_id = $_GET['company_id'];

        $state = $_GET['state'];

        if($state == 1){
            $company = Company::find($company_id);

            $company->featured = 1;

            $company->save();

            $error = 0;
            $status = 1;
            $message = "Company featured";
        }elseif($state == 0){
            $company = Company::find($company_id);

            $company->featured = 0;

            $company->save();

            $error = 0;
            $status = 2;
            $message = "Company unfeatured";
        }else{
            $error = 0;
            $status = 3;
            $message = "Featuring state unknown";
        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);
    }

    function getFeatured(){

        $companies = Company::where('featured',1)->get();

        $res = array();

        $company_array = array();
        foreach ($companies as $company) {
            array_push($company_array,$company->id);
        }

        $res["featured"] = $company_array;
        return json_encode($res);

    }
}
