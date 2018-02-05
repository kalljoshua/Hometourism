<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class AdminSuspendServicesController extends Controller
{
    //
    function suspendService(){
    $res = array();
    $message = "";
    $error = "";
    $status = "";

    $service_id = $_GET['service_id'];

    $state = $_GET['state'];

    if($state == 1){
      $service = Service::find($service_id);

      $service->suspended = 1;

      $service->save();

      $error = 0;
      $status = 1;
      $message = "Service suspended";
    }elseif($state == 0){
      $service = Service::find($service_id);

      $service->suspended = 0;

      $service->save();

      $error = 0;
      $status = 2;
      $message = "Service unsuspended";
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

  function getSuspendedServices(){

    $services = Service::where('suspended',1)->get();

    $res = array();

    $service_array = array();
    foreach ($services as $service) {
      array_push($service_array,$service->id);
    }

    $res["suspended"] = $service_array;
    return json_encode($res);

  }

  public function unsuspendService(Request $request,$id)
  {
    $service = Service::find($id);

    $service->suspended = 0;

    if($service->save()){
      flash('Service unsuspended successfully')->success();
      return redirect()->route('admin.all.services');
    }else{
      flash('Failed to unsuspend service')->error();
      return redirect()->route('admin.all.services');
    }
  }
}
