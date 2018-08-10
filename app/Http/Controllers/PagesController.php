<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
      $greeting="Welcome";
      // return view('pages.index', compact('greeting'));
      return view('pages.index')->with('greeting', $greeting);
    }

    public function about(){
      $message="Hello there. Thanks for visiting";
      return view('pages.about')->with('message', $message);
    }

    public function services(){
      $data=array(
        'title' => 'Services',
        'services'=>['Criminal Background Checks', 'Employment Verification', 'Drug Testing']
      );
      return view('pages.services')->with($data);
    }

    public function schedule(){
      return view('pages.schedule');
    }
}
