@php
    use App\Models\Appointment;
    use App\Models\ExaminationSchedule;
@endphp
@extends('frontend.layouts.app')

@section('main-content')

    <section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-left">
                            <h2>Lịch sử khám</h2>
                        </div>
                        <div class="breadcrumb-menu float-right">
                            <ul class="clearfix">
                                <li><a href="{{ route('hsmile.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">Lịch sử khám</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Appointment area -->
    <div class="appointment-area2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title max-width text-center">
                        <h1>Xem lịch sử khám của bạn</h1>
                        <p>Tại đây, bạn có thể xem lại lịch sử khám của bạn bằng cách nhập số điện thoại đã đăng ký đặt
                            lịch và chọn nút tìm kiếm.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-12" style="margin: 0 auto;">
                    <div class="appointment-form-left">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Yêu cầu khám
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Lịch hẹn
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Dịch vụ</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($historyDatas as $historyData)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{ $historyData->name }} </td>
                                            <td>{{$historyData->service->name}}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($historyData->created_at))}}</td>
                                            <td><p class="badge badge-warning p-1">Chờ xác nhận</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">

                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Dịch vụ</th>
                                        <th scope="col">Trang thái</th>
                                        <th scope="col">Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listOrderByPatient as $lobp)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                {{ $lobp->appointments->name }}
                                            </td>

                                            <td>
                                                @foreach(\App\Models\Order::find($lobp->id)->orderdetail as $lodt)
                                                    <p>{{ \App\Models\Service::find($lodt->service_id)->name }}</p>
                                                @endforeach
                                            </td>
                                            <td class="badge badge-success p-2 mt-2">Đã duyệt lịch</td>

                                            <td>
                                                @if($lobp->status == "1")
                                                <a class="text-warning" href="{{ '/order/' . $lobp->id }}">Chưa thanh toán </a>
                                                @elseif($lobp->status == "2")
                                                    <a class="text-success" href="{{ '/order/' . $lobp->id }}">Đã thanh toán </a>
                                                @endif
                                            </td>

                                        </tr>


                                    @endforeach

                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('user_asset/js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('user_asset/js/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('user_asset/js/jquery-validation/localization/messages_ja.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>

@endsection
@section('head')
    <style>
        .invalid-feedback {
            margin-top: -20px;
            margin-bottom: 20px;
        }
    </style>
@endsection
