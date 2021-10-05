<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\CommonStatus;
use App\Models\Client;
use App\Models\News;
use App\Models\Service;
use App\Models\Slide;
use App\Models\StaticPage;
use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        // return view('frontend.home.index');
    }

}
