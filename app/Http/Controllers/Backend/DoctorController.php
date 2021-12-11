<?php

namespace App\Http\Controllers\Backend;

use App\Models\Doctor;
use App\Models\Employee;
use Illuminate\Http\Request;

class DoctorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $doctors = Doctor::where('status',0)->orderBy('id', 'ASC')->get();
        return view('backend.doctor.index');
    }

    public function json()
    {
        $jsonObj['data'] = Employee::where('type','1')->where('status','1')->orderBy('created_at', 'DESC')->get();
        echo json_encode($jsonObj);
    }

    public function add(Request $request) 
    {
        $model = new Doctor();
        $model->saveDoctor($model,$request);
        if($model->save()){
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        } 
        echo json_encode($jsonObj);
    }

    public function loaddata($id)
    {
        $doctor = Doctor::find($id);
        echo json_encode($doctor);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $model = Doctor::find($id);
        $model->saveDoctor($model,$request);
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
        $model = Doctor::find($id);
        $model->status = 0;
        if($model->save()){
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        } 
        echo json_encode($jsonObj);
    }
}
