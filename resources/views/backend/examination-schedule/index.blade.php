@extends('backend.layout.app')

@push('css')
<link rel="stylesheet" type="text/css" href="/backend/assets/css/test.css">
<!-- <link rel="stylesheet" type="text/css" href="/backend/assets/css/test1.css"> -->
@endpush

@section('content')

<link rel="stylesheet" type="text/css" href="/backend/app-assets/css/pages/app-calendar.css">
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Full calendar start -->
            <section>
                <div class="app-calendar overflow-hidden border">
                    <div class="row no-gutters">
                        <!-- Sidebar -->
                        <div class="col app-calendar-sidebar flex-grow-0 overflow-hidden d-flex flex-column" id="app-calendar-sidebar">
                            <div class="sidebar-wrapper">
                                <div class="card-body d-flex justify-content-center">
                                    <select class="select2 select-label form-control w-100" id="bac-si" name="bac-si">
                                        @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <span class="align-middle">Danh sách lịch chờ xếp</span>
                                </div>

                                <div class="sidebar-list">
                                    <div class="list-group" style="position: relative;height: 450px;" id="list-schedule">
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="xeplich()" class="list-group-item list-group-item-action">
                                            <span class="align-middle">#123 Niềng răng</span> <br>
                                            <span class="align-middle">Nguyễn Văn Hùng</span> <br>
                                            <span class="align-middle">034675600</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body pb-0 d-none">
                                    <h5 class="section-label mb-1">
                                        <span class="align-middle">Lọc</span>
                                    </h5>
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input select-all" id="select-all" checked />
                                        <label class="custom-control-label" for="select-all">Tất cả</label>
                                    </div>
                                    <div class="calendar-events-filter">
                                        <div class="custom-control custom-control-danger custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input input-filter" id="1" data-value="1" checked />
                                            <label class="custom-control-label" for="1">Chưa xác nhận</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input input-filter" id="2" data-value="2" checked />
                                            <label class="custom-control-label" for="2">Xác nhận</label>
                                        </div>
                                        <div class="custom-control custom-control-warning custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input input-filter" id="3" data-value="3" checked />
                                            <label class="custom-control-label" for="3">Không đến</label>
                                        </div>
                                        <div class="custom-control custom-control-success custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input input-filter" id="4" data-value="4" checked />
                                            <label class="custom-control-label" for="4">Hủy</label>
                                        </div>
                                        <div class="custom-control custom-control-info custom-checkbox">
                                            <input type="checkbox" class="custom-control-input input-filter" id="5" data-value="5" checked />
                                            <label class="custom-control-label" for="5">Đã đến</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <img src="/backend/app-assets/images/pages/calendar-illustration.png" alt="Calendar illustration" class="img-fluid" />
                            </div>
                        </div>
                        <!-- /Sidebar -->

                        <!-- Calendar -->
                        <div class="col position-relative">
                            <div class="card shadow-none border-0 mb-0 rounded-0">
                                <div class="card-body pb-0">
                                    <div id="calendar">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Calendar -->
                        <div class="body-content-overlay"></div>
                    </div>
                </div>

                <div class="modal fade text-left" id="xep-lich" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel16"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-validate" enctype="multipart/form-data" id="frm-add" style="font-size: 12px;">
                                    <div class="row">
                                        <span class="col-6">Tên khách hàng:</span>
                                        <span class="col-6">Nguyễn Văn Hùng</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Số điện thoại:</span>
                                        <span class="col-6">0346756000</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Dịch vụ:</span>
                                        <span class="col-6">Niềng răng</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Thời lượng:</span>
                                        <span class="col-6">45 phút</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="doctor">Tên tình trạng</label>
                                        <select class="select2 select-label form-control w-100" id="doctor" name="doctor">
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">Giờ vào</label>
                                        <input type="text" id="start_time" name="start_time" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">Giờ ra</label>
                                        <input type="text" id="end_time" name="end_time" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Mô tả</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                                    </div>

                                    <div class="d-flex flex-sm-row flex-column mt-2">
                                        <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar Add/Update/Delete event modal-->
                <!-- <div class="modal modal-slide-in event-sidebar fade" id="xep-lich">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">Xếp lịch</h5>
                            </div>
                            <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                <form class="event-form needs-validation" data-ajax="false" novalidate>
                                    <div class="form-group position-relative">
                                        <label for="booking-date" class="form-label">Ngày, giờ</label>
                                        <input type="text" class="form-control" id="booking-date" name="booking_date" placeholder="Ngày, giờ" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Tên khách hàng</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Event Title" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-number" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone-number" name="phone_number" placeholder="Event Title" required />
                                    </div>
                                    <div class="form-group select2-primary">
                                        <label for="services" class="form-label">Dịch vụ</label>
                                        <select class="select2 select-add-guests form-control w-100" id="services" multiple>
                                            <option data-avatar="1-small.png" value="Jane Foster">Jane Foster</option>
                                            <option data-avatar="3-small.png" value="Donna Frank">Donna Frank</option>
                                            <option data-avatar="5-small.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                                            <option data-avatar="7-small.png" value="Lori Spears">Lori Spears</option>
                                            <option data-avatar="9-small.png" value="Sandy Vega">Sandy Vega</option>
                                            <option data-avatar="11-small.png" value="Cheryl May">Cheryl May</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Tình trạng</label>
                                        <select class="select2 status form-control w-100" id="status" name="status">
                                            <option data-label="primary" value="Business" selected>Xác nhận</option>
                                            <option data-label="danger" value="Personal">Chưa xác nhận</option>
                                            <option data-label="warning" value="Family">Không đến</option>
                                            <option data-label="success" value="Holiday">Hủy</option>
                                            <option data-label="info" value="ETC">Đã đến</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nội dung đặt hẹn</label>
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group d-flex">
                                        <button type="submit" class="btn btn-primary add-event-btn mr-1">Add</button>
                                        <button type="button" class="btn btn-outline-secondary btn-cancel" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary update-event-btn d-none mr-1">Update</button>
                                        <button class="btn btn-outline-danger btn-delete-event d-none">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--/ Calendar Add/Update/Delete event modal-->
            </section>
            <!-- Full calendar end -->

        </div>
    </div>
</div>

@endsection

@push('js')
<script src="/backend/app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="/backend/app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
<script src="/backend/assets/js/examination-schedule.js"></script>
@endpush