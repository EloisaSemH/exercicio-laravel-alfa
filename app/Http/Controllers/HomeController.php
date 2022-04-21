<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $contacts = Contacts::orderBy('id', 'DESC')->paginate(10);
        return view('home', ['contacts' => $contacts]);
    }
}
