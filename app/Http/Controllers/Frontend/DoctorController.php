<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Employee;

class DoctorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $doctor = Employee::where('type', 1)->paginate(10);
        return view('frontend.doctor.index', compact('doctor'));
    }
}
