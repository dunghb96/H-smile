<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\ExaminationSchedule;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $date = date('Y-m-d');
        $dateat = strtotime('+3 day', strtotime($date));
        $dateat = date('Y-m-d', $dateat);
        $schedules = ExaminationSchedule::where('status', 1)->where('date_at', '<=', $dateat)->get();
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
        $jsonObj['data'] = ExaminationSchedule::where('status', '2')->where('doctor_id', $doctor_id)->orderBy('created_at', 'DESC')->get();
        foreach ($jsonObj['data'] as $key => $item) {
            // $jsonObj['data'][$key]->date_at = Carbon::parse($item->date_at)->format('d/m/Y');
            $jsonObj['data'][$key]->service_name = $item->service->name;
            $jsonObj['data'][$key]->service_time = $item->service->time;
            $jsonObj['data'][$key]->customer_name = $item->patient->full_name;
            $jsonObj['data'][$key]->phone_number = $item->patient->phone_number;
        }
        echo json_encode($jsonObj);
    }

    // function hoanthanh(Request $request)
    // {
    //     $schedule = $request->id;
    //     $schedule = ExaminationSchedule::find($schedule);
    //     $schedule->status = 2;
    //     $schedule->save();
    //     $appointment = $request->appointment;
    //     $appointment = Appointment::find($appointment);
    //     $appointment->status = 4;
    //     $result = $appointment->save();
    //     if ($result) {
    //         $jsonObj['success'] = true;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
    //     } else {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //     }
    //     echo json_encode($jsonObj);
    // }

    // function hentiep(Request $request)
    // {
    //     $patientid = $request->patient;
    //     $scheduleid = $request->schedule;
    //     $appointment = $request->appointment;
    //     $doctor = $request->doctor;
    //     $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
    //     $timeat = $request->timeat;
    //     $data = [
    //         'patient_id' => $patientid,
    //         'appointment' => $appointment,
    //         'doctor' => $doctor,
    //         'date_at' => $dateat,
    //         'time_at' => $timeat,
    //     ];
    //     $result = ExaminationSchedule::where('doctor', $doctor)->whereDate('date_at', $dateat)->where('time_at', $timeat)->where('status', '>', '0')->get();
    //     if ($result->count() > 3) {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Không còn lịch trống';
    //         echo json_encode($jsonObj);
    //     } else {
    //         $model = ExaminationSchedule::find($scheduleid);
    //         $model->status = 2;
    //         $result = $model->save();
    //         if ($result) {
    //             $schedule = new ExaminationSchedule();
    //             $result = $schedule->saveExaminationSchedule($schedule, $data);
    //             if ($result) {
    //                 $jsonObj['success'] = true;
    //                 $jsonObj['msg'] = 'Hẹn lịch khám tiếp thành công';
    //             }
    //         } else {
    //             $jsonObj['success'] = false;
    //             $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //         }
    //         echo json_encode($jsonObj);
    //     }
    // }

    function loaddata(Request $request)
    {
        $id = $request->id;
        $jsonObj = ExaminationSchedule::find($id);
        $jsonObj->service_name = $jsonObj->service->name;
        $jsonObj->service_time = $jsonObj->service->time;
        $jsonObj->customer_name = $jsonObj->patient->full_name;
        $jsonObj->phone_number = $jsonObj->patient->phone_number;
        $jsonObj['date_at'] = Carbon::parse($jsonObj->date_at)->format('d/m/Y');
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
        $dateat = (isset($request->date_at) && $request->date_at != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->date_at))) : '';
        $start_time = date("Y-m-d H:i:s", strtotime($dateat . " " . $request->start_time .":00"));
        $end_time = date("Y-m-d H:i:s", strtotime($dateat . " " . $request->end_time .":00"));

        $data = ExaminationSchedule::where('id', '!=', $id)->where('date_at', 'LIKE', $dateat)->where('doctor_id', $request->doctor_id)->where('status', 2)->get();
        if (count($data)>0) {
            foreach ($data as $item) {
                $startTime = date("Y-m-d H:i:s", strtotime($item['date_at'] . " " . $item['start_time']));
                $endTime = date("Y-m-d H:i:s", strtotime($item['date_at'] . " " . $item['end_time']));
                if ($start_time > $startTime && $start_time < $endTime) {
                    $jsonObj['success'] = false;
                    $jsonObj['msg'] = 'Bác sĩ đã có lịch khám trong khung giờ này!';
                } else if ($end_time > $startTime && $end_time < $endTime) {
                    $jsonObj['success'] = false;
                    $jsonObj['msg'] = 'Bác sĩ đã có lịch khám trong khung giờ này!';
                } else {
                    $model = ExaminationSchedule::find($id);
                    $result = $model->xeplich($model, $request);
                    if ($result) {
                        $jsonObj['success'] = true;
                        $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
                    } else {
                        $jsonObj['success'] = false;
                        $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
                    }
                }
            }
        } else {
            $model = ExaminationSchedule::find($id);
            $result = $model->xeplich($model, $request);
            if ($result) {
                $jsonObj['success'] = true;
                $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
            } else {
                $jsonObj['success'] = false;
                $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
            }
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
    public function confirm(Request $request)
    {
        $id = $request->id;
        $result =  ExaminationSchedule::find($id)->update(['status'=>ExaminationSchedule::STATUS_DOING]);
        if ($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    public function done(Request $request)
    {
        $id = $request->id;
        $schedule =  ExaminationSchedule::find($id);
        $result =  ExaminationSchedule::find($id)->update(['status'=>ExaminationSchedule::STATUS_DONE]);
        $count_schedule = ExaminationSchedule::where('order_id', $schedule->order_id)->where('status', '>', 0)->where('status', '<>', 4)->count();
        $count_done     = ExaminationSchedule::where('order_id', $schedule->order_id)->where('status', '=', ExaminationSchedule::STATUS_DONE)->count();

        if ($count_schedule == $count_done) {
            $order = Order::find($schedule->order_id);
            $result = Appointment::find($order->appointment_id)->update(['status' => 3]);
        }
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
