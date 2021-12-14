<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('frontend.contact.index');
    }
    public function post(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('hsmile.home');
    }
}
