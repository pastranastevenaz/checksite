<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showData()
    {
      $user_id = auth()->user();
      // $address = array(auth()->user()->street_address);
      $address = array("123 elm street", "2251 main street", "34 jackson ave");
      return response()->json($address);
    }
}
