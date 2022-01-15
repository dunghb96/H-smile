<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\examinationSchedule;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $customers = Patient::where('status','1')->get();
        $doctor = Employee::where('type',1)->get();
        return view('backend.appointment.index',compact('services', 'doctor', 'customers'));
    }

    public function orderDetail()
    {
        return view('backend.appointment.order-detail');
    }

    public function orderPrint()
    {
        return view('backend.appointment.order-print');
    }

    function loadOrder(Request $request)
    {
        $jsonObj = [];
        $appointment_id = $request->appointment_id;
        
        $jsonObj = Order::where('appointment_id', $appointment_id)->first();
        $staff_id = $jsonObj->staff_id;
        if($staff_id>0) {
            $staff = Employee::find($staff_id);
            $jsonObj['staff_name'] = $staff->name;
        }
        $customer_id = $jsonObj->customer_id;
        $customer = Patient::find($customer_id);
        $jsonObj['customer_name'] = $customer->full_name;
        $jsonObj['customer_phone'] = $customer->phone_number;
        $jsonObj['customer_email'] = $customer->email;
        $jsonObj['customer_address'] = $customer->address;
        $jsonObj['create_at'] = Carbon::parse($jsonObj->create_at)->format('d/m/Y H:i:s');
        echo json_encode($jsonObj);
    }

    function loadOrderDetail(Request $request) {
        $jsonObj = [];
        $orderDetail = OrderDetail::where('order_id', $request->order_id)->get();
        foreach($orderDetail as $key => $item) {
            $jsonObj[$key]['stt'] = $key+1;
            $service_id = $item->service_id;
            $service = Service::find($service_id);
            $jsonObj[$key]['service_name'] = $service->name;
            $jsonObj[$key]['service_price'] = number_format($service->price);
            $jsonObj[$key]['service_time'] = $service->time;
        }
        echo json_encode($jsonObj);
    }

    public function json()
    {
        $list = Appointment::with('patients', 'service', 'doctor')->where('status', '>', '0')->orderBY('created_at')->get();
        $jsonObj['data'] = $list;

        foreach ($list as $key => $row) {
            $arrService = explode(',',$row->services);
            $listName = '';
            foreach($arrService as  $row2) {
                $listName .=  Service::find($row2)->name.'</br>';
            }
            $listName = rtrim($listName, '</br>');
            $jsonObj['data'][$key]->date = date("d/m/Y", strtotime(str_replace('/', '-', $row->date)));
            $jsonObj['data'][$key]->list_service = $listName;
            $jsonObj['data'][$key]->shift = Appointment::SHIFT[$row->shift];
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

    // function addSchedule(Request $request)
    // {
    //     $patientid = $request->patient_id;
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
    //     $result1 = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('status','=','1')->get();
    //     $result2 = ExaminationSchedule::where('doctor',$doctor)->whereDate('date_at',$dateat)->where('time_at',$timeat)->where('status','=','1')->get();
    //     if($result1->count() > 3) {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Không còn lịch trống';
    //         echo json_encode($jsonObj);
    //     } else if ($result2->count() > 0) {
    //         $jsonObj['success'] = false;
    //         $jsonObj['msg'] = 'Lịch hẹn đã tồn tại';
    //         echo json_encode($jsonObj);
    //     } else {
    //         $model = new Appointment();
    //         $schedule = new ExaminationSchedule();
    //         $result = $model->saveExaminationSchedule($schedule, $data);

    //         if ($result) {
    //             $model = Appointment::find($appointment);
    //             $model->status = 2;
    //             $result = $model->save();
    //             if ($result) {
    //                 $jsonObj['success'] = true;
    //                 $jsonObj['msg'] = 'Tạo lịch khám thành công';

    //                 //            gui mail thong bao lich kham
    //                 $patientSelected = Patient::find($patientid);
    //                 $serviceSelected = Service::find(Appointment::find($appointment)->service_id);
    //                 $doctorSelected = Employee::find(Appointment::find($appointment)->doctor_id);

    //                 $to_name = "H-smile";
    //                 $to_email = $patientSelected->email;
    //                 $data = array("patientName" => $patientSelected, "serviceSelected" => $serviceSelected, "doctorSelected" => $doctorSelected, "time_at" => $timeat, "dateSelected" => $dateat);
    //                 Mail::send('frontend.mail.notificationMail', $data, function ($message) use ($to_name, $to_email) {
    //                     $message->to($to_email)->subject('Lịch hẹn khám ');
    //                     $message->from($to_email, $to_name);
    //                 });
    //             }
    //         } else {
    //             $jsonObj['success'] = false;
    //             $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
    //         }
    //         echo json_encode($jsonObj);
    //     }
    // }

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

    public function add(Request $request)
    {
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $data = [
            'customer_id' => $request->customer_id,
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
        $result = Appointment::create($data);
        if ($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    public function edit(Request $request)
    {
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $data = [
            'customer_id' => $request->customer_id,
            'name' => $request->fullname,
            'age' => $request->age,
            'phone_number' => $request->phonenumber,
            'email' => $request->email,
            'services' => implode(",",$request->service),
            'date' => $dateat,
            'shift' => $request->shift,
            'address' => $request->address,
            'gender' => $request->gender,
            'note' => $request->note
        ];
        $id = $request->id;
        $model = Appointment::find($id);
        $result = $model->update($data);
        if ($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }

    public function xacnhan(Request $request)
    {
        // Thêm khách hàng mới
        if(!$request->customer>0) {
            $customer = [
                'full_name' => $request->fullname,
                'age' => $request->age,
                'phone_number' => $request->phonenumber,
                'email' => $request->email,
                'address' => $request->address,
                'gender' => $request->gender,
                'status' => 1
            ];
            $result = Patient::create($customer);
            $customer_id = $result->id;
        } else {
            $customer_id = $request->customer_id;
        }
        
        // Update lịch hẹn
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $data = [
            'staff_id' => Auth::user()->id,
            'customer_id' => $request->customer_id,
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
            'status' => 2
        ];
        $id = $request->id;
        $model = Appointment::find($id);
        $result = $model->update($data);
        
        // Tạo đơn hàng
        $total_price = 0;
        $total_time = 0;
        foreach($request->service as $service) {
            $service = Service::find($service);
            $total_price += $service->price;
            $total_time += $service->time;
        }
        $order = [
            'customer_id' => $customer_id,
            'appointment_id' => $id,
            'total_price' => $total_price,
            'total_time' => $total_time,
            'status' => 1
        ];
        $order = Order::create($order);

        // Tạo đơn hàng chi tiết
        $order_id = $order->id;
        foreach($request->service as $service) {
            $orderDetail = [
                'order_id' => $order_id,
                'service_id' => $service,
                'status' => 1
            ];
            $result = OrderDetail::create($orderDetail);
        }
        //Tạo lịch khám trạng thái chờ
        foreach($request->service as $service) {
            $schedule = [
                'customer_id' => $customer_id,
                'order_id' => $order_id,
                'service_id' => $service,
                'date_at' => $dateat,
                'note' => $request->note,
                'status' => 1
            ];
            $result = ExaminationSchedule::create($schedule);
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

    public function loaddata(Request $request)
    {
        $jsonObj = [];
        $id = $request->id;
        $jsonObj = Appointment::find($id);
        $jsonObj['patient'] = $jsonObj->name;
        $jsonObj['age'] = $jsonObj->age;
        $jsonObj['phone_number'] = $jsonObj->phone_number;
        $jsonObj['email'] = $jsonObj->email;
        $jsonObj['date'] = Carbon::parse($jsonObj->date)->format('Y-m-d');
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
