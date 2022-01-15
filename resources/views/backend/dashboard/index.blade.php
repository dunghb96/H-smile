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
                            {{-- <div class="col-lg-6 col-md-3 col-6">
                                <div class="card">
                                    <div class="card-body pb-50">
                                        <h6>Doanh thu theo tháng {{$date->month}}</h6>
                                        <h2 class="font-weight-bolder mb-1">{{$doneAppoint}}</h2>
                                        <div id="statistics-order-chart"></div>
                                    </div>
                                </div>
                            </div> --}}
                            <!--/ Bar Chart - Orders -->

                            <!-- Line Chart - Profit -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card card-tiny-line-stats">
                                    <div class="card-body pb-50">
                                        <h6>Tổng số yêu cầu khám trong ngày </h6>
                                        <h2 class="font-weight-bolder mb-1">{{$total_appointment}}</h2>
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
                                    <p class="card-text font-small-2 mr-25 mb-0"></p>
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
                                                <p class="card-text font-small-3 mb-0">Số lượng ca khám trong ngày</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">

                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="box" class="avatar-icon"></i>
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
                                                <h4 class="font-weight-bolder mb-0"> {{number_format($total_revenue_day)}} VNĐ</h4>
                                                <p class="card-text font-small-3 mb-0">Doanh số ngày hôm nay</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$doctors->count()}}</h4>
                                                <p class="card-text font-small-3 mb-0">Tổng số bác sĩ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Revenue Report Card -->
                </div>
                <br>
                <div class="row match-height">
                    <div class="col-lg-6 col-3">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên bác sĩ</th>
                                                <th>Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctors as $key => $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="font-weight-bolder">{{$key+1}}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span>{{$item->name}}</span>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <div class="d-flex flex-column">
                                                        <span class="font-weight-bolder mb-25">{{number_format($item->total_moneny_doctor)}} VNĐ</span>
                                                    </div>
</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-3">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tên dịch vụ</th>
                                                <th>Giá dịch vụ</th>
                                                <th>Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $key => $service)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span>{{$service->name}}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="font-small-2 text-muted">{{number_format($service->price)}} VNĐ</div>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="d-flex align-items-center">
                                                            <span >{{number_format($service->total_moneny_service)}} VNĐ</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
