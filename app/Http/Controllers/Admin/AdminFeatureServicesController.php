<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class AdminFeatureServicesController extends Controller
{
  function featureService(){
    $res = array();
    $message = "";
    $error = "";
    $status = "";

    $service_id = $_GET['service_id'];


    $service = Service::find($service_id)
    ->where('featured',1)
    ->get();

    if($service->count()>0){
      $service = Service::find($service_id);

      $service->featured = 0;

      $service->save();

      $error = 0;
      $status = 2;
      $message = "Service unfeatured";

    }else{
      $service = Service::find($service_id);

      $service->featured = 1;

      $service->save();

      $error = 0;
      $status = 1;
      $message = "Service featured";


    }

    $res['error'] = $error;
    $res['status'] = $status;
    $res['message'] = $message;

    return json_encode($res);
  }

  function getFeatured(){

    $services = Service::where('featured',1)->get();

    $res = array();

    $service_array = array();
    foreach ($services as $service) {
      array_push($service_array,$service->id);
    }

    $res["featured"] = $service_array;
    return json_encode($res);

  }
}
