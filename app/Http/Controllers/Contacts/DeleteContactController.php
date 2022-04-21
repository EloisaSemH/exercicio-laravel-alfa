<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class DeleteContactController extends Controller
{
    public function process(string $contact)
    {
        try {
            Contacts::where('uuid', $contact)->delete();
            session()->flash('alert-message-success', 'Contact deleted');
        }catch (\Exception $exception){
            session()->flash('alert-message-error', 'Sorry, there was an error deleting the contact');
        }
        return redirect()->route('home');
    }
}
