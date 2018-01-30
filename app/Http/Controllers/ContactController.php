<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;

use App\Mail\ContactEmail;
use Mail;

class ContactController extends Controller
{
    public function create(){
      return view('contact.create');
    }

    public function store(Request $request){
      $this->validate($request, [
                  'email' => 'required|email',
                  'msg' => 'min:10']);

      $data = array(
          'name' => $request->name,
          'email' => $request->email,
          'msg' => $request->msg
      );

      // $contact = [];

      // $contact['name'] = $request->get('name');
      // $contact['email'] = $request->get('email');
      // $contact['msg'] = $request->get('msg');

      Mail::send('emails.contact', $data, function($message) use ($data){
        // to, from, bcc
        $message->from($data['email']);
        $message->to('timbarberlmt@timbarber.info');
        $message->subject('New contact');
      });

      // Mail delivery logic here

      // \Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));

      // flash('Your message has been sent!')->success();

      return redirect()->route('home_path')->with('success', 'Mail Sent');
    }
}
