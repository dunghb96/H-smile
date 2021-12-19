<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BlogCategory;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\examinationSchedule;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
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
        $doctor = Employee::where('type',1)->get();
        return view('backend.appointment.index',compact('services', 'doctor'));
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service', 'doctor')->where('status','>','0')->orderBY('created_at')->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $jsonObj['data'][$key]->full_name = $row->patients->full_name;
            $jsonObj['data'][$key]->email = $row->patients->email;
            $jsonObj['data'][$key]->phone = $row->patients->phone;
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
    public function del(Request $request)
    {
        $id = $request->id;
        $model = Appointment::find($id);
        $model->status = 3;
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

    public function add(Request $request)
    {
        $dataDoctor = [
            'full_name'      =>$request->full_name,
            'age'            =>$request->age,
            'phone_number'   =>$request->phone_number,
            'email'          =>$request->email,
            'status_desc'    =>$request->status_desc
        ];
        $result1 = Patient::create($dataDoctor);

        $dataApp = [
            'service_id' => $request->service,
            'doctor_id'  => $request->doctor,
            'shift'      =>$request->time_at,
            'patient_id' =>$result1->id,
            'status'     => 1
        ];

        $result = Appointment::create($dataApp);

        if($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    // public function loaddata(Request $request)
    // {
    //     $id = $request->id;
    //     $model = Appointment::find($id);
    //     $model2 = Patient::find($model->patient_id);
    //     $model->patient = $model2->full_name;
    //     $model->age = $model2->age;

    //     $model->patient = $model2->full_name;
    //     echo json_encode($jsonObj);
    // }

    // public function edit(Request $request)
    // {
    //     $id = $request->id;
    //     $model = BlogCategory::find($id);
    //     $result = $model->saveBlogCate($model, $request);
    //     if($result) {
    //         $jsonObj['success'] = true;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
    //     } else {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //     }
    //     echo json_encode($jsonObj);
    // }
}
