<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OptionController extends BaseController
{
    private function optionKeys(): array
    {
        $optionKeys = [
            'site_favicon','site_logo', 'site_logo_footer', 'video', 
            'contact_phone', 'contact_email', 'contact_address', 'contact_google_maps',
            'social_facebook', 'social_line', 'social_zalo', 'social_youtube', 'social_linkedin', 'social_instagram',
            'emails_receive_notification','site_title','site_description'
        ];

        $multiLangKeys = [
            'site_title', 'site_description', 'contact_google_maps', 'contact_address', 
        ];

        foreach($multiLangKeys as $optionKey){
            foreach(config('lang') as $langKey => $langTitle){
                $optionKeys[] = "{$optionKey}_{$langKey}";
            }
        }

        return $optionKeys;
    }

    public function showForm()
    {
        return view('backend.setting.option');
    }

    public function saveForm(Request $request)
    {
        foreach($this->optionKeys() as $optionKey){
            if($request->has($optionKey)){
                option([$optionKey => $request->input($optionKey)]);
                Cache::forget($optionKey);
            }
        }

        return back()->with(['status' => 'success', 'flash_message' => 'Update sucess']);
    }
}
