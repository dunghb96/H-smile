<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ServiceController extends Controller
{
    private $htmlSlelect;
    public function __construct()
    {
        $this->htmlSlelect = '';
    }

    public function index()
    {
        $service = service::paginate(10);
        return view('backend.service.index', compact('service'));
    }
    public function create()
    {
        $service = service::all();
        $htmlOption = $this->categoryRecusive(0);
        return view('backend.service.add', compact('service', 'htmlOption'));
    }


    public function categoryRecusive($id, $text = '')
    {
        $service = Service::where('parent_id', 0)->get();
        foreach ($service as $value) {
            if ($value['parent_id'] == $id) {
                $this->htmlSlelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                $this->categoryRecusive($value['id'], $text . '--');
            }
        }

        return $this->htmlSlelect;
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
        $htmlOption = $this->categoryRecusive(0);
        return view('backend.service.edit', compact('service', 'htmlOption'));
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
