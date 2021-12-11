<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Patients;
use App\Models\Service;
use Illuminate\Http\Request;

class ApppointmentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        $doctors = Employee::where('type','1')->where('status','1')->get();
        $services = Service::where('status','1')->get();
        return view('frontend.apppointment.index',compact('doctors','services'));
    }

    public function booking(Request $request) 
    {
        $dataPatient = [
            'full_name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status'=> 1
        ];
        $newPatient = Patients::create($dataPatient);

        $dataAppointment = [
            'patient_id' => $newPatient->id,
            'doctor_id' => $request->doctor,
            'service_id' => $request->service,
            // 'date_at' => $request->date_at,
            'time_at' => $request->time_at,
            'description' => $request->description,
            'status'=> 1
        ];
        $newBooking = Appointment::create($dataAppointment);

        return redirect()->route('hsmile.apppointment')->with(['status' => 'success', 'flash_message' => 'Đặt lịch hẹn thành công!']);
        // if($model->save()){
        //     $jsonObj['success'] = true;
        //     $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        // } else {
        //     $jsonObj['success'] = false;
        //     $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        // } 
    }
}
