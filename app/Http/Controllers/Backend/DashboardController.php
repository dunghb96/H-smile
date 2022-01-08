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
        $appointment = Appointment::count();
        $confirm = Appointment::where('status', 2)->count();
        $waiting = Appointment::where('status', 1)->count();
        $doneAppoint = ExaminationSchedule::where('status', 2)->count();
        $date = Carbon::now();
        $day = Carbon::now()->day;
        $patient = Patient::where('status', 1)->get();
        $doctor = Employee::where('type', 1)->get();
        $service = Service::where('category_id', 0)->get();
        $list = Appointment::orderBY('created_at')->get();
        return view('backend.dashboard.index', compact('list', 'doctor',  'service', 'patient', 'appointment', 'confirm', 'waiting', 'doneAppoint', 'day', 'date'));
    }

    public function today()
    {
        return view('backend.doctor.today');
    }

    public function today_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $list = ExaminationSchedule::where('date_at', '=', $now)->where('doctor',  $doctor->employee)->where('status', 1)->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->phone = $appointment->patients->phone_number;
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
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
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
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
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    function addnote(Request $request)
    {
        $id = $request->id;
        $model = ExaminationSchedule::find($id);
        $model->note = $request->note;
        $result = $model->save();
        if($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }
}
