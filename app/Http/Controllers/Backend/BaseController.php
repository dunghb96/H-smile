<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\BaseTrait;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    use BaseTrait;

    public $status, $lang;

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     //check upload dir
        //     // $this->checkUploadDirFileManager();
        //     $this->lang = config('lang');

        //     // Sharing data to all views
        //     View::share([
        //         // 'keyAccessFileManagerBackend' => $this->getAccessKeyFileManagerBackend(),
        //         'status' => $this->getStatus(),
        //         'lang' => $this->lang,
        //     ]);

        //     return $next($request);
        // });

    }
}
