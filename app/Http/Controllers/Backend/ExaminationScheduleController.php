<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use App\Models\ExaminationSchedule;
use Illuminate\Http\Request;

class ExaminationScheduleController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $services = Service::where('status',1)->get();
        // $roles = Role::orderBy('name')->get();
        return view('backend.examination-schedule.index');
    }

    public function json()
    {
        $list = ExaminationSchedule::where('status','1')->orderBy('created_at', 'DESC')->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row){
            $appointment = Appointment::find($row->appointment);
            $jsonObj['data'][$key]->service = $appointment->service->name;
            $jsonObj['data'][$key]->doctor = $row->doctors->name;
            $jsonObj['data'][$key]->patient = $appointment->patients->full_name;
            // $jsonObj['data'][$key]->full_name = $row->patients->full_name;
            // $jsonObj['data'][$key]->age       = $row->patients->age;
            // $jsonObj['data'][$key]->services = $row->service->name;
            $jsonObj['data'][$key]->shift_name =  ExaminationSchedule::SHIFT[$row->shift];
        }
        echo json_encode($jsonObj);
    }

    public function add(Request $request) 
    {
        $model = new ExaminationSchedule();
        $result = $model->saveEmployee($model, $request);
        if($result){
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
        $id = $request->id;
        $employee = ExaminationSchedule::find($id);
        echo json_encode($employee);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $model = ExaminationSchedule::find($id);
        $model->saveEmployee($model,$request);
        if($model->save()){
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        } 
        echo json_encode($jsonObj);
    }

    public function del(Request $request)
    {
        $id = $request->input('id');
        $model = ExaminationSchedule::find($id);
        $model->status = 0;
        $result = $model->save();
        if($result){
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        } 
        echo json_encode($jsonObj);
    }
    
}
