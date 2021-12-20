<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Employee;
use App\Models\ExaminationSchedule;
use Illuminate\Http\Request;

class AboutController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $doctor = Employee::where('type', 1)->paginate(10);
        $countDoctor = $doctor->count();
        $doneAppoint = ExaminationSchedule::where('status', 2)->count();
        return view('frontend.about.index', compact('doctor', 'countDoctor', 'doneAppoint'));
    }
}
