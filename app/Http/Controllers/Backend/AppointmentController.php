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
        return view('backend.appointment.index');
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service')->where('status','>','0')->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $jsonObj['data'][$key]->full_name = $row->patients->full_name;
            $jsonObj['data'][$key]->age       = $row->patients->age;
            $jsonObj['data'][$key]->services = $row->service->name;
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

    // public function duyet(Request $request) 
    // {
    //     $id = $request->id;
    //     $appointment = Appointment::find($id);
    //     $appointment->status = 2;
    //     $appointment->save();
    //     $data = [
    //         'appointment' => $id,
    //         'status' => 1
    //     ];
    //     $model = new Appointment();
    //     $schedule = new ExaminationSchedule();
    //     $result = $model->saveExaminationSchedule($schedule, $data);
    //     if($result){
    //         $jsonObj['success'] = true;
    //         $jsonObj['msg'] = 'Tạo lịch khám thành công';
    //     } else {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //     } 
    //     echo json_encode($jsonObj);
    // }

    function addSchedule (Request $request) 
    {
        $appointment = $request->appointment;
        $doctor = $request->doctor;
        $dateat = isset($request->dateat) && $request->dateat == '' ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        // $dateat = $request->dateat;
        $shift = $request->shift;
        $data = [
            'appointment' => $appointment,
            'doctor' => $doctor,
            'date_at' => $dateat,
            'shift' => $shift,
        ];
        $result = ExaminationSchedule::where('doctor',$doctor)->where('date_at',$dateat)->where('shift',$shift)->where('status','>','0')->get();
        if($result->count() > 3) {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Không còn lịch trống';
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
