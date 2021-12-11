<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->paginate();
        return view('backend.news.list', compact('news'));
    }

    public function getAdd()
    {
        return view('backend.news.add');
    }

    public function postAdd(Request $request)
    {
        $news = new News();
        $this->__validate($request);


        $news->title = $request->input('title');
        $news->image = $request->input('image');
        $news->short_desc = $request->input('short_desc');
        $news->id_admin = auth()->user()->id;

        $news->content = $request->input('content');
        $news->save();

        return redirect()->route('news.list')->with(['status' => 'success', 'flash_message' => trans('Thêm bảng tin thành công')]);
    }


    public function getEdit($id = 0)
    {
        $new = News::findOrFail($id);

        return view('backend.news.edit', compact('new'));
    }


    public function postEdit(Request $request, $id)
    {
        $new = News::findOrFail($id);
        $this->__validate($request);


        $new->title = $request->input('title');
        $new->image = $request->input('image');
        $new->short_desc = $request->input('short_desc');
        $new->content = $request->input('content');
        $new->save();

        return redirect()->route('news.list')->with(['status' => 'success', 'flash_message' => trans('Sửa tin thành công')]);
    }


    public function delete(Request $request)
    {
        $new = News::findOrFail($request->post('item_id'));

        if ($new->delete()) {
            return response()->json([
                'status' => 'success',
                'title' => trans('label.deleted'),
                'message' => trans('Xóa thành công')
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
            'title' => 'required',
            'short_desc' => 'required',
            'image' => 'required',
            'content' => 'required',
        ],
            [
                'title.required' => 'Vui lòng không để trống!',
                'short_desc.required' => 'Vui lòng không để trống!',
                'image.required' => 'Vui lòng không để trống!',
                'content.required' => 'Vui lòng không để trống!',

            ]
        );
    }
}
