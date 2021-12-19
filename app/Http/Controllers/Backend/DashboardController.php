<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\ExaminationSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function today()
    {
        return view('backend.doctor.today');
    }

    public function today_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $list = ExaminationSchedule::where('date_at', '=', $now)->where('doctor', 2)->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function future()
    {

        return view('backend.doctor.today');
    }

    public function future_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $tomorrow = date('Y-m-d',strtotime($now . "+1 days"));
        $list = ExaminationSchedule::where('date_at', '=',$tomorrow)->where('doctor', 2)->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function past()
    {
        return view('backend.doctor.today');
    }

    public function past_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $list = ExaminationSchedule::where('date_at', '=', $now)->where('doctor', 2)->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

}
