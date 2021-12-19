@extends('backend.layout.app')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Yêu cầu</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Yêu cầu
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Row grouping -->
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-datatable">
                                <table class="datatables-basic table" id="tableBasic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Khách hàng</th>
                                            <th></th>
                                            <th>Dịch vụ</th>
                                            <th></th>
                                            <th></th>
                                            <th>Ca</th>
                                            <th>Bác sĩ</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal modal-slide-in new-user-modal fade" id="addnew">
                                <div class="modal-dialog">
                                    <form class="modal-content pt-0" id="frm-add">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Thêm yêu cầu mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label for="service">Dịch vụ</label>
                                                <select class="form-control" id="service" name="service" required>
                                                    @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="doctor">Nha sĩ</label>
                                                <select class="form-control" id="doctor" name="doctor" required>
                                                    @foreach($doctor as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="date_at">Giờ hẹn</label>
                                                <select class="form-control" id="time_at" name="time_at" required>
                                                    <option value="07:00">07:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Họ và tên">
                                            </div>
                                            <div class="form-group">
                                                <label>Tuổi</label>
                                                <input type="number" class="form-control" id="age" name="age" placeholder="Tuổi">
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Số điện thoại">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>

                                            <div class="form-group">
                                                <label for="status_desc">Mô tả</label>
                                                <textarea id="status_desc" name="status_desc" rows="3" class="form-control" placeholder="Mô tả tình trạng"></textarea>
                                            </div>
                                            <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Thêm yêu cầu</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal fade text-left" id="patientinfo" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel16">Thông tin khách hàng</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="id" name="id" />
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="nav nav-pills" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link d-flex align-items-center active" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                                                <i data-feather="info"></i><span class="d-none d-sm-block">Thông tin cá nhân</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item" id="tab2">
                                                            <a class="nav-link d-flex align-items-center" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                                                <i data-feather='clipboard'></i><span class="d-none d-sm-block">Dịch vụ đã sử dụng</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="information" aria-labelledby="information-tab" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <span>Họ tên</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <span class="font-weight-bold text-primary" id="patient-name"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <span>Tuổi</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <span class="font-weight-bold text-primary" id="patient-age"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <span>Số điện thoại</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <span class="font-weight-bold text-primary" id="patient-phone"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-4">
                                                                            <span>Email</span>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <span class="font-weight-bold text-primary" id="patient-email"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="account" aria-labelledby="account-tab" role="tabpanel">
                                                            <div class="table-responsive border rounded mt-1">
                                                                <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                                                    <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                                                    <span class="align-middle">Chi tiết</span>
                                                                </h6>
                                                                <table class="table table-striped table-borderless" id="listhistory">
                                                                    <thead class="thead-light ">
                                                                        <tr>
                                                                            <th>Ngày</th>
                                                                            <th>Giờ</th>
                                                                            <th>Dịch vụ</th>
                                                                            <th>Bác sĩ</th>
                                                                            <th>Trạng thái</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal new-user-modal fade" id="addlich">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content pt-0">
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Tạo lịch khám</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <form id="frm-add" enctype="multipart/form-data">


                                                <div class="form-group">
                                                    <label for="category">Bác sĩ</label>
                                                    <select class="form-control" id="doctor_id" name="doctor" required>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_at">Ngày</label>
                                                    <input type="text" id="date_at" name="date_at" class="form-control flatpickr-basic" placeholder="DD/MM/YYYY" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_at">Giờ hẹn</label>
                                                    <select class="form-control" id="atime_at" name="time_at" required>
                                                        <option value="07:00">07:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="shift">Ca</label>
                                                    <select class="form-control" id="shift" name="shift" required>
                                                        <option value="1">Ca sáng</option>
                                                        <option value="2">Ca chiều</option>
                                                    </select>
                                                </div> -->
                                                <button type="button" onclick="saveExamSchedule()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Row grouping -->
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/backend/assets/js/appointment.js"></script>
@endpush
