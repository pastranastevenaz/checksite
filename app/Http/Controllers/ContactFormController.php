<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

use App\Mail\ContactEmail;
use Mail;
class ContactFormController extends Controller
{
    public function submit(Request $request){

      if ($request->isMethod('post')){
        // $this->validate($request, [
        //   'name' => 'required|string',
        //   'email' => 'required|email',
        //   'message' => 'required',
        // ]);
        // $$name = $request->name;
        $contactData = array(
          'name' => $request->name,
          'email' => $request->email,
          'msg' => $request->message,
          'phone' => $request->phone,
          'time' => $request->time
        );
        Mail::send('emails.contact', $contactData, function($message) use ($contactData){
          $message->from($contactData['email']);
          $message->to('steven@haminastu.com');
          $message->subject('New contact submission');
        });
        return response()->json(null, 200);
      }
      return redirect('/')->with('error', 'You are not authorized to view that resource');

      // try{
      //   return "Received email from ".$data->name;
      // }
      // catch(\Exception $e){
      //   return $e->getMessage();
      // }

    }
}
