<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Enums\CommonStatus;
use App\Http\Requests\BookingPostRequest;
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
        $service = Service::where('parent_id', 0)->get();
        $serviceHeader = Service::orderby('id', 'DESC')->where('parent_id', 0)->get();
        return view('frontend.home.index', compact('service', 'serviceHeader'));
    }
    public function price()
    {
        $service = Service::where('parent_id', 0)->get();
        return view('frontend.price.index', compact('service'));
    }
    public function form()
    {
        return view('frontend.form.fom_booking');
    }

    public function postData(BookingPostRequest $request)
    {
        dd(1);
    }
}
