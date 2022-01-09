<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\examinationSchedule;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends BaseController
{
    function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        $services = Service::where('status','1')->where('category_id', '>', '0')->get();
        $doctor = Employee::where('type',1)->get();
        return view('backend.appointment.index',compact('services', 'doctor'));
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service', 'doctor')->where('status', '>', '0')->orderBY('created_at')->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $arrService = explode(',',$row->services);
            $services = Service::whereIn('id', $arrService)->pluck('name');
            // foreach($services as $key2 => $row2) {
            //     $jsonObj['data2'][$key2]->service .= $row2.'</br>';
            // }
            // dd($jsonObj);
            $jsonObj['data'][$key]->shift = Appointment::SHIFT[$row->shift];
            $jsonObj['data'][$key]->status_word = Appointment::STATUS[$row->status];
        }
        // dd($jsonObj);
        echo json_encode($jsonObj);
    }

    function getDoctor(Request $request)
    {
        $service = $request->service;
        $jsonObj = Employee::where('status', 1)->where('type', 1)->where('services', 'like', '%' . $service . '%')->get();
        echo json_encode($jsonObj);
    }

    function addSchedule(Request $request)
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
        $result1 = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('status','=','1')->get();
        $result2 = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('time_at',$timeat)->where('status','=','1')->get();
        if($result1->count() > 3) {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Không còn lịch trống';
            echo json_encode($jsonObj);
        } else if ($result2->count() > 0) {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Lịch hẹn đã tồn tại';
            echo json_encode($jsonObj);
        } else {
            $model = new Appointment();
            $schedule = new ExaminationSchedule();
            $result = $model->saveExaminationSchedule($schedule, $data);


            if ($result) {
                $model = Appointment::find($appointment);
                $model->status = 2;
                $result = $model->save();
                if ($result) {
                    $jsonObj['success'] = true;
                    $jsonObj['msg'] = 'Tạo lịch khám thành công';

                    //            gui mail thong bao lich kham
                    $patientSelected = Patient::find($patientid);
                    $serviceSelected = Service::find(Appointment::find($appointment)->service_id);
                    $doctorSelected = Employee::find(Appointment::find($appointment)->doctor_id);


                    $to_name = "H-smile";
                    $to_email = $patientSelected->email;
                    $data = array("patientName" => $patientSelected, "serviceSelected" => $serviceSelected, "doctorSelected" => $doctorSelected, "time_at" => $timeat, "dateSelected" => $dateat);
                    Mail::send('frontend.mail.notificationMail', $data, function ($message) use ($to_name, $to_email) {
                        $message->to($to_email)->subject('Lịch hẹn khám ');
                        $message->from($to_email, $to_name);
                    });


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
        $model->status = 0;
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

    public function save(Request $request)
    {
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $dataApp = [
            'staff_id' => 2,
            'name' => $request->fullname,
            'age' => $request->age,
            'phone_number' => $request->phonenumber,
            'email' => $request->email,
            'services' => implode(",",$request->service),
            'date' => $dateat,
            'shift' => $request->shift,
            'address' => $request->address,
            'gender' => $request->gender,
            'note' => $request->note,
            'status' => 1
        ];
        $result = Appointment::create($dataApp);
        if ($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    public function loaddata(Request $request)
    {
        $jsonObj = [];
        $id = $request->id;
        $jsonObj = Appointment::find($id);
        $model = Patient::find($jsonObj->patient_id);
        $jsonObj['patient'] = $model->full_name;
        $jsonObj['age'] = $model->age;
        $jsonObj['phone_number'] = $model->phone_number;
        $jsonObj['email'] = $model->email;
        $jsonObj['date_at'] = Carbon::parse($model->date_at)->format('Y-m-d');
        echo json_encode($jsonObj);
    }

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
