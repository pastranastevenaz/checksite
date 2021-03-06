<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Website;
use App\Ticket;
// use App\Address;
// use Illuminate\Support\Fascades\Storage;
use Storage;

class DashboardController extends Controller
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

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    $websites = Website::all()->where('user_id', '==', $user_id);
    $tickets = Ticket::all()->where('user_id', '==', $user_id);
    // $addresses = Address::all();
    // $address = Address::all()->where('owner_id', '==', $user_id)->first();
    // Returning in a variable called posts, all the
    // posts associated with the currrent user
    // return view('dashboard')->with('posts', $user->posts);
    // return view('dashboard');
    // return $address;
    // return $user->website;
    // return $tickets;
    return view('dashboard',[
      'user'=> $user,
      'websites' => $websites,
      'tickets' => $tickets
      // 'address' => $address
      // 'now' => $now
    ]);
  }

  /**
  * Update the authenticated User's Name resource in storage.
  *
  *
  */
  public function editUser(Request $request) {

    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    $address = Address::find($user)->where('owner_id', '=', $user_id)->first();
    // $my_addresses = $addresses->where('owner_id', '=', $user_id);
    // dd($addresses);
    if(!$user){
      return redirect('/')->with('error', 'User Not Found');
    }
    // return view('auth.edituser')->with('user', $user);

    return view('auth.edituser',[
      'user'=> $user,
      'address' => $address
      // 'now' => $now
    ]);
    // $user->name = $request->input('name');
    // $user->save();

    // return redirect('/dashboard')->with('success', 'Name Updates');
  }

  public function updateUser(Request $request) {
    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    if(!$user){
      return redirect('/dashboard')->with('error', 'Unable to change user');
    }
    $this->validate($request,[
      'avatar' => 'image|nullable|max:1999'
    ]);

    // Handle file upload
    $oldAvatarURL = auth()->user()->avatar;
    $oldAvatar = basename($oldAvatarURL);


    if($request->hasFile('avatar')){
      // Get Filename with the extension
      $filenameWithExt = $request->file('avatar')->getClientOriginalName();

      // Get Just the filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      // dd($filename);

      // Get the extension
      $extension = $request->file('avatar')->getClientOriginalExtension();

      // File name to Store with timestamp
      $fileNameToStore = $filename.'_'.time().'.'.$extension;

      // Upload the avatar image to s3 disk

      // First Delete the old file from s3
      if($oldAvatar != 'noavatar.jpg'){
        Storage::disk('s3')->delete($oldAvatar);
      }
      // Now upload
      $file = Storage::disk('s3')->put($fileNameToStore,
      fopen($request->file('avatar'), 'r+'), 'public');

      // Generate, then clean the last character of the upload url
      $urlPrefixRaw = Storage::disk('s3')->url($file);
      $urlPrefix = substr_replace($urlPrefixRaw, "", -1);
      // Save the upload path URL to a variable to save it to the database
      $avatar_url = $urlPrefix.$fileNameToStore;
    } else{
      $avatar_url = auth()->user()->avatar;
    }
    // $avatar_url = $urlPrefix.$fileNameToStore;

    $user->avatar = $avatar_url;
    $user->name = strtolower($request->input('name'));
    $user->organization = strtolower($request->input('organization'));
    $user->phone = $request->input('phone');
    // $user->street_address = strtolower($request->input('street_address'));
    // $user->city = strtolower($request->input('city'));
    // $user->state = strtoupper($request->input('state'));
    // $user->zip = $request->input('zip');

    $address = Address::all()->where('owner_id', '=', $user_id)->first();
    // dd($address);
    $address->street_address = strtolower($request->input('street_address'));
    $address->city = strtolower($request->input('city'));
    $address->state = strtoupper($request->input('state'));
    $address->zip = $request->input('zip');

    // $output = self::setGeoLocation($address);
    // $address->lat = $output->results[0]->geometry->location->lat;
    // $address->long = $output->results[0]->geometry->location->lng;

    $streetAddress = strtolower($request->input('street_address'));
    // $city = $addressData->city;
    // $state = $addressData->state;
    $explodedAddress = str_replace(" ", "+", $streetAddress);
    $city = strtolower($request->input('city'));
    $state = strtoupper($request->input('state'));
    $zip = $request->input('zip');
    $add = $explodedAddress.',+'.$city.',+'.$state;

    $auth = "AIzaSyBaBnU-fORxeuDxUDdiFzYvVXeFd2wdnrg";
    $context = stream_context_create(['http' => ['header' => "Authorization: Basic $auth"]]);
    // $homepage = file_get_contents("http://example.com/file", false, $context );

    $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$add.'&sensor=false,+CA&key='.$auth);
    $output = json_decode($geocode);
    // dd($output);
    $address->lat = $output->results[0]->geometry->location->lat;
    $address->long = $output->results[0]->geometry->location->lng;


    if($request){
      $user->profileComplete = 1;
    }

    $user->save();
    $address->save();
    // if ($user->name && $user->phone &&
    //     $user->street_address &&
    //     $user->city && $user->state &&
    //     $user->zip){
    return redirect('dashboard')->with('success', 'User updated');
  }



  public function checkProfileComplete(Request $request) {
    $user_id = auth()->user()->id;
    $user = User::find($user_id);
    $profileComplete = $user->profileComplete;

    if($profileComplete){
      return true;
    }else{
      if($user->name){
        $user->profileComplete = true;
        return true;
      }
      return false;
    }

  }

  public function setGeoLocation($addressData) {
    $streetAddress = $addressData->street_address;
    $city = $addressData->city;
    $state = $addressData->state;
    $explodedAddress = str_replace(" ", "+", $streetAddress);
    $add = $explodedAddress.',+'.$city.',+'.$state;
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add.'&sensor=false');
    $output = json_decode($geocode);

    return $output;
  }
}
