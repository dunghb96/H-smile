<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\feedback;
use App\Models\ExaminationSchedule;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use PDF;
class DashboardController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $date = Carbon::now();
        $date_now = date('Y-m-d');
        // doanh thu theo tháng hiện tại
        $appointment = Appointment::all();
        $total_appointment = Appointment::where('created_at', $date_now)->count();
        $confirm = ExaminationSchedule::where('status', '>', 0)->where('date_at', $date_now)->count();
        $waiting = Appointment::where('status', 1)->count();
        $doneAppoint = ExaminationSchedule::where('status', 2)->count();
        $day = Carbon::now()->day;
        $patient = Patient::where('status', 1)->get();
        $list = Appointment::orderBY('created_at')->get();

        $total_revenue_day = 0;
        $appointment_list_id_services = ExaminationSchedule::where('status', '>=', ExaminationSchedule::STATUS_DONE)->where('date_at', $date_now)->pluck('service_id')->toArray();
        foreach($appointment_list_id_services as $key => $service_id)
        {
            $list_id_services[$key] = explode(',', $service_id);
            $array_total_moneny[$key] = Service::whereIn('id', $list_id_services[$key])->pluck('price')->toArray();
        }
        if(isset($array_total_moneny)){
            foreach($array_total_moneny as $key => $total_moneny){
                $total_revenue_day += array_sum($total_moneny);
            }
        }
        $services = Service::where('status', 1)->get();
        foreach($services as $service){
            $list_schedule = ExaminationSchedule::where('date_at', '=', $date_now)->where('service_id', $service->id)->where('status', '>=', ExaminationSchedule::STATUS_DONE)->get();

            $count = $list_schedule->count();
            foreach($list_schedule as  $schedule){
                $service['total_moneny_service'] = $schedule->service->price * $count;
            }
        }
        $doctors = Employee::where('status','>',0)->where('type', 1)->get();
        foreach($doctors as $doctor){
            $list_schedule_doctor = ExaminationSchedule::where('date_at', '=', $date_now)->where('doctor_id', $doctor->id)->where('status', '>=', ExaminationSchedule::STATUS_DONE)->get();
            foreach($list_schedule_doctor as  $schedule){
                $doctor['total_moneny_doctor'] += $schedule->service->price;
            }
        }
        return view('backend.dashboard.index', compact('list', 'doctors',  'services', 'patient', 'total_appointment', 'confirm', 'waiting', 'doneAppoint', 'day', 'date', 'total_revenue_day'));
    }

    public function today()
    {
        $list = Appointment::all();
        $medicine = Medicine::all();

//        $jsonObj['data'] = $list;
//
//        $ser = $jsonObj['data'][0]->services;
//        $service = Service::find($ser)->name;
//        return response()->json($list[0]['status']);

        return view('backend.doctor.today', compact('medicine'));
    }

    public function today_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $list = ExaminationSchedule::where('date_at', '=', $now)->where('doctor_id',  $doctor->employee)->where('status', '>=', ExaminationSchedule::STATUS_WAITING)->orderBy('status')->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $jsonObj['data'][$key]->services = $row->service->name;
            $jsonObj['data'][$key]->doctor    = $row->doctors->name;
            $jsonObj['data'][$key]->patients  = $row->patient->full_name;
            $jsonObj['data'][$key]->phone     = $row->patient->phone_number;
            $jsonObj['data'][$key]->start_time = Carbon::parse($row->start_time)->format("H:i");
            $jsonObj['data'][$key]->status_name =  ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function future()
    {
        return view('backend.doctor.future');
    }

    public function future_json()
    {
        $doctor = Auth::guard('web')->user();
        $now = Date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($now . "+1 days"));
        $list = ExaminationSchedule::where('date_at', '=', $tomorrow)->where('doctor_id', $doctor->employee)->where('status', ExaminationSchedule::STATUS_WAITING)->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $jsonObj['data'][$key]->services = $row->service->name;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patients = $row->patient->full_name;
            $jsonObj['data'][$key]->phone = $row->patient->phone_number;
            $jsonObj['data'][$key]->start_time = Carbon::parse($row->start_time)->format("H:i");
            $jsonObj['data'][$key]->status_name = ExaminationSchedule::STATUS[$row->status];
        }
// dd($jsonObj);
        echo json_encode($jsonObj);
    }

    public function past()
    {
        return view('backend.doctor.past');
    }

    public function past_json()
    {
        $doctor = Auth::guard('web')->user();
        $list = ExaminationSchedule::where('doctor', $doctor->employee)->where('status', 2)->get();
        $jsonObj['data'] = $list;
        foreach ($list as $key => $row) {
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->service_id = $appointment->service->id;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $row->patients->full_name;
            $jsonObj['data'][$key]->patient_id = $appointment->patients->id;
            $jsonObj['data'][$key]->phone = $appointment->patients->phone_number;
            $jsonObj['data'][$key]->status_name = ExaminationSchedule::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function addMedicine(Request $request)
    {
        $id = $request->get('id');
        return response()->json([
            'id' => $id,
            'msg'=> 'success'
        ]);
    }

    function addMedicineNew(Request $request, $id)
    {
        $medicine = Medicine::all();
        $info = ExaminationSchedule::find($id);
        $prescription_use = Prescription::where('schedule_id', $id)->first();

        if ($prescription_use) {
            $medicine = explode(',', $prescription_use->medicine_id);
            $quantity = explode(',', $prescription_use->total_quantity);
            $detail   = explode(',', $prescription_use->detail);
            return view('backend.medicine.prescription_use' ,compact('prescription_use', 'medicine', 'quantity', 'detail'));
        } else {
            return view('backend.doctor.add_presciption', compact('medicine', 'info'));
        }
    }
    public function store(Request $request)
    {
        $list_medicine_id = implode(",", $request->medicine_id);
        $list_quantity = implode(",", $request->total_quantity);
        $list_detail = implode(",", $request->detail);

        $data_create = [
            'schedule_id'    => (int)$request->schedule_id,
            'medicine_id'    => $list_medicine_id,
            'total_quantity' => $list_quantity,
            'detail'         => $list_detail,
            'note'           => $request->note
        ];

        $prescription_use =  Prescription::create($data_create);
        $medicine = explode(',', $prescription_use->medicine_id);
        $quantity = explode(',', $prescription_use->total_quantity);
        $detail   = explode(',', $prescription_use->detail);
        return view('backend.medicine.prescription_use' ,compact('prescription_use', 'medicine', 'quantity', 'detail'));
    }

    public function editMedicine($id)
    {
        $medicine = Medicine::all();
        $pre = Prescription::find($id);
        $medicines = explode(',', $pre->medicine_id);
        $quantity = explode(',', $pre->total_quantity);
        $detail   = explode(',', $pre->detail);
        return view('backend.doctor.add_presciption', compact('medicine', 'pre', 'medicines', 'quantity', 'detail'));
    }

    public function storeEditMedicine(Request $request, $id)
    {
        $prescription_use = Prescription::find($id);
        $medicine = implode(',', $request->medicine_id);
        $quantity = implode(',', $request->total_quantity);
        $detail   = implode(',', $request->detail);
        $prescription_use->update([
            'medicine_id'       => $medicine,
            'total_quantity' => $quantity,
            'detail'        => $detail,
            'note'           => $request->note
            ]);
        $medicine = explode(',', $medicine);
        $quantity = explode(',', $quantity);
        $detail   = explode(',', $detail);
        return view('backend.medicine.prescription_use', compact('medicine', 'prescription_use', 'quantity', 'detail'));
    }

    public function prescriptionPdf()
    {
        $data = [
            'title' => 'Đơn thuốc #000',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('backend.medicine.prescriptionPdf', $data);
        return $pdf->download('Don-thoc.pdf');
    }

    function inMedicine($id) 
    {
        $prescription_use =  Prescription::find($id);
        $medicine = explode(',', $prescription_use->medicine_id);
        $quantity = explode(',', $prescription_use->total_quantity);
        $detail   = explode(',', $prescription_use->detail);
        return view('backend.medicine.in-medicine' ,compact('prescription_use', 'medicine', 'quantity', 'detail'));
    }

}
