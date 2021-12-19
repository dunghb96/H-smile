<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends BaseController
{
    private function optionKeys(): array
    {
        $optionKeys = [
            'logo', 'favicon', 'logo_footer', 'start_date',
            'end_date', 'time_open', 'time_close', 'hotline',
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

    function thaylogo(Request $request)
    {
        if ($request->hasFile('logo')) {
            $fname = $request->logo->getClientOriginalName();
            if($fname != '') {
                $newFileName = uniqid() . '-' . $fname;
                $path = $request->logo->storeAs('public/uploads/setting', $newFileName);
                $logo = str_replace('public', '', $path);
                $request->file('logo')->move('uploads/setting', $newFileName);
                // foreach($this->optionKeys() as $optionKey){
                //     if($request->has($optionKey)){
                        option(['logo' => $request->input($logo)]);
                        Cache::forget('logo');
                //     }
                // }
            }
        }
        $jsonObj['success'] = true;
        $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        $jsonObj['filename'] = $logo;

        echo json_encode($jsonObj);
    }

    function thayfavicon(Request $request)
    {
        if ($request->hasFile('favicon')) {
            $fname = $request->favicon->getClientOriginalName();
            if($fname != '') {
                $newFileName = uniqid() . '-' . $fname;
                $path = $request->favicon->storeAs('public/uploads/setting', $newFileName);
                $favicon = str_replace('public', '', $path);
                $request->file('favicon')->move('uploads/setting', $newFileName);
                // foreach($this->optionKeys() as $optionKey){
                //     if($request->has($optionKey)){
                        option(['favicon' => $request->input($favicon)]);
                        Cache::forget('favicon');
                //     }
                // }
            }
        }
        $jsonObj['success'] = true;
        $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        $jsonObj['filename'] = $favicon;

        echo json_encode($jsonObj);
    }

    function thaylogofooter(Request $request)
    {
        if ($request->hasFile('logo_footer')) {
            $fname = $request->logo_footer->getClientOriginalName();
            if($fname != '') {
                $newFileName = uniqid() . '-' . $fname;
                $path = $request->logo_footer->storeAs('public/uploads/setting', $newFileName);
                $logo_footer = str_replace('public', '', $path);
                $request->file('logo_footer')->move('uploads/setting', $newFileName);
                // foreach($this->optionKeys() as $optionKey){
                //     if($request->has($optionKey)){
                        option(['logo_footer' => $request->input($logo_footer)]);
                        Cache::forget('logo_footer');
                //     }
                // }
            }
        }
        $jsonObj['success'] = true;
        $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        $jsonObj['filename'] = $logo_footer;

        echo json_encode($jsonObj);
    }
}
