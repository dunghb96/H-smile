<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $doctors = Employee::where('type','1')->where('status','1')->get();
        $services = Service::where('status','1')->get();
        return view('frontend.appointment.index',compact('doctors','services'));
    }

    public function booking(Request $request)
    {
        $dataPatient = [
            'full_name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status_desc' =>  $request->description,
            'status'=> 1
        ];
        $newPatient = Patient::create($dataPatient);

        $dataAppointment = [
            'patient_id' => $newPatient->id,
            // 'doctor_id' => 1,
            'service_id' => $request->service,
            // 'date_at' =>  Carbon::parse($request->date_at)->format('Y-m-d'),
            // 'time_at' => Carbon::parse($request->time_at)->format('H:i'),
            'status'=> 1,
            'status_notification' => 1,

        ];
        $newBooking = Appointment::create($dataAppointment);

        $email = $request->email;

        $data = [
            'name' => $request->name,
        ];

        Mail::send('frontend.mail.sendMail', $data, function ($mes) use ($email) {

            $mes->from('nguyenthvu9898@gmail.com');

            $mes->to($email, 'frontend.mail.sendMail')->subject('Mail công việc');
        });

        return redirect()->route('hsmile.appointment')->with(['status' => 'success', 'flash_message' => 'Đặt lịch hẹn thành công!']);
    }

        return redirect()->route('hsmile.appointment')->with(['status' => 'success', 'flash_message' => 'Đặt lịch hẹn thành công!']);
    }

    function getDoctor(Request $request)
    {
        $service = $request->service;
        $jsonObj = Employee::where('status',1)->where('type',1)->where('services', 'like', '%'.$service.'%')->get();
        echo json_encode($jsonObj);
    }
}
