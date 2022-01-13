<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{


    public function index()
    {
        $medicines = Medicine::all();
        return view('backend.medicine.index', compact('medicines'));
    }

    public function json()
    {
        $list = Medicine::all();
        $jsonObj['data'] = $list;
        echo json_encode($jsonObj);
    }

    public function add(Request $request)
    {
        $data = [
            'name' => $request->name
        ];
        $result = Medicine::create($data);
        if($result) {
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
        $jsonObj = Medicine::find($id);
        echo json_encode($jsonObj);
    }

    public function edit(Request $request)
    {
        $data = [
            'name' => $request->name
        ];
        $id = $request->id;
        $model = Medicine::find($id);
        $result = $model->update($data);
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
        $model = Medicine::find($id);
        $result = $model->delete();
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
