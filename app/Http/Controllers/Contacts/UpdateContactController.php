<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\UpdateContactRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;

class UpdateContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(string $contact)
    {
        if ($contact = Contacts::where('uuid', $contact)->first()) {
            return view(
                'contact.form',
                [
                    'contact' => $contact
                ]
            );
        }

        session()->flash('alert-message-error', 'Contact not found');
        return redirect()->route('contact.create');
    }

    public function process(UpdateContactRequest $request, string $contact)
    {
        try {
            Contacts::where('uuid', $contact)->update(
                [
                    'name' => $request->name,
                    'contact' => $request->contact,
                ]
            );
            session()->flash('alert-message-success', 'Contact updated');
        } catch (\Exception $exception) {
            session()->flash('alert-message-error', 'Sorry, there was an error updating the contact');
        }

        return $this->index($contact);
    }

}
