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
                                        <h6>Lưu Lượng truy cập website</h6>
                                        <h2 class="font-weight-bolder mb-1">99%</h2>
                                        <div id="statistics-order-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bar Chart - Orders -->

                            <!-- Line Chart - Profit -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card card-tiny-line-stats">
                                    <div class="card-body pb-50">
                                        <h6>lịch khám hôm nay</h6>
                                        <h2 class="font-weight-bolder mb-1">6,24k</h2>
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
                                    <p class="card-text font-small-2 mr-25 mb-0">Tháng 9</p>
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
                                                <h4 class="font-weight-bolder mb-0">7888</h4>
                                                <p class="card-text font-small-3 mb-0">Lượng truy cập</p>
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
                                                <h4 class="font-weight-bolder mb-0">8.549k</h4>
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
                                                <h4 class="font-weight-bolder mb-0">$9745</h4>
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
                                        <h6 class="mb-0">THU</h6>
                                        <h3 class="mb-0">24</h3>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="card-title mb-25">Lịch làm việc</h4>
                                        <p class="card-text mb-0">Lịch hẹn khách hàng</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="avatar bg-light-primary rounded mr-1">
                                        <div class="avatar-content">
                                            <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0">Sat, May 25, 2020</h6>
                                        <small>10:AM to 6:PM</small>
                                    </div>
                                </div>
                                <div class="media mt-2">
                                    <div class="avatar bg-light-primary rounded mr-1">
                                        <div class="avatar-content">
                                            <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0">Central Park</h6>
                                        <small>Manhattan, New york City</small>
                                    </div>
                                </div>
                                <div class="avatar-group">
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Billy Hopkins" class="avatar pull-up">
                                        <img src="/backend/app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Amy Carson" class="avatar pull-up">
                                        <img src="/backend/app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Brandon Miles" class="avatar pull-up">
                                        <img src="/backend/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Daisy Weber" class="avatar pull-up">
                                        <img src="/backend/app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Jenny Looper" class="avatar pull-up">
                                        <img src="/backend/app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" width="33" height="33" />
                                    </div>
                                    <h6 class="align-self-center cursor-pointer ml-50 mb-0">+42</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Developer Meetup Card -->

                    <!-- Transaction Card -->
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Quản lý công việc</h4>
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
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-primary rounded">
                                            <div class="avatar-content">
                                                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Module báo cáo</h6>
                                            <small>Dự án VELO Edu</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">Trễ deadline</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-success rounded">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Module Chatbox</h6>
                                            <small>Dự án G-Office</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">Hoàn thành</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-danger rounded">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Module CRM</h6>
                                            <small>Dự án Rolatex</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">Hoàn thành</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-warning rounded">
                                            <div class="avatar-content">
                                                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Báo giá Bluesea</h6>
                                            <small>Hỗ trợ khách hàng</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">Trễ deadline</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-info rounded">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Thu công nợ</h6>
                                            <small>Dự án Nam Dương</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">Hoàn thành</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Transaction Card -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection

@push('js')
<script>
    let username = '<?= Auth::user()->name ?>';
</script>
<script src="/backend/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="/backend/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
<script src="/backend/assets/js/dashboard.js"></script>
@endpush
