<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Enums\CommonStatus;
use App\Models\Client;
use App\Models\News;
use App\Models\Service;
use App\Models\Slide;
use App\Models\StaticPage;
use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function service()
    {
        $service = Service::paginate(6);
        return view('frontend.home.index', compact('service'));
    }
    public function form()
    {
        return view('frontend.form.fom_booking');
    }
    public function postData(Request $request)
    {
        dd(1);
        dd($request->all());
    }
}
