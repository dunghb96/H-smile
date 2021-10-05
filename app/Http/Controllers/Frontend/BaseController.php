<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\FrontendTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    use FrontendTrait;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $menu = getCachedOption("menu");
            $menu = $menu ? json_decode($menu) : [];
            $menu_footer = getCachedOption("menu-footer");
            $menu_footer = $menu_footer ? json_decode($menu_footer) : [];
            View::share([
                'menu' => $menu,
                'menu_footer' => $menu_footer,
                // 'servicePages' => $this->getServicePagesMenu('service'),
            ]);

            return $next($request);
        });

    }
}
