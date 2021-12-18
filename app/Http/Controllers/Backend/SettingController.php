<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends BaseController
{
    private function optionKeys(): array
    {
        $optionKeys = [
            'logo', 'favicon', 'logo_footer', 'begin_date',
            'to_date', 'open', 'close', 'hotline',
            'email', 'address', 'site_title', 'site_desc', 'map', 'about',
            'facebook','zalo','youtube'
        ];

        return $optionKeys;
    }

    public function index()
    {
        return view('backend.setting.index');
    }

    public function saveForm(Request $request)
    {
        dd(1);
        foreach($this->optionKeys() as $optionKey){
            if($request->has($optionKey)){
                option([$optionKey => $request->input($optionKey)]);
                Cache::forget($optionKey);
            }
        }
        $jsonObj['success'] = true;
        $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';

        echo json_encode($jsonObj);
    }
}
