<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function contact(Request $request)
    {
        $this->validate($request,[
            'subject'=>'min:5|max:20',
            'email'=>'email',
            'body'=>'min:40|max:1000',
        ]);

        Contact::create([
            'subject' => $request->subject,
            'email' => $request->email,
            'body' => $request->body,

        ]);
        return redirect('contact')->withSuccess('Your message has been delivered!');
    }
}
