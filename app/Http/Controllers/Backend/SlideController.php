<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BaseController;
use App\Models\Role;
use App\Models\RoleHasPermission;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\Auth;


class SlideController extends BaseController
{

    public function index()
    {
        $slides = Slide::orderBy('created_at', 'DESC')->paginate();
        return view('backend.slide.index', compact('slides'));
    }

    public function json()
    {
        $jsonObj['data'] = Slide::where('status','1')->get();
        echo json_encode($jsonObj);
    }

    public function add(Request $request)
    {
        $model = new Slide();
        $result = $model->saveSlide($model, $request);
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
        $jsonObj = Slide::find($id);
        echo json_encode($jsonObj);
    }
    
    public function edit(Request $request)
    {
        $id = $request->id;
        $model = Slide::find($id);
        $result = $model->saveSlide($model, $request);
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
        $model = Slide::find($id);
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



    // public function getAdd()
    // {
    //     return view('backend.slide.add');
    // }

    // public function postAdd(Request $request)
    // {
    //     $slide = new Slide();
    //     $this->__validate($request);


    //     $slide->rank = $request->input('rank');
    //     $slide->short_desc = $request->input('short_desc');
    //     $slide->image = $request->input('image');
    //     $slide->save();

    //     return redirect()->route('slide.list')->with(['status' => 'success', 'flash_message' => trans('Thêm slide thành công')]);
    // }

    // public function getEdit($id = 0)
    // {
    //     $slide = Slide::findOrFail($id);

    //     return view('backend.slide.edit', compact('slide'));
    // }


    // public function postEdit(Request $request, $id)
    // {
    //     $slide = Slide::findOrFail($id);
    //     $this->__validate($request);


    //     $slide->rank = $request->input('rank');
    //     $slide->short_desc = $request->input('short_desc');
    //     $slide->image = $request->input('image');
    //     $slide->save();

    //     return redirect()->route('slide.list')->with(['status' => 'success', 'flash_message' => trans('label.notification.update_success')]);
    // }


    // public function delete(Request $request)
    // {
    //     $slide = Slide::findOrFail($request->post('item_id'));

    //     if ($slide->delete()) {
    //         return response()->json([
    //             'status' => 'success',
    //             'title' => trans('label.deleted'),
    //             'message' => trans('label.notification.delete_success')
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 'error',
    //         'title' => trans('label.error'),
    //         'message' => trans('label.something_went_wrong')
    //     ]);

    // }


    // public function __validate($request)
    // {
    //     $this->validate($request, [
    //         'rank' => 'required|unique:slides',
    //         'short_desc' => 'required',
    //         'image' => 'required',
    //     ],
    //         [
    //             'rank.required' => 'Vui lòng không để trống!',
    //             'rank.unique' => 'Thứ tự này đã tồn tại',
    //             'short_desc.required' => 'Vui lòng không để trống!',
    //             'image.required' => 'Vui lòng không để trống!',

    //         ]
    //     );

    // }



}
