<?php

namespace App\Observers;

use App\Models\Contacts;
use Illuminate\Support\Str;

class ContactObserver
{
    public function creating(Contacts $contact)
    {
        $contact->uuid = (string) Str::uuid();
    }
}
