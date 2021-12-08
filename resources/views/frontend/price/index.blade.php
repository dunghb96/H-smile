@extends('frontend.layout.index')

@section('content')

@include('frontend.layout.breadcrumb')

<section class="pricing-plan-area style2">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h1>Bảng giá dịch vụ </h1>
            <p>We are proud to have the opportunity to give you the smile of your dreams in affordable cost.</p>
        </div>
        <div class="row">
            <!--Start single price box-->
            @foreach($service as $item)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center">
                <div class="single-price-box">
                    <div class="table-header">
                        <div class="top">
                            <h3>{{$item->name}}</h3>
                            <span>*rates are subject to change</span>
                        </div>

                    </div>
                    <div class="price-list">
                        @if($item->serviceChildrent->count())
                        <ul>
                            @foreach($item->serviceChildrent as $service1)
                            <li>{{$service1->name}} : {{$service1->price}}</li>

                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <!--End single price box-->
            <!--Start single price box-->

            <!--End single price box-->
        </div>
    </div>
</section>


@endsection