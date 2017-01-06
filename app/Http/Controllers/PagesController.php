<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex() {

        $post = Post::orderBy('created_at', 'desc')->limit(4)->get();

    	return view('Pages.Index')->withPosts($post);
    }

    public function getAbout() {

    	$name = 'Muhammd Risco Ramdani';
    	$email = 'Muhammadriscor3@gmail.com';

    	return view('Pages.About');
    }

    public function getContact() {

    	return view('Pages.Contact');
    }

    public function postContact(Request $request) {

        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('risco@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success',' Your email has been successfully sended !!');

        return redirect('/');
    }
}
