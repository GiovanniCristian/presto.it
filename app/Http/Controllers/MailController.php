<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contattaci_submit(Request $request){
        
        $name = $request->contactUsName;
        $email = $request->contactUsEmail;
        $subject = $request->contactUsSubject;
        $message = $request->contactUsMessage;

        $user_contact = compact('name', 'subject', 'message');

        Mail::to($email)->send(new ContactUsMail($user_contact));

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato, il tuo messaggio è stato correttamente inviato');

        // return view('contactUsMail');
    }
}
