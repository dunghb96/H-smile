<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\ExaminationSchedule;
use Carbon\Carbon;
use DateTime;
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
        $jsonObj = Employee::where('status', 1)->where('type', 1)->where('services', 'like', '%' . $service . '%')->get();
        echo json_encode($jsonObj);
    }

    public function index()
    {
        $schedules = ExaminationSchedule::where('status', 2)->get();
        foreach ($schedules as $key => $schedule) {
            $schedules[$key]->service_name = $schedule->service->name;
            $schedules[$key]->customer_name = $schedule->patient->full_name;
            $schedules[$key]->phone_number = $schedule->patient->phone_number;
        }
        $doctors = Employee::where('status', 1)->where('type', 1)->orderBy('name')->get();
        return view('backend.examination-schedule.index', compact('doctors', 'schedules'));
    }

    public function json()
    {
        $thang = (isset($_REQUEST['thang']) && ($_REQUEST['thang'] != '')) ? $_REQUEST['thang'] : date("m");
        $nam = (isset($_REQUEST['nam']) && ($_REQUEST['nam'] != '')) ? $_REQUEST['nam'] : date("Y");
        $doctor_id = isset($_REQUEST['doctor_id']) ? $_REQUEST['doctor_id'] : '';
        $jsonObj['data'] = ExaminationSchedule::where('status', '3')->where('doctor_id', $doctor_id)->orderBy('created_at', 'DESC')->get();
        foreach ($jsonObj['data'] as $key => $item) {
            $jsonObj['data'][$key]->service_name = $item->service->name;
            $jsonObj['data'][$key]->service_time = $item->service->time;
            $jsonObj['data'][$key]->customer_name = $item->patient->full_name;
            $jsonObj['data'][$key]->phone_number = $item->patient->phone_number;
        }
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
        if ($result) {
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
        $result = ExaminationSchedule::where('doctor', $doctor)->whereDate('date_at', $dateat)->where('time_at', $timeat)->where('status', '>', '0')->get();
        if ($result->count() > 3) {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Không còn lịch trống';
            echo json_encode($jsonObj);
        } else {
            $model = ExaminationSchedule::find($scheduleid);
            $model->status = 2;
            $result = $model->save();
            if ($result) {
                $schedule = new ExaminationSchedule();
                $result = $schedule->saveExaminationSchedule($schedule, $data);
                if ($result) {
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
        $jsonObj->service_name = $jsonObj->service->name;
        $jsonObj->service_time = $jsonObj->service->time;
        $jsonObj->customer_name = $jsonObj->patient->full_name;
        $jsonObj->phone_number = $jsonObj->patient->phone_number;
        // $jsonObj['date_at'] = Carbon::parse($jsonObj->date_at)->format('d/m/Y');
        echo json_encode($jsonObj);
    }

    function changeTime(Request $request)
    {
        $gio = $request->start_time;
        $thoiluong = $request->time;
        $giora = date_create($gio);
        date_add($giora, date_interval_create_from_date_string("$thoiluong minutes"));
        $jsonObj['end_time'] = date_format($giora, "H:i");
        echo json_encode($jsonObj);
    }

    public function xeplich(Request $request)
    {
        $id = $request->id;
        $model = ExaminationSchedule::find($id);
        $result = $model->xeplich($model, $request);
        if ($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
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
        if ($result) {
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
