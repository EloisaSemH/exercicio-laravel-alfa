<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\CreateContactRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ViewContactController extends Controller
{
    public function index(string $contact)
    {
        if ($contact = Contacts::where('uuid', $contact)->first()) {
            return view(
                'contact.view',
                [
                    'contact' => $contact
                ]
            );
        }

        session()->flash('alert-message-error', 'Contact not found');
        return redirect()->route('home');
    }
}
