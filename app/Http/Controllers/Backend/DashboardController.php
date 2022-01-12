<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\feedback;
use App\Models\ExaminationSchedule;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DashboardController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $date = Carbon::now();
        $date_now = date('Y-m-d');
        // doanh thu theo tháng hiện tại
        $appointment = Appointment::all();
        $total_appointment = Appointment::all()->count();
        $confirm = Appointment::where('status', 2)->where('date', $date_now)->count();
        $waiting = Appointment::where('status', 1)->count();
        $doneAppoint = ExaminationSchedule::where('status', 2)->count();
        $day = Carbon::now()->day;
        $patient = Patient::where('status', 1)->get();
        $list = Appointment::orderBY('created_at')->get();

        $total_revenue_day = 0;
        $appointment_list_id_services = Appointment::where('status', 6)->where('date', $date_now)->pluck('services')->toArray();
        foreach($appointment_list_id_services as $key => $service_id)
        {
            $list_id_services[$key] = explode(',', $service_id);
            $array_total_moneny[$key] = Service::whereIn('id', $list_id_services[$key])->pluck('price')->toArray();
        }
        if(isset($array_total_moneny)){
            foreach($array_total_moneny as $key => $total_moneny){
                $total_revenue_day += array_sum($total_moneny);
            }
        }
        $services = Service::where('status', 1)->get();
        foreach($services as $service){
            $list_schedule = ExaminationSchedule::where('service_id', $service->id)->get();
            $count = $list_schedule->count();
            foreach($list_schedule as  $schedule){
                $service['total_moneny_service'] = $schedule->service->price * $count;
            }
        }
        $doctors = Employee::where('type', 1)->get();

        foreach($doctors as $doctor){
            $list_schedule_doctor = ExaminationSchedule::where('doctor_id', $doctor->id)->get();
            foreach($list_schedule_doctor as  $schedule){
                $doctor['total_moneny_doctor'] += $schedule->service->price;
            }
        }

        return view('backend.dashboard.index', compact('list', 'doctors',  'services', 'patient', 'total_appointment', 'confirm', 'waiting', 'doneAppoint', 'day', 'date', 'total_revenue_day', 'list_schedule'));

        return view('backend.dashboard.index', compact('list', 'doctor', 'service', 'patient', 'appointment', 'confirm', 'waiting', 'doneAppoint', 'day', 'date'));

    }

    public function today()
    {
        $list = Appointment::all();
//        $jsonObj['data'] = $list;
//
//        $ser = $jsonObj['data'][0]->services;
//        $service = Service::find($ser)->name;
//        return response()->json($list[0]['status']);

        return view('backend.doctor.today');
    }

    public function today_json()
    {
//        $doctor = Auth::guard('web')->user();
//        $now = Date('Y-m-d');
//        $list = ExaminationSchedule::where('date_at', '=', $now)->where('doctor',  $doctor->employee)->where('status', '>', 0)->get();
        $list = Appointment::all();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $jsonObj['data'][$key]->services = $service = Service::find($row->services)->name;

//            $jsonObj['data'][$key]->service_id = $appointment->service->id;
//            $jsonObj['data'][$key]->doctor = $row->doctors->name;
//            $jsonObj['data'][$key]->patient = $row->patients->full_name;
//            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
//            $jsonObj['data'][$key]->phone = $appointment->patients->phone_number;
//            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function future()
    {

        return view('backend.doctor.future');
    }

    public function future_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($now . "+1 days"));
        $list = ExaminationSchedule::where('date_at', '=', $tomorrow)->where('doctor', $doctor->employee)->where('status', 1)->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->phone = $appointment->patients->phone_number;
            $jsonObj['data'][$key]->status_name = ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function past()
    {
        return view('backend.doctor.past');
    }

    public function past_json()
    {
        $doctor = Auth::guard('web')->user();
        $list = ExaminationSchedule::where('doctor', $doctor->employee)->where('status', 2)->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->phone = $appointment->patients->phone_number;
            $jsonObj['data'][$key]->status_name = ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    function addnote(Request $request)
    {
        $id = $request->id;
        $model = ExaminationSchedule::find($id);
        $model->note = $request->note;
        $result = $model->save();
        if ($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }
}
