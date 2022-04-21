<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\CreateContactRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;

class NewContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('contact.form');
    }

    public function process(CreateContactRequest $request)
    {
        try {
            Contacts::create(
                [
                    'name' => $request->name,
                    'contact' => $request->contact,
                    'email' => $request->email,
                ]
            );
            session()->flash('alert-message-success', 'Contact created');
        }catch (\Exception $exception){
            session()->flash('alert-message-error', 'Sorry, there was an error creating the contact');
        }

        return view('contact.form');
    }

}
