<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Appointment;
use App\Models\AppointmentServices;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // dd(Cookie::get('patient_code'));
        // Cookie::queue(Cookie::forget('patient_code'));
        $doctors = Employee::where('type','1')->where('status','1')->get();
        $services = Service::where('status','1')->where('category_id', '>', '0')->get();
        return view('frontend.appointment.index',compact('doctors','services'));
    }

    public function sendSmsNotificaition(Request $request)
    {
        $basic = new \Vonage\Client\Credentials\Basic("c81f1ad7", "1Wgm12n3DtgkGK5h");
        $client = new \Vonage\Client($basic);
        $randomOtp = random_int(1000, 9999);

        $phoneNumberRequest = $request->input("phone_number");

        if ($phoneNumberRequest[0] == "0") {
            $phoneNumberRequest = str_replace("$phoneNumberRequest[0]", "84", $phoneNumberRequest);
        }

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phoneNumberRequest, "HSMILE", $randomOtp)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        session(['otp' => $randomOtp]);
    }


    public function booking(Request $request)
    {
            $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
            $dataApp = [
                'patient_code' => Cookie::get('patient_code') !== null ? Cookie::get('patient_code') : random_int(100000000, 999999999),
                'name' => $request->name,
                // 'age' => $request->age,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'services' => implode(",", $request->service),
                'date' => $dateat,
                'shift' => $request->shift,
                // 'address' => $request->address,
                // 'gender' => $request->gender,
                'note' => $request->note,
                'status' => 1
            ];
            // echo Cookie::get('patient_code');
            $result = Appointment::create($dataApp);
            $appointment_id = $result->id;
            $data = Patient::where('full_name','LIKE', $request->name)->where('phone_number','LIKE', $request->phone_number)->where('status','>',0)->first();
            if($data) {
                $customer_id = $data->id;
                $model = Appointment::find($appointment_id);
                $data = ['customer_id' => $customer_id];
                $model->update($data);
            }
            if (Cookie::get('patient_code') == null) {
                Cookie::queue('patient_code', $dataApp['patient_code'], 99999999999);
            }

            //Set cookie

            $serviceSelected = Service::whereIn('id', $request->service)->get();
            if ($request->shift = 1) {
                $shiftSelected = "Ca sáng";
            } else {
                $shiftSelected = "Ca chiều";
            }
            $list_name = '';
            foreach ($serviceSelected as $row) {
                $list_name .= $row->name . ', ';
            }

            // $to_name = "H-smile";
            // $to_email = $request->email;
            // $data = array(
            //     "name" => $request->name,
            //     "serviceSelected" => rtrim($list_name, ', '),
            //     "dateSelected" => Carbon::parse($request->date_at)->format('Y-m-d'),
            //     "shiftName" => $shiftSelected,
            //     "descRequest" => $request->description
            // );
            // Mail::send('frontend.mail.sendmail', $data, function ($message) use ($to_name, $to_email) {
            //     $message->to($to_email)->subject('Nha Khoa H-Smile đã tiếp nhận yêu cầu đặt lịch của quý khách');
            //     $message->from($to_email, $to_name);
            // });


            // $email = $request->email;

            // $data = [
            //     'name' => $request->name,
            // ];

            // Mail::send('frontend.mail.sendMail', $data, function ($mes) use ($email) {

            //     $mes->from('nguyenthvu9898@gmail.com');

            //     $mes->to($email, 'frontend.mail.sendMail')->subject('Mail công việc');
            // });


            $alert = "Đặt lịch thành công! Hãy kiểm tra email để biết chi tiết thông tin đặt lịch";
        // } else {
        //     $alert = 'Sai mã OTP';
        // }


        return redirect()->route('hsmile.appointment')->with('alert', $alert);


    }

    //     return redirect()->route('hsmile.appointment')->with(['status' => 'success', 'flash_message' => 'Đặt lịch hẹn thành công!']);
    // }

    function getDoctor(Request $request)
    {
        $service = $request->service;
        $jsonObj = Employee::where('status', 1)->where('type', 1)->where('services', 'like', '%' . $service . '%')->get();
        echo json_encode($jsonObj);
    }
}
