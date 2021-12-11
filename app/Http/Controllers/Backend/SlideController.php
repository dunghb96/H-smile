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
        return view('backend.slide.list', compact('slides'));
    }

    public function getAdd()
    {
        return view('backend.slide.add');
    }

    public function postAdd(Request $request)
    {
        $slide = new Slide();
        $this->__validate($request);


        $slide->rank = $request->input('rank');
        $slide->short_desc = $request->input('short_desc');
        $slide->image = $request->input('image');
        $slide->save();

        return redirect()->route('slide.list')->with(['status' => 'success', 'flash_message' => trans('Thêm slide thành công')]);
    }

    public function getEdit($id = 0)
    {
        $slide = Slide::findOrFail($id);

        return view('backend.slide.edit', compact('slide'));
    }


    public function postEdit(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $this->__validate($request);


        $slide->rank = $request->input('rank');
        $slide->short_desc = $request->input('short_desc');
        $slide->image = $request->input('image');
        $slide->save();

        return redirect()->route('slide.list')->with(['status' => 'success', 'flash_message' => trans('label.notification.update_success')]);
    }


    public function delete(Request $request)
    {
        $slide = Slide::findOrFail($request->post('item_id'));

        if ($slide->delete()) {
            return response()->json([
                'status' => 'success',
                'title' => trans('label.deleted'),
                'message' => trans('label.notification.delete_success')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'title' => trans('label.error'),
            'message' => trans('label.something_went_wrong')
        ]);

    }


    public function __validate($request)
    {
        $this->validate($request, [
            'rank' => 'required|unique:slides',
            'short_desc' => 'required',
            'image' => 'required',
        ],
            [
                'rank.required' => 'Vui lòng không để trống!',
                'rank.unique' => 'Thứ tự này đã tồn tại',
                'short_desc.required' => 'Vui lòng không để trống!',
                'image.required' => 'Vui lòng không để trống!',

            ]
        );

    }



}
