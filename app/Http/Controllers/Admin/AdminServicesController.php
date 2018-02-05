<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class AdminServicesController extends Controller
{
    //
    public function showAll()
    {
      # code...
      $services = Service::all();
      return view('admin.all_services')
      ->with('services',$services);
    }

    public function suspended()
    {
      # code...
      $services = Service::where('suspended',1)->get();
      return view('admin.suspended_services')
      ->with('services',$services);
    }

    public function pending()
    {
      $services = Service::where('active',0)->get();
      return view('admin.pending_services')
      ->with('services',$services);
    }

    public function approveService(Request $request,$id)
    {
      $service = Service::find($id);

      $service->active = 1;

      if($service->save()){
        flash('Service approved successfully')->success();
        return redirect()->route('admin.all.services');
      }else{
        flash('Failed to approve service')->error();
        return redirect()->route('admin.all.services');
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
