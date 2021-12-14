<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $doctor = Doctor::orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.doctor.index', compact('doctor'));
    }
}
