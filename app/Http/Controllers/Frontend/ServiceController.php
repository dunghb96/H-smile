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
        $service = Service::where('status', Service::STATUS_ACTIVE)->get();
        return view('frontend.service.index', compact('service'));
    }
    public function get($id)
    {
        $service = Service::find($id);
        $serviceRandom = Service::where('status', Service::STATUS_ACTIVE)->get();
        $doctor = Employee::where('type', 1)->paginate(3);
        return view('frontend.service.detail', compact('service', "serviceRandom", 'doctor'));
    }
}
