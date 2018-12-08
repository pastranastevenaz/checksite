<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;
use App\Website;
use App\Services;

class UserDataController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getmainaddress()
  {
    // $user_id = auth()->user();
    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    // $address = array(auth()->user()->street_address);
    // $address = array("123 elm street", "2251 main street", "34 jackson ave", "asfasfr");
    $addresses = Address::all()->where('owner_id', '=', $user_id);
    $address = $addresses->first();
    return response()->json($address);
  }

  public function getallwebsites()
  {
    // return "Hello";
    $user_id = auth()->user()->id;
    // return $user_id;
    $user = User::find($user_id);
    // return $user;
    $allWebsites = Website::all()->where('user_id', '=', $user_id);
    // return $allWebsites;

    return response()->json($allWebsites);
  }


  public function addressadd(Request $request)
  {
    $method = $request->method();

    if ($request->isMethod('post')) {
      $address = new Address;

      $address->street_address = strtolower($request->_streetAddress);
      $address->city = strtolower($request->_city);
      $address->state = $request->_state['abr'];//->abr;
      $address->zip = $request->_zip;
      $address->owner_id = auth()->user()->id;
      // CALCULATE GEOLOCATION
      $streetAddress = strtolower($request->street_address);
      $explodedAddress = str_replace(" ", "+", $streetAddress);
      // $explodedAddress = strtolower($request->_streetAddress);
      $city = strtolower($request->_city);
      $state = $request->_state['abr'];
      $zip = $request->_zip;
      $add = $explodedAddress.',+'.$city.',+'.$state;

      $auth = "AIzaSyBaBnU-fORxeuDxUDdiFzYvVXeFd2wdnrg";
      $context = stream_context_create(['http' => ['header' => "Authorization: Basic $auth"]]);
      //
      $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$add.'&sensor=false,+CA&key='.$auth);
      $output = json_decode($geocode);

      $address->lat = $output->results[0]->geometry->location->lat;
      $address->long = $output->results[0]->geometry->location->lng;

      $address->save();
      return $address;

    }
    return redirect('/')->with('error', 'You are not authorized to view that resource');
  }

}
