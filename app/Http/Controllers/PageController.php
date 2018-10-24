<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function sendmail(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'subject' => 'required',
    		'email' => 'required',
    		'body' => 'required|min:3',
    	]);

    	$mail = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
            'mobile' => $request->mobile
        );

        Mail::send('emails.contact', $mail, function($message) use ($mail) 
        {
            $message->from($mail['email'], $mail['name']);
            $message->to('info@farmties.com');
            $message->subject($mail['subject']);

        });


        flash()->success('Success', 'Mail sent successfully.');
        return redirect()->route('welcome');
    }
}
