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
            $start_date = getCachedOption("start_date");
            $end_date = getCachedOption("end_date");
            if( $start_date == 1 ) {
                $startDate = 'Thứ 2';
            } elseif ( $start_date == 2 ) {
                $startDate = 'Thứ 3';
            } elseif ( $start_date == 3 ) {
                $startDate = 'Thứ 4';
            } elseif ( $start_date == 4 ) {
                $startDate = 'Thứ 5';
            } elseif ( $start_date == 5 ) {
                $startDate = 'Thứ 6';
            } elseif ( $start_date == 6 ) {
                $startDate = 'Thứ 7';
            } elseif ( $start_date == 7 ) {
                $startDate = 'CN';
            } else{
                $startDate = '';
            }
            if( $end_date == 1 ) {
                $endDate = 'Thứ 2';
            } elseif ($end_date == 2 ) {
                $endDate = 'Thứ 3';
            } elseif ($end_date == 3 ) {
                $endDate = 'Thứ 4';
            } elseif ($end_date == 4 ) {
                $endDate = 'Thứ 5';
            } elseif ($end_date == 5 ) {
                $endDate = 'Thứ 6';
            } elseif ($end_date == 6 ) {
                $endDate = 'Thứ 7';
            } elseif ($end_date == 7 ) {
                $endDate = 'CN';
            } else{
                $endDate = '';
            }

            View::share([
                'endDate'   => $endDate,
                'startDate' => $startDate
            ]);

            return $next($request);
        });

    }
}
