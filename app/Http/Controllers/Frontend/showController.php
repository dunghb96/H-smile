<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class showController extends Controller
{
    public function index()
    {
        $service = Service::all();

        return view('frontend.service.list_service', compact('service'));
    }
}
