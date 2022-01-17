<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee;
use App\Models\ExaminationSchedule;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        // $order = Order::where('status','>','0')->get();
        return view('backend.order.index');
    }

    public function json()
    {
        $orders = Order::where('status','>','0')->get();
        $jsonObj['data'] = Order::where('status','>','0')->get();
        foreach($orders as $key => $item) {
            $customer_id = $item->customer_id;
            $customer = Patient::find($customer_id);
            $jsonObj['data'][$key]['customer_name'] = $customer->full_name;
            $services_name = '';
            $orderDetail = OrderDetail::where('order_id',$item->id)->get();
            foreach($orderDetail as $detail) {
                $service_id = $detail->service_id;
                $service = Service::find($service_id);
                $services_name .= $service->name.'</br>';
            }
            $services_name = rtrim($services_name,'</br>');
            $jsonObj['data'][$key]['services_name'] = $services_name;
            $jsonObj['data'][$key]['total_time'] = $item->total_time .' phút';
            $jsonObj['data'][$key]['total_price'] = number_format($item->total_price) . " VNĐ";
            if($item->status==1)
                $jsonObj['data'][$key]['status_name'] = "Chưa thanh toán";
            else 
                $jsonObj['data'][$key]['status_name'] = "Đã thanh toán";
        }
        echo json_encode($jsonObj);
    }

    public function orderDetail()
    {
        $doctors = Employee::where('type', 1)->get();
        return view('backend.order.order-detail',compact('doctors'));
    }

    public function orderPrint()
    {
        return view('backend.order.order-print');
    }

    function loadOrder(Request $request)
    {
        $jsonObj = [];
        // $appointment_id = isset($request->appointment_id) ? $request->appointment_id : 0;
        // if($appointment_id > 0) {
        //     $jsonObj = Order::where('appointment_id', $appointment_id)->first();
        //     $staff_id = isset($jsonObj->staff_id) ? $jsonObj->staff_id : 0;
        //     if ($staff_id > 0) {
        //         $staff = Employee::find($staff_id);
        //         $jsonObj['staff_name'] = $staff->name;
        //     } else {
        //         $jsonObj['staff_name'] = '';
        //     }
        //     $jsonObj['total_price'] = number_format($jsonObj->total_price);
        //     $customer_id = $jsonObj->customer_id;
        //     $customer = Patient::find($customer_id);
        //     $jsonObj['customer_name'] = $customer->full_name;
        //     $jsonObj['customer_phone'] = $customer->phone_number;
        //     $jsonObj['customer_email'] = $customer->email;
        //     $jsonObj['customer_address'] = $customer->address;
        //     $jsonObj['create_at'] = Carbon::parse($jsonObj->create_at)->format('d/m/Y H:i:s');
        // }

        $order_id = isset($request->order_id) ? $request->order_id : 0;
        if($order_id > 0) {
            $jsonObj = Order::find($order_id); 
            $staff_id = isset($jsonObj->staff_id) ? $jsonObj->staff_id : 0;
            if ($staff_id > 0) { 
                $staff = Employee::find($staff_id); 
                $jsonObj['staff_name'] = $staff->name;
            } else { 
                $jsonObj['staff_name'] = '';
            } 
            $jsonObj['total_price'] = number_format($jsonObj->total_price);
            $customer_id = $jsonObj->customer_id;
            $customer = Patient::find($customer_id);
            $jsonObj['customer_name'] = $customer->full_name;
            $jsonObj['customer_phone'] = $customer->phone_number;
            $jsonObj['customer_email'] = $customer->email;
            $jsonObj['customer_address'] = $customer->address;
            $jsonObj['create_at'] = Carbon::parse($jsonObj->create_at)->format('d/m/Y H:i:s');
        }
        
        echo json_encode($jsonObj);
    }

    function loadOrderDetail(Request $request)
    {
        $jsonObj = [];
        $orderDetail = ExaminationSchedule::where('order_id', $request->order_id)->get();
        foreach ($orderDetail as $key => $item) {
            $jsonObj[$key]['order_id'] = $item->order_id;
            $jsonObj[$key]['service_id'] = $item->service_id;
            $jsonObj[$key]['stt'] = $key + 1;
            $jsonObj[$key]['schedule_status'] = $item->status;
            $service_id = $item->service_id;
            $service = Service::find($service_id);
            $jsonObj[$key]['service_name'] = $service->name;
            $jsonObj[$key]['service_price'] = number_format($service->price);
            $jsonObj[$key]['service_time'] = $service->time;
        }
        echo json_encode($jsonObj);
    }

    function henlai(Request $request) { 
        $order_id = $request->order_id;
        $order = Order::find($order_id);
        $jsonObj['patient_code'] = $order->patient_code;
        $customer_id = $order->customer_id;
        $customer = Patient::find($customer_id);
        $service_id = $request->service_id;
        $service = Service::find($service_id);
        $jsonObj['service_name'] = $service->name;
        $jsonObj['service_time'] = $service->time;
        $jsonObj['customer_name'] = $customer->full_name;
        $jsonObj['phone_number'] = $customer->phone_number;
        $jsonObj['date_at'] = date('d/m/Y');
        echo json_encode($jsonObj);
    }

    function saveHL(Request $request) 
    {
        $dateat = (isset($request->date_at) && $request->date_at != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->date_at))) : date("Y-m-d");
        $service_id = $request->service_id;
        $service = Service::find($service_id);
        $service_time = $service->time;
        $service_price = $service->price;
        $order = [
            'patient_code' => $request->patient_code,
            'customer_id' => $request->customer_id,
            'total_price' => $service_price,
            'total_time' => $service_time,
            'pay_content' => "hsmile " . random_int(1000000,9999999999),
            'status' => 1
        ];
        $order = Order::create($order);
        $order_id = $order->id;
        $orderDetail = [
            'order_id' => $order_id,
            'service_id' => $service_id,
            'status' => 1
        ];
        $order = OrderDetail::create($orderDetail);
        
        $schedule = [
            'order_id' => $order_id,
            'customer_id' => $request->customer_id,
            'doctor_id' => $request->doctor_id,
            'service_id' => $request->service_id,
            'date_at' => $dateat,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'note' => $request->note,
            'status' => 2
        ];
        $start_time = date("Y-m-d H:i:s", strtotime($dateat . " " . $request->start_time .":00"));
        $end_time = date("Y-m-d H:i:s", strtotime($dateat . " " . $request->end_time .":00"));
        $data = ExaminationSchedule::where('date_at', 'LIKE', $dateat)->where('doctor_id', $request->doctor_id)->whereIn('status', ['2','3'])->get();
        if (count($data)>0) {
            foreach ($data as $item) {
                $startTime = date("Y-m-d H:i:s", strtotime($item['date_at'] . " " . $item['start_time']));
                $endTime = date("Y-m-d H:i:s", strtotime($item['date_at'] . " " . $item['end_time']));
                if ($start_time < $startTime && $start_time > $endTime) {
                    $jsonObj['success'] = false;
                    $jsonObj['msg'] = 'Bác sĩ đã có lịch khám trong khung giờ này!';
                    echo json_encode($jsonObj);
                    return false;
                }
                if ($start_time >= $startTime && $start_time < $endTime) {
                    $jsonObj['success'] = false;
                    $jsonObj['msg'] = 'Bác sĩ đã có lịch khám trong khung giờ này!';
                    echo json_encode($jsonObj);
                    return false;
                } 
            }
            $result = ExaminationSchedule::create($schedule);
            if ($result) {
                $jsonObj['success'] = true;
                $jsonObj['msg'] = 'Tạo lịch tái khám thành công';
            } else {
                $jsonObj['success'] = false;
                $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
            }
        } else {
            $result = ExaminationSchedule::create($schedule);
            if ($result) {
                $jsonObj['success'] = true;
                $jsonObj['msg'] = 'Tạo lịch tái khám thành công';
            } else {
                $jsonObj['success'] = false;
                $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
            }
        }
        echo json_encode($jsonObj);
    }

    function thanhtoan(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->staff_id = Auth::user()->id;
        $order->status = 2;
        $result = $order->save();
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
