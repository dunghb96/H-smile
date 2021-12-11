<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class DoctorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        return view('frontend.doctor.index');
    }
}
