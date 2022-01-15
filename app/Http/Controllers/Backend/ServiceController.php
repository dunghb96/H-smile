<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ServiceController extends BaseController
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        $service_category = ServiceCategory::where('status', 1)->get();
        $status = Service::STATUS_2;
        return view('backend.service.index', compact('service_category', 'status'));
    }

    public function json()
    {
        $list = Service::where('status', '>', 0)->orderBy('category_id')->get();
        $jsonObj['data'] = $list;
        foreach($list as $key => $value) {
            $jsonObj['data'][$key]->price = number_format($value->price).' VND';
            $jsonObj['data'][$key]->time = $value->time.' phút';
            $jsonObj['data'][$key]->category = $value->ServiceCategory->name;
            $jsonObj['data'][$key]->status = Service::STATUS[$value->status];
        }
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

    public function loaddata(Request $request)
    {
        $id = $request->id;
        $jsonObj = Service::find($id);
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



    // public function create()
    // {
    //     $service = service::all();
    //     $htmlOption = $this->categoryRecusive(0);
    //     return view('backend.service.add', compact('service', 'htmlOption'));
    // }


    // public function categoryRecusive($id, $text = '')
    // {
    //     $service = Service::where('category_id', 0)->get();
    //     foreach ($service as $value) {
    //         if ($value['category_id'] == $id) {
    //             $this->htmlSlelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
    //             $this->categoryRecusive($value['id'], $text . '--');
    //         }
    //     }

    //     return $this->htmlSlelect;
    // }

    // public function store(Request $request)
    // {


    //     $model = new service();
    //     $model->fill($request->all());
    //     if ($request->hasFile('image')) {
    //         $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
    //         $path = $request->image->storeAs('public/uploads/image', $newFileName);
    //         $model->image = str_replace('public/', '', $path);
    //     }
    //     $model->save();
    //     return redirect(route('service.index'))->with('status', 'Thêm mới thành công');
    // }




    // public function edit($id)
    // {
    //     $service = service::find($id);
    //     $htmlOption = $this->categoryRecusive(0);
    //     return view('backend.service.edit', compact('service', 'htmlOption'));
    // }
    // public function update($id, Request $request)
    // {

    //     // dd($request->all());

    //     $model = service::find($id);
    //     $model->fill($request->all());
    //     if ($request->hasFile('image')) {
    //         $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
    //         $path = $request->image->storeAs('public/uploads/image', $newFileName);
    //         $model->image = str_replace('public/', '', $path);
    //     }
    //     $model->save();
    //     return redirect(route('service.index'))->with('status', 'sửa thành công mới thành công');
    // }




    // public function Delete($id, Request $request)
    // {
    //     // Truyen::destroy($id);
    //     $service = service::find($id);
    //     unlink("storage/" . $service->image);
    //     service::where("id", $service->id)->delete();
    //     return redirect()->back()->with('status', 'xoá thành công');
    // }
}
