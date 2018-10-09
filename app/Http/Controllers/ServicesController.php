<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;

class ServicesController extends Controller
{

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($now);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $services = Services::find($user);
        $my_services = $services->where('owner_id', '=', $user_id);
        // $now = new Carbon();
        // echo dd($my_services);
        // return view(services.index)->with('services', $services);
        // return view('services.index')->with('services', $user->services);
        return view('services.index',[
                                        'services'=> $my_services,
                                        // 'now' => $now
                                    ]);


        // ->with('services', $my_services);
        // $services =

        // $services = Services::with('client')->orderBy('created_at', 'dec')->where('client')->paginate(10);
        // $services = Services::with('client')->get();
        // $services = Services::with('user')->get();
        // $services = Services::where('user_id', $user_id)->with('User')->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('services.create');
        // echo "Services create";

        // Steps
        // 1 Customer Selects Address | Currently its just their home address
        // 2 Use the address to create a geolocation lat/lon of their address
        // 3 Store the service request info with a value of assigned set to false

        // 4 While Assigned == false { queue a task to continue to find a contractor}
        // 5 when contractor accepts job, have the running queue task assign the Assign varaible to true

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $method = $request->method();

      if ($request->isMethod('post')) {

        // $input = $request->all();
        $data = $request->all();
        // dd($data);

        // return $request->street_address;
        $service = new Services;
        $service->owner_id = auth()->user()->id;
        $service->street_address = $request->street_address;
        $service->livingroom = $request->livingroom;
        $service->kitchen = $request->kitchen;
        $service->diningroom = $request->diningroom;
        $service->bedroom0 = $request->bedroom0;
        $service->bedroom1 = $request->bedroom1;
        $service->bedroom2 = $request->bedroom2;
        $service->bedroom3 = $request->bedroom3;
        $service->bedroom4 = $request->bedroom4;
        $service->bedroom5 = $request->bedroom5;
        $service->bedroom6 = $request->bedroom6;
        $service->bedroom7 = $request->bedroom7;
        $service->bedroom8 = $request->bedroom8;
        $service->bedroom9 = $request->bedroom9;

        $service->bathroom0 = $request->bathroom0;
        $service->bathroom1 = $request->bathroom1;
        $service->bathroom2 = $request->bathroom2;
        $service->bathroom3 = $request->bathroom3;
        $service->bathroom4 = $request->bathroom4;

        $service->extraroom1_name = $request->extraroom1_name;
        $service->extraroom1_level = $request->extraroom1_level;
        $service->extraroom2_name = $request->extraroom2_name;
        $service->extraroom2_level = $request->extraroom2_level;

        $service->save();
        // print $service;
        return $service;
        // return redirect('/');
        // return redirect('services')->with($input);
      }

      return redirect('/')->with('error', 'You are not authorized to view that resource');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    // public function show(Services $services)
    public function show($id)
    {
        $service = Services::find($id);
        // dd($service);
        if(!$service){
            return redirect('/services')->with('error', 'Service request not found');
        }

        if(auth()->user()->id !== $service->owner_id){
            return redirect('services')->with('error', 'You are not authorized to view this page');
        }

        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        echo "Service edit page";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {
        echo "Service update page";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        echo "Service destroy";
    }
}
