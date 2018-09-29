<?php

namespace App\Http\Controllers\Api;

use App\Services;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
       $this->middleware('auth');
   }

  public function index()
  {
    return "This is the Api\Services index";
  }

  public function create()
  {
    // $address = "39 Victor Street";
    // $address = auth()->user();
    $address = auth()->user();
    // $address = array('39 Victor Street', '547 Palmer Road', "2251 W Monterey Ave");
    return response()->json($address);
    // return "Hello";
  }

  public function store()
  {

  }

  public function show()
  {

  }

  public function update()
  {

  }

  public function destroy()
  {

  }

}
