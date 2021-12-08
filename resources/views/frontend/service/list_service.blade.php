@extends('frontend.layout.index')
@section('content')

@include('frontend.layout.breadcrumb')

<!--Start services style1 area-->
<section class="services-style1-area spec-page">
    <div class="container">
        <div class="sec-title max-width text-center">
            <h3>Chuyên ngành</h3>
            <h1>Dịch vụ chăm sóc răng miệng</h1>
            <p>Răng của bạn đóng một phần quan trọng trong cuộc sống hàng ngày của bạn. Nó không chỉ giúp bạn nhai và ăn thức ăn của bạn, mà còn tạo khuôn mặt của bạn. Bất kỳ chiếc răng nào bị mất đều có thể gây ảnh hưởng lớn đến chất lượng cuộc sống của bạn. </p>
        </div>
        <div class="row">
            <!--Start single solution style1-->
            @foreach($service as $item)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                <div class="single-solution-style1 wow fadeInUp" data-wow-delay="300ms">
                    <div class="img-holder">
                        <img src="{{asset('storage/'.$item->image)}}" alt="Awesome Image">
                        <div class="icon-holder">
                            <div class="inner-content">
                                <div class="box">
                                    <span class="icon-teeth-1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-holder">
                        <h3>
                            {{$item->name}}
                        </h3>
                        <p style="    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 20px;
    -webkit-line-clamp: 3;
    display: -webkit-box;
    -webkit-box-orient: vertical;
                            "> {{$item->description}}</p>
                        <div class="readmore">
                            <a href="#"><span class="icon-plus"></span></a>
                            <div class="overlay-button">
                                <a href="#">
                                    Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            <!--End single solution style1-->
            <!--Start single solution style1-->
        </div>
    </div>
</section>
<!--End services style1 area-->

<!--Start Testimonial Sec style2-->

<!--End Testimonial Sec style2-->
@endsection