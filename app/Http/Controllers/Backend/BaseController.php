<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\BaseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    use BaseTrait;

    public $status, $lang;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $userRoles = Auth::user()->role;
            // Sharing data to all views
            View::share([
                'userRoles' => $userRoles,
            ]);

            return $next($request);
        });

    }
}
