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
        $services = Service::where('status','1')->where('parent_id', '>', '0')->get();
        $doctor = Employee::where('type',1)->get();
        return view('backend.appointment.index',compact('services', 'doctor'));
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service', 'doctor')->where('status', '>', '0')->orderBY('created_at')->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $jsonObj['data'][$key]->full_name = $row->patients->full_name;
            if($row->patients->email) {
                $jsonObj['data'][$key]->email = $row->patients->email;
            } else {
                $jsonObj['data'][$key]->email = '';
            }

            if($row->patients->phone_number) {
                $jsonObj['data'][$key]->phone = $row->patients->phone_number;
            } else {
                $jsonObj['data'][$key]->email = '';
            }


            $jsonObj['data'][$key]->services = $row->service->name;
            $jsonObj['data'][$key]->shift = Appointment::SHIFT[$row->shift];
            $jsonObj['data'][$key]->doctor_name = $row->doctor->name;
            $jsonObj['data'][$key]->status_word = Appointment::STATUS[$row->status];
        }
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

        $result1 = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('status','>','0')->get();
        $result2 = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('time_at',$timeat)->where('status','>','0')->get();
        if($result1->count() > 3) {

            $result = ExaminationSchedule::where('doctor', $doctor)->whereDate('date_at', $dateat)->where('time_at', $timeat)->where('status', '>', '0')->get();
            if ($result->count() > 3) {

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


//            //gui mail thong bao lich kham
//            $serviceSelected  = Service::find($appointment->service_id);
//            $patient = Patient::find($patientid);
//            $to_name = "H-smile";
//            $to_email = $patient->email;
//            $data = array("$patient" => $patient->name,"serviceSelected" => $serviceSelected->name,"dateSelected" => $dateat, 'doctor' => $doctor, 'time_at' => $timeat);
//            Mail::send('frontend.mail.notificationMail.blade.php', $data, function ($message) use ($to_name, $to_email) {
//                $message->to($to_email)->subject('Nha Khoa H-Smile đã tiếp nhận yêu cầu đặt lịch của quý khách');
//                $message->from($to_email, $to_name);
//            });


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
        }}


    public function del(Request $request)
    {
        $id = $request->id;
        $model = Appointment::find($id);
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

    public function save(Request $request)
    {

        $dataPatient = [
            'full_name' => $request->fullname,
            'age' => $request->age,
            'phone_number' => $request->phonenumber,
            'email' => $request->email,
            'status' => 1
        ];
        $result1 = Patient::create($dataPatient);
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $dataApp = [
            'service_id' => $request->service,
            'doctor_id' => $request->doctor,
            'date_at' => $dateat,
            'shift' => $request->shift,
            'note' => $request->note,
            'patient_id' => $result1->id,
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
