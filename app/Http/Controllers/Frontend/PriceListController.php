<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;

class PriceListController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $service_cate = ServiceCategory::where('status', ServiceCategory::STATUS_ACTIVE)->get();
        $servicePrice = Service::where('category_id', 0)->get();

        return view('frontend.price-list.index', compact('service_cate'));
    }
}
