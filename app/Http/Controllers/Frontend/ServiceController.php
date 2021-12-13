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
        return view('frontend.service.index');
    }
    public function get($id)
    {
        $service = Service::find($id);
        return view('frontend.service.detail', compact('service'));
    }
}
