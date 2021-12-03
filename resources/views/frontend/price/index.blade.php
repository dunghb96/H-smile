@extends('frontend.layout.index')
@section('content')
<br><br><br><br>
<section class="pricing-plan-area">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h1>Bảng giá 1</h1>
            <p>Chúng tôi tự hào có cơ hội mang đến nụ cười như mơ cho bạn với chi phí hợp lý.</p>
        </div>
        <div class="row">
            <!--Start single price box-->
            @foreach($serviceParent as $item)
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
            <!--End single price box-->
            <!--Start single price box-->

            <!--End single price box-->
            <!--Start single price box-->

            <!--End single price box-->
        </div>
    </div>
    </div>
</section>
<!--End pricing plan area-->

<!--Start pricing plan area style2-->

<!--End pricing plan area style2-->
@endsection
@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link type=”text/css” rel=”stylesheet” href=”css/font-awesome.min.css” />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
@endsection