<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'services', 'about', 'schedule', 'blog']]);
    }
    //
    public function index(){
      $greeting="Welcome";
      // return view('pages.index', compact('greeting'));
      return view('pages.index')->with('greeting', $greeting);
    }
    public function blog(){
      $blog="This is my first Blog Post!";
      // TODO: Make Get Reques to the blog API and return it with the view
      return view('pages.blog')->with('blog', $blog);
    }
    public function about(){
      $message="Hello there. Thanks for visiting";
      return view('pages.about')->with('message', $message);
    }

    public function services(Request $request){
      // if(!auth()->user()->profileComplete){
      //   return redirect('/dashboard')->with('error', 'Must complete profile to request service');
      // }
      $data=array(
        'title' => 'Services',
        'services'=>['Criminal Background Checks', 'Employment Verification', 'Drug Testing']
      );
      // $request->session()->put('foo', 'bar');
      // dd($request->session()->all());
      return view('pages.services')->with($data);
    }

    public function schedule(){
      return view('pages.schedule');
    }
}
