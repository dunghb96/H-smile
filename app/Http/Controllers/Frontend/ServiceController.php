<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\Employee;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $service = Service::where('category_id', 0)->get();
        return view('frontend.service.index', compact('service'));
    }
    public function get($id)
    {
        $service = Service::find($id);
        $serviceRandom = Service::where('category_id', 0)->get();
        $doctor = Employee::where('type', 1)->paginate(2);
        return view('frontend.service.detail', compact('service', "serviceRandom", 'doctor'));
    }
}
