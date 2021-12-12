<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index()
    {
        $blogcates = BlogCategory::where('status','1')->get();
        return view('backend.blog.index', compact('blogcates'));
    }

    public function json()
    {
        $jsonObj['data'] = Blog::where('status','1')->get();
        echo json_encode($jsonObj);
    }

    public function add(Request $request)
    {
        $model = new Blog();
        $result = $model->saveBlog($model, $request);
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
        $jsonObj = Blog::find($id);
        echo json_encode($jsonObj);
    }
    
    public function edit(Request $request)
    {
        $id = $request->id;
        $model = Blog::find($id);
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
        $model = Blog::find($id);
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
