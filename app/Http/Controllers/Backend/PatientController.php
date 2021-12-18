<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExaminationSchedule;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class PatientController extends BaseController
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        $patient = Patient::where('status','1')->get();
        return view('backend.patient.index', compact('patient'));
    }

    public function json()
    {
        $jsonObj['data'] = Patient::where('status','1')->get();
        echo json_encode($jsonObj);
    }

    public function loaddata(Request $request)
    {
        $id = $request->id;
        $jsonObj = Patient::find($id);
        echo json_encode($jsonObj);
    }

    function loadhistory(Request $request)
    {
        $id = $request->id;
        $jsonObj = ExaminationSchedule::where('patient_id',$id)->get();
        echo json_encode($jsonObj);
    }

    public function add(Request $request)
    {
        $model = new Service();
        $result = $model->saveService($model, $request);
        if($result) {
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
        $id = $request->id;
        $model = service::find($id);
        $result = $model->saveService($model, $request);
        if($result) {
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
        $id = $request->id;
        $model = service::find($id);
        $model->status = 0;
        $result = $model->save();
        if($result) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }
}
