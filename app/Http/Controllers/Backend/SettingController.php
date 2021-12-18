<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends BaseController
{
    private function optionKeys(): array
    {
        $optionKeys = [
            'site_favicon','site_logo', 'site_logo_footer', 'video',
            'contact_phone', 'contact_email', 'contact_address', 'contact_google_maps',
            'social_facebook', 'social_line', 'social_zalo', 'social_youtube', 'social_linkedin', 'social_instagram',
            'emails_receive_notification','site_title','site_description'
        ];

        return $optionKeys;
    }

    public function index()
    {
        return view('backend.setting.index');
    }

    public function saveForm(Request $request)
    {
        foreach($this->optionKeys() as $optionKey){
            if($request->has($optionKey)){
                option([$optionKey => $request->input($optionKey)]);
                Cache::forget($optionKey);
            }
        }

        $jsonObj['success'] = true;
        $jsonObj['msg'] = 'Tạo lịch khám thành công';
        echo json_encode($jsonObj);        
    }
}
