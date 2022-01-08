<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\ExaminationSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExaminationScheduleController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    function getDoctor(Request $request)
    {
        $service = $request->service;
        $jsonObj = Employee::where('status',1)->where('type',1)->where('services', 'like', '%'.$service.'%')->get();
        echo json_encode($jsonObj);
    }

    public function index()
    {
        // $services = Service::where('status',1)->get();
        // $roles = Role::orderBy('name')->get();
        return view('backend.examination-schedule.index');
    }

    public function json()
    {
        $list = ExaminationSchedule::where('status','>','0')->orderBy('created_at', 'DESC')->get();
        $jsonObj['data'] = $list;
        // foreach($list as $key => $row){
        //     $appointment = Appointment::find($row->appointment);
        //     $jsonObj['data'][$key]->service = $appointment->service->name;
        //     $jsonObj['data'][$key]->service_id = $appointment->service->id;
        //     $jsonObj['data'][$key]->doctor = $row->doctors->name;
        //     $jsonObj['data'][$key]->patient = $row->patients->full_name;
        //     $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
        //     // $jsonObj['data'][$key]->full_name = $row->patients->full_name;
        //     // $jsonObj['data'][$key]->age       = $row->patients->age;
        //     // $jsonObj['data'][$key]->services = $row->service->name;
        //     $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        //     // $jsonObj['data'][$key]->shift_name =  ExaminationSchedule::SHIFT[$row->shift];
        // }
        echo json_encode($jsonObj);
    }

    function hoanthanh(Request $request)
    {
        $schedule = $request->id;
        $schedule = ExaminationSchedule::find($schedule);
        $schedule->status = 2;
        $schedule->save();
        $appointment = $request->appointment;
        $appointment = Appointment::find($appointment);
        $appointment->status = 4;
        $result = $appointment->save();
        if($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    function hentiep(Request $request)
    {
        $patientid = $request->patient;
        $scheduleid = $request->schedule;
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
            $model = ExaminationSchedule::find($scheduleid);
            $model->status = 2;
            $result = $model->save();
            if($result){
                $schedule = new ExaminationSchedule();
                $result = $schedule->saveExaminationSchedule($schedule, $data);
                if($result) {
                    $jsonObj['success'] = true;
                    $jsonObj['msg'] = 'Hẹn lịch khám tiếp thành công';
                }
            } else {
                $jsonObj['success'] = false;
                $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
            }
            echo json_encode($jsonObj);

        }
    }

    function loaddata(Request $request)
    {
        $id = $request->id;
        $jsonObj = ExaminationSchedule::find($id);
        $jsonObj['date_at'] = Carbon::parse($jsonObj->date_at)->format('d/m/Y');
        echo json_encode($jsonObj);
       
    }

    function saveExamSchedule(Request $request)
    {
        $id = $request->id;
        $schedule = ExaminationSchedule::find($id);
        $schedule->doctor = $request->doctor_id;
        $dateat = (isset($request->date_at) && $request->date_at != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->date_at))) : date("Y-m-d");
        $schedule->date_at = $dateat;
        $schedule->time_at = $request->time_at;
        $result = $schedule->save();
        if($result){
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    // public function add(Request $request)
    // {
    //     $model = new ExaminationSchedule();
    //     $result = $model->saveEmployee($model, $request);
    //     if($result){
    //         $jsonObj['success'] = true;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
    //     } else {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //     }
    //     echo json_encode($jsonObj);
    // }

    // public function loaddata(Request $request)
    // {
    //     $id = $request->id;
    //     $employee = ExaminationSchedule::find($id);
    //     echo json_encode($employee);
    // }

    // public function edit(Request $request)
    // {
    //     $id = $request->input('id');
    //     $model = ExaminationSchedule::find($id);
    //     $model->saveEmployee($model,$request);
    //     if($model->save()){
    //         $jsonObj['success'] = true;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
    //     } else {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //     }
    //     echo json_encode($jsonObj);
    // }

    public function del(Request $request)
    {
        $id = $request->id;
        $model = ExaminationSchedule::find($id);
        $model->status = 3;
        $result = $model->save();
        if($result){
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

}
