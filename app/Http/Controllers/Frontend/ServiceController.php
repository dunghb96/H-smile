<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $service = Service::where('parent_id', 0)->get();
        return view('frontend.service.index', compact('service'));
    }
    public function get($id)
    {
        $service = Service::find($id);
        return view('frontend.service.detail', compact('service'));
    }
}
