<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Service;


class PriceListController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $servicePrice = Service::where('parent_id', 0)->get();

        return view('frontend.price-list.index', compact('servicePrice'));
    }
}
