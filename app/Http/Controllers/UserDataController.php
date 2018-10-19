<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;

class UserDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showData()
    {
      // $user_id = auth()->user();
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      // $address = array(auth()->user()->street_address);
      // $address = array("123 elm street", "2251 main street", "34 jackson ave", "asfasfr");
      $address = Address::all()->where('owner_id', '=', $user_id);

      return response()->json($address);
    }
}
