<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\examinationSchedule;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class AppointmentController extends BaseController
{
    function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        $services = Service::where('status','1')->get();
        return view('backend.appointment.index',compact('services'));
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service', 'doctor')->orderBY('id','DESC')->where('status','>','0')->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $jsonObj['data'][$key]->full_name = $row->patients->full_name;
            $jsonObj['data'][$key]->services = $row->service->name;
            $jsonObj['data'][$key]->shift =  Appointment::SHIFT[$row->shift];
            $jsonObj['data'][$key]->doctor_name =  $row->doctor->name;
            $jsonObj['data'][$key]->status_word =  Appointment::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    function getDoctor(Request $request)
    {
        $service = $request->service;
        $jsonObj = Employee::where('status',1)->where('type',1)->where('services', 'like', '%'.$service.'%')->get();
        echo json_encode($jsonObj);
    }

    function addSchedule (Request $request) 
    {
        $patientid = $request->patient_id;
        $appointment = $request->appointment;
        $doctor = $request->doctor;
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $timeat = $request->timeat;
        $data = [
            'patient_id' => $patientid,
            'appointment' => $appointment,
            'doctor' => $doctor,
            'date_at' => $dateat,
            'time_at' => $timeat,
        ];
        $result = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('time_at',$timeat)->where('status','>','0')->get();
        if($result->count() > 3) {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Không còn lịch trống';
            echo json_encode($jsonObj);
        } else {
            $model = new Appointment();
            $schedule = new ExaminationSchedule();
            $result = $model->saveExaminationSchedule($schedule, $data);
            if($result){
                $model = Appointment::find($appointment);
                $model->status = 2;
                $result = $model->save();
                if($result) {
                    $jsonObj['success'] = true;
                    $jsonObj['msg'] = 'Tạo lịch khám thành công';
                }
            } else {
                $jsonObj['success'] = false;
                $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
            } 
            echo json_encode($jsonObj);
            
        }
       
    }
}
