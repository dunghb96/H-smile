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
                            <h2>{{$service->name}}</h2>
                        </div>
                    </div>
                    <div class="specialities-top-content">
                        <p>{!!$service->short_description!!}</p>
                        <div>
                            <div class="single-item">
                                <img src="{{asset($service->image)}}" alt="Awesome Image">
                            </div>

                        </div>
                        <p>{!!$service->content!!}</p>
                    </div>


                    <div class="treatments-pricing-box">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="pricing-plan">
                                    <h3 style="text-align: center;">Giá dịch vụ</h3>
                                    <table>
                                        <thead class="table-heading">
                                            <tr>
                                                <th class="left">Điều trị</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            @if($serviceRandom->count())
                                            <tr>
                                                @foreach($serviceRandom as $service1)
                                                <td>
                                                    <p>{{$service1->name}}</p>
                                                </td>
                                                <td>
                                                    <span>{{$service1->price}}</span>
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="what-wedo-content">
                        <div class="top fix">
                            <h3>Dịch vụ </h3>

                        </div>
                        <div class="inner-content">
                            <div class="row">
                                <!--Start Single wedo box-->
                                @foreach($serviceRandom as $item)
                                <div class="col-xl-6 col-lg-6">
                                    <div class="single-wedo-box">
                                        <div class="inner">
                                            <div class="image">
                                                <img src="{{asset($item->image)}}" alt="Awesome Image">
                                            </div>
                                            <div class="text">
                                                <h3>{{$item->name}}</h3>
                                                <p>{{$item->short_description}} ...</p>
                                                <a class="btn-two" href="{{route('hsmile.service.detail',['id'=>$item->id])}}"><span class="icon-plus"></span>Đọc thêm</a>
                                            </div>
                                        </div>
                                        <div class="overlay-image">

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="meet-our-specialist">
                        <h3>Gặp gỡ chuyên gia của chúng tôi</h3>
                        <div class="row">
                            @foreach($doctor as $item)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-team-member">
                                    <div class="img-holder">
                                        <img src="{{asset('frontend/images/team/1.jpg')}}" alt="Awesome Image">
                                        <div class="overlay-style-one"></div>
                                        <div class="text-holder text-center">
                                            <h3>{{$item->name}}</h3>
                                            <span>{{$item->majors}}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>



            </div>

            <div class="col-xl-4 col-lg-7 col-md-9 col-sm-12">
                <div class="specialities-sidebar">
                    <!--Start Single sidebar-->
                    <div class="single-sidebar">
                        <div class="inner">
                            <h3>Dịch vụ liên qua</h3>

                            @if($serviceRandom->count())
                            <ul class="specialities-categories">
                                @foreach($serviceRandom as $service1)
                                <li class="active"><a href="#">{{$service1->name}}</a></li>

                                @endforeach
                            </ul>
                            @endif

                        </div>
                    </div>
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
