@extends('frontend.layouts.app')

@section('main-content')
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title float-left">
                        <h2>Bảng Giá</h2>
                    </div>
                    <div class="breadcrumb-menu float-right">
                        <ul class="clearfix">
                            <li><a href="index-2.html">Trang Chủ</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Bảng Giá</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start pricing plan area-->
<section class="pricing-plan-area">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h1>Relaxed Payment Plans 01</h1>
            <p>We are proud to have the opportunity to give you the smile of your dreams in affordable cost.</p>
        </div>
        <div class="row">
            <!--Start single price box-->

            @foreach($servicePrice as $item)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center">

                <div class="single-price-box">
                    <div class="table-header">
                        <div class="top">
                            <h2><span>{{$item->name}}</span></h2>
                        </div>
                        <div class="package">
                            <h3><span>Giá niêm yết</span></h3>
                        </div>
                    </div>
                    <div class="price-list">
                        @if($item->serviceChildrent->count())
                        <ul>
                            @foreach($item->serviceChildrent as $service)
                            <li>{{$service->name}} : {{$service->price}}</li>

                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="table-footer">
                        <a class="btn-one" href="#">Liên hệ</a>
                    </div>
                </div>

            </div>
            @endforeach


        </div>
    </div>
</section>
<!--End pricing plan area-->

<!--Start pricing plan area style2-->

<!--End pricing plan area style2-->
@endsection