<?php

namespace App\Http\Controllers\Backend;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends BaseController
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        $service_category = ServiceCategory::all();
        $status = ServiceCategory::STATUS;
        return view('backend.service_category.index', compact('service_category', 'status'));
    }

    public function json()
    {
        $list = ServiceCategory::where('status', '>' ,0)->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $row) {
            $jsonObj['data'][$key]->status_word = ServiceCategory::STATUS[$row->status];
        }
        echo json_encode($jsonObj);
    }

    public function add(Request $request)
    {
        $data = [
            'name'   => $request->name,
            'slug'   => Str::slug($request->name, '-'),
            'status' => 1
        ];
        $result = ServiceCategory::create($data);
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
        $jsonObj = ServiceCategory::find($id);
        echo json_encode($jsonObj);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $model = ServiceCategory::find($id);
        $data = [
            'name'   => $request->name,
            'slug'   => Str::slug($request->name, '-')
        ];
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
        $model = ServiceCategory::find($id);
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
