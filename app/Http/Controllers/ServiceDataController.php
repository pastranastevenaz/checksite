<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;

class ServiceDataController extends Controller
{
    public function getallservices()
    {
      $services = Services::all();
      return response()->json($services);
      // return "This is the getAllServicesController";
    }
}
