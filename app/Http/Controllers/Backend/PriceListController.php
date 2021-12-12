<?php

namespace App\Http\Controllers\Backend;

use App\Models\PriceList;
use App\Models\Service;
use Illuminate\Http\Request;

class PriceListController extends BaseController
{
    public function index()
    {
        $slides = PriceList::orderBy('created_at', 'DESC')->paginate();
        return view('backend.price-list.index', compact('slides'));
    }

    public function json()
    {
        $jsonObj['data'] = Service::where('status','1')->get();
        echo json_encode($jsonObj);
    }

    public function loaddata(Request $request)
    {
        $id = $request->id;
        $jsonObj = PriceList::find($id);
        echo json_encode($jsonObj);
    }
    
    public function edit(Request $request)
    {
        $id = $request->id;
        $model = PriceList::find($id);
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
}
