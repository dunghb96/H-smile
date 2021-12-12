<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends BaseController
{
    public function index()
    {
        $slides = BlogCategory::orderBy('created_at', 'DESC')->paginate();
        return view('backend.blog-category.index', compact('slides'));
    }

    public function json()
    {
        $jsonObj['data'] = BlogCategory::where('status','1')->get();
        echo json_encode($jsonObj);
    }

    public function add(Request $request)
    {
        $model = new BlogCategory();
        $result = $model->saveBlogCate($model, $request);
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
        $jsonObj = BlogCategory::find($id);
        echo json_encode($jsonObj);
    }
    
    public function edit(Request $request)
    {
        $id = $request->id;
        $model = BlogCategory::find($id);
        $result = $model->saveBlogCate($model, $request);
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
        $model = BlogCategory::find($id);
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
