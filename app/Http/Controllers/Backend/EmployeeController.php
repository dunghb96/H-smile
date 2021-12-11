<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $roles  = Role::orderBy('name')->get();
        return view('backend.employee.index',compact('roles'));
    }

    public function json()
    {
        $jsonObj['data'] = Employee::where('status','1')->orderBy('created_at', 'DESC')->get();
        echo json_encode($jsonObj);
    }

    public function add(Request $request) 
    {
        $model = new Employee();
        $model->saveemployee($model,$request);
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
        $employee = Employee::find($id);
        echo json_encode($employee);
    }

    public function edit(Request $request) 
    {
        $id = $request->input('id');
        $model = Employee::find($id);
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
        $model = Employee::find($id);
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
