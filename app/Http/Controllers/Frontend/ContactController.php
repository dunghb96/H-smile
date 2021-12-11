<?php

namespace App\Http\Controllers\Frontend;

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
}
