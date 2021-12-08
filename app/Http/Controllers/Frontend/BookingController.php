<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingPostRequest;
use App\Models\Appointment;
use App\Models\Patients;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postData(Request $request)
    {
        $request->validate(
            [
                'date' =>'required|date',
                'name'=>'required',
                'age'=>'required|numeric|',
                'phone'=>'required|max:10',
                'gender'=>'required',
                'email'=>'required|email',
                'service'=>'required',
                'doctor'=>'required',
            ],
            [
                'date.required' => 'Hãy nhập date',
                'name.required' => 'Hãy nhập tên tài khoản',
                'email.required' => 'Hãy nhập email cho tài khoản',
                'email.email' => 'Không đúng định dạng email',
            ]
        );

        $dataPatient = [
            'full_name' =>$request->name,
            'gender' =>$request->gender,
            'age' =>$request->age,
            'email' =>$request->email,
            'phone_number' =>$request->phone,
            'status_desc' =>$request->form_description,
            'full_name' =>$request->name,
            'patient_code'=>random_int(10000,99999),
        ];
        $newPatient = Patients::create($dataPatient);
        $dataAppointment = [
            'patient_id' =>$newPatient->id,
            'doctor_id' =>$request->doctor,
            'service_id' =>$request->service,
            'appointment_date' =>$request->date,
            'shift_time' =>1,
            'status'=>0,
            'status_notification' => 2
        ];
        $newBooking = Appointment::create($dataAppointment);
        dd($newBooking);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
