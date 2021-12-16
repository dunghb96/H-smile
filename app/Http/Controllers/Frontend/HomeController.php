<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Enums\CommonStatus;
use App\Http\Requests\BookingPostRequest;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Blog;

use App\Models\StaticPage;
use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $slide = Slide::where('status', 1)->take(3)->get();
        $service = Service::where('status', 1)->where('parent_id', 0)->take(6)->get();
        $partner = Partner::where('status', 1)->take(4)->get();
        $blog = Blog::orderBy('created_at', 'DESC')->paginate(10);
        $doctor = Employee::where('type', 1)->paginate(10);
        return view('frontend.home.index', compact('slide', 'service', 'partner', 'blog', 'doctor'));
    }

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

    public function serviceForHeader()
    {
        $service = Service::where('parent_id', 0)->get();
        $serviceHeader = Service::orderby('id', 'DESC')->where('parent_id', 0)->get();
        return view('frontend.layout.header', compact('service'));
    }

    public function postData(BookingPostRequest $request)
    {
        dd(1);
    }
}
