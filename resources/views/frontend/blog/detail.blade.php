@extends('frontend.layouts.app')

@section('main-content')
<section class="specialities-single-area">

    <div class="container">
        <div class="row">

            <div class="col-xl-8">

                <div class="specialities-single-content">
                    <div class="specialities-title fix">
                        <div class="icon-holder">
                            <span class="icon-tooth1">
                                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span>
                            </span>
                        </div>
                        <div class="title-holder">
                            <h2>{{$blog->title}}</h2>
                        </div>
                    </div>
                    <div class="specialities-top-content">

                        <div>
                            <div class="single-item">
                                <img src="{{asset($blog->image)}}" alt="Awesome Image">
                            </div>

                        </div>
                        <p> {!!$blog->content!!}</p>
                    </div>
                    <div class="what-wedo-content">
                        <div class="top fix">
                            <h3>Những bài viết liên quan</h3>

                        </div>
                        <div class="inner-content">
                            <div class="row">
                                <!--Start Single wedo box-->
                                @foreach($blogAll as $item)
                                <div class="col-xl-6 col-lg-6">
                                    <div class="single-wedo-box">
                                        <div class="inner">
                                            <div class="image">
                                                <img src="{{asset($item->image)}}" alt="Awesome Image">
                                            </div>
                                            <div class="text">
                                                <h3>{{$item->title}}</h3>
                                                <p>{{$item->short_desc}}</p>
                                                <a class="btn-two" href="{{route('hsmile.blog.detail',['id'=>$item->id])}}"><span class="icon-plus"></span>Đọc thêm</a>
                                            </div>
                                        </div>
                                        <div class="overlay-image">
                                            <img src="{{asset('frontend/images/services/service-single/wedo-overlay-bg.jpg')}}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <!--End Single wedo box-->
                            </div>
                        </div>
                    </div>




                </div>



            </div>

            <div class="col-xl-4 col-lg-7 col-md-9 col-sm-12">
                <div class="specialities-sidebar">
                    <!--Start Single sidebar-->

                    <!--End Single sidebar-->

                    <!--Start Single sidebar-->

                    <!--End Single sidebar-->

                    <div class="sidebar-appointment-box">
                        <span class="icon-calendar"></span>
                        <h3>Hẹn</h3>
                        <p>Ở đây bạn có thể có được thời gian thăm khám hoàn hảo của bạn đến bệnh viện.</p>
                        <a class="btn-one" href="{{ route('hsmile.appointment') }}">Làm cho nó</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection