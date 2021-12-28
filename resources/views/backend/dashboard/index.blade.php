@extends('backend.layout.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/backend/app-assets/css/pages/dashboard-ecommerce.css">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-ecommerce">

                <div class="row match-height">
                    <div class="col-lg-4 col-12">
                        <div class="row match-height">
                            <!-- Bar Chart - Orders -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card">
                                    <div class="card-body pb-50">
                                        <h6>Số ca khám đã hoàn thành</h6>
                                        <h2 class="font-weight-bolder mb-1">{{$doneAppoint}}</h2>
                                        <div id="statistics-order-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bar Chart - Orders -->

                            <!-- Line Chart - Profit -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card card-tiny-line-stats">
                                    <div class="card-body pb-50">
                                        <h6>Tổng số yêu cầu khám</h6>
                                        <h2 class="font-weight-bolder mb-1">{{$appointment}}</h2>
                                        <div id="statistics-profit-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Line Chart - Profit -->
                        </div>
                    </div>

                    <!-- Revenue Report Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Báo cáo thống kê</h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 mr-25 mb-0">Tháng 12</p>
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">

                                                <h4 class="font-weight-bolder mb-0"> {{$confirm}}</h4>
                                                <p class="card-text font-small-3 mb-0">Yêu cầu đã được duyệt</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$waiting}}</h4>
                                                <p class="card-text font-small-3 mb-0">Yêu cầu chưa duyệt</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-success mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">5.000.000 VND</h4>
                                                <p class="card-text font-small-3 mb-0">Doanh số</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">70%</h4>
                                                <p class="card-text font-small-3 mb-0">Mục tiêu</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Revenue Report Card -->
                </div>

                <div class="row match-height">

                    <!-- Developer Meetup Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-developer-meetup">
                            <div class="meetup-img-wrapper rounded-top text-center">
                                <img src="/backend/app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                            </div>
                            <div class="card-body">
                                <div class="meetup-header d-flex align-items-center">
                                    <div class="meetup-day">
                                        <h6 class="mb-0">NGÀY</h6>
                                        <h3 class="mb-0">{{$day}}</h3>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="card-title mb-25">Lịch làm việc</h4>
                                        <p class="card-text mb-0">Lịch hẹn khách hàng</p>
                                    </div>
                                </div>
                                <div class="media">
                                    {{-- <div class="avatar bg-light-primary rounded mr-1">
                                        <div class="avatar-content">
                                            <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0">{{$date}}</h6>

                                    </div> --}}
                                </div>
                                <div class="media mt-2">
                                    <div class="avatar bg-light-primary rounded mr-1">
                                        <div class="avatar-content">
                                            <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0">Tòa nhà FPT Polytechnic</h6>
                                        <small>Phố Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/ Developer Meetup Card -->

                    {{-- <!-- Transaction Card -->
                    <div class="col-lg-8 col-md-6 col-12">

                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Yêu cầu đặt lịch</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án G-office</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án VELO Edu</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án Nam Dương</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>Tên khách hàng</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $row)
                                        <tr>
                                            <td>{{$row->patients->full_name}}</td>
                                            <td>@if($row->status==1)
                                                <span class="text text-danger">chờ xác nhận</span>
                                                @elseif($row->status==2)
                                                <span class="text text-warning">Đã xác nhận</span>
                                                @else
                                                <span class="text text-success">Đã hủy</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>



                            </div>
                        </div>

                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Khách hàng</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án G-office</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án VELO Edu</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án Nam Dương</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>Tên khách hàng</th>
                                            <th>age</th>
                                            <th>SĐT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($patient as $item)
                                        <tr>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->age}}</td>
                                            <td>{{$item->phone_number}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>



                            </div>
                        </div>

                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Dịch Vụ</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án G-office</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án VELO Edu</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án Nam Dương</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>Tên dịch vụ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($service as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>



                            </div>
                        </div>

                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Bác sĩ</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án G-office</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án VELO Edu</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Dự án Nam Dương</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th style="width: 200px;">Họ tên</th>
                                            <th style="width: 200px;">Số điện thoại</th>
                                            <th style="width: 200px;">chuyên ngành</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($doctor as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone_number}}</td>
                                            <td>{{$item->majors}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>



                            </div>
                        </div>


                    </div> --}}



                    <!--/ Transaction Card -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
<script src="/backend/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="/backend/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
<!-- <script src="/js/dashboard.js"></script> -->
@endsection
