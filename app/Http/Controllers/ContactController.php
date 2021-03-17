<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
use App\Mail\ContactShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{ 
    public function contacts()
    {
        $title = 'Contacts';
        return view('main.contacts', compact('title'));
    }

    public function getContacts(ContactPostRequest $request)
    {
        $dataValidated = $request->validated();

        $mail = env('MAIL_TO_ADDRESS');

        Mail::to($mail)->send(new ContactShipped($dataValidated));        

        return back()->with('success', 'Thahks!');
    }
}
