<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ServiceController extends Controller
{
    public function index()
    {
        $service = service::all();
        return view('backend.service.index', compact('service'));
    }
    public function create()
    {


        return view('backend.service.add');
    }


    public function store(Request $request)
    {


        $model = new service();
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/image', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('service.index'))->with('status', 'Thêm mới thành công');
    }




    public function edit($id)
    {
        $service = service::find($id);

        return view('backend.service.edit', compact('service'));
    }
    public function update($id, Request $request)
    {

        // dd($request->all());

        $model = service::find($id);
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/image', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('service.index'))->with('status', 'sửa thành công mới thành công');
    }




    public function Delete($id, Request $request)
    {
        // Truyen::destroy($id);
        $service = service::find($id);
        unlink("storage/" . $service->image);
        service::where("id", $service->id)->delete();
        return redirect()->back()->with('status', 'xoá thành công');
    }
}
