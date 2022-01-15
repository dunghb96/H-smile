<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Enums\CommonStatus;
use App\Http\Requests\BookingPostRequest;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Blog;
use App\Models\ExaminationSchedule;
use App\Models\Feedback;
use App\Models\Patient;
use App\Models\StaticPage;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends BaseController
{
    public function index()
    {
        $slide = Slide::where('status', 1)->take(3)->get();
        $service = Service::where('status', 1)->where('category_id', 0)->take(6)->get();
        $partner = Partner::where('status', 1)->take(4)->get();
        $blog = Blog::orderBy('created_at', 'DESC')->paginate(10);
        $doctor = Employee::where('type', 1)->paginate(10);
        $feedback = Feedback::where('status', 1)->take(5)->get();
        $countDoctor = $doctor->count();
        $doneAppoint = ExaminationSchedule::where('status', 2)->count();
        return view('frontend.home.index', compact('slide', 'doctor', 'service', 'partner', 'blog', 'feedback', 'countDoctor', 'doneAppoint'));
    }

    public function service()
    {
        $service = Service::where('category_id', 0)->get();
        $serviceHeader = Service::orderby('id', 'DESC')->where('category_id', 0)->get();
        return view('frontend.home.index', compact('service', 'serviceHeader'));
    }

    public function price()
    {
        $service = Service::where('category_id', 0)->get();
        return view('frontend.price.index', compact('service'));
    }

    public function form()
    {
        return view('frontend.form.fom_booking');
    }

    public function serviceForHeader()
    {
        $service = Service::where('category_id', 0)->get();
        $serviceHeader = Service::orderby('id', 'DESC')->where('category_id', 0)->get();
        return view('frontend.layout.header', compact('service'));
    }

    public function history()
    {
        $historyDatas = Appointment::where('patient_code', Cookie::get('patient_code'))->where('status', 1)->orderBy('created_at', 'ASC')->get();
        $listOrderByPatient = Order::where('customer_id', Cookie::get('patient_code'))->get();

        return view('frontend.history.index', compact('historyDatas', $historyDatas, 'listOrderByPatient', $listOrderByPatient));
    }

    public function search(Request $request)
    {
        $request->validate(
            [
                'phone' => 'required|numeric'
            ],
            [
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Hãy nhập đúng số điện thoại của bạn',
            ]
        );
        if ($request->phone) {
            $phone = $request->phone;
            $customer = Patient::where('phone_number', $phone)->first();
            if ($customer) {
                $list = Appointment::where('patient_id', $customer->id)->where('status', 1)->orderBy('created_at')->take(5);
                $list1 = $list->take(5)->get();
                $list1->load('service', 'doctor');
                $listId = Appointment::where('patient_id', $customer->id)->where('status', 2)->orderBy('created_at')->take(5)->pluck('id');
                $list2 = ExaminationSchedule::whereIn('appointment', $listId)->take(5)->get();
                $service = Service::all();
                return view('frontend.history.index', compact('list1', 'customer', 'phone', 'list2', 'service'));
            }
            return view('frontend.history.index', compact('phone'));
        }

    }

}
