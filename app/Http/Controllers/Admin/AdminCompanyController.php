<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Company;

class AdminCompanyController extends Controller
{
    //
    public function showAll()
    {
        # code...
        $companies = Company::all()->sortByDesc("created_at");;
        return view('admin.all_companies')
            ->with('companies',$companies);
    }

    public function suspended()
    {
        # code...
        $companies = Company::where('suspended',1)->get();
        return view('admin.suspended_companies')
            ->with('companies',$companies);
    }

    public function pending()
    {
        $companies = Company::where('active',0)->get();
        return view('admin.pending_companies')
            ->with('companies',$companies);
    }

    public function approveCompany(Request $request,$id)
    {
        $company = Company::find($id);

        $company->active = 1;

        if($company->save()){
            flash('Company approved successfully')->success();
            return redirect()->route('admin.all.companies');
        }else{
            flash('Failed to approve company')->error();
            return redirect()->route('admin.all.companies');
        }
    }

    function getService(Request $request,$id){
        $service = Service::find($id);
        return view('admin.admin_service_details')
            ->with('service',$service);
    }

    function delete(Request $request,$id){
        $service = Service::find($id);
        return view('admin.admin_service_delete')
            ->with('service',$service);
    }

    function destroy(Request $request){
        $id = $request->input('id');

        if(Service::destroy($id)){
            flash('Service deleted successfully')->success();
            return redirect()->route('admin.all.services');
        }else{
            flash('Failed to delete service')->error();
            return redirect()->route('admin.all.services');
        }
    }
}
