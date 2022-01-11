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
                                        @foreach($schedules as $schedule)
                                            <a href="javascript:void(0)" id="schedule-{{$schedule['id']}}" data-id="{{$schedule['id']}}" class="list-group-item list-group-item-action">
                                                <span class="align-middle">#{{$schedule['order_id']}} {{$schedule['service_name']}}</span> <br>
                                                <span class="align-middle">{{$schedule['customer_name']}}</span> <br>
                                                <span class="align-middle">{{$schedule['phone_number']}}</span>
                                            </a>
                                        @endforeach
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
                                <form class="form-validate" enctype="multipart/form-data" id="frm-xl" style="font-size: 12px;">
                                    <div class="row">
                                        <span class="col-6">Tên khách hàng:</span>
                                        <span class="col-6" id="data-name"></span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Số điện thoại:</span>
                                        <span class="col-6" id="data-phone"></span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Dịch vụ:</span>
                                        <span class="col-6" id="data-service"></span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Thời lượng:</span>
                                        <span class="col-6" id="data-time"></span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="doctor">Bác sĩ</label>
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
                                        <input type="text" id="start_time" name="start_time" class="form-control flatpickr-time text-left" placeholder="HH:MM" onchange="gioRa()" />
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">Giờ ra</label>
                                        <input type="text" id="end_time" name="end_time" class="form-control flatpickr-time text-left" placeholder="HH:MM"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Mô tả</label>
                                        <textarea name="note" class="form-control" id="note" cols="30" rows="5"></textarea>
                                    </div>

                                    <div class="d-flex flex-sm-row flex-column mt-2">
                                        <button type="button" id="btn-xl" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar Add/Update/Delete event modal-->
                <div class="modal modal-slide-in event-sidebar fade">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">Thông tin lịch khám</h5>
                            </div>
                            <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                <form class="event-form needs-validation" data-ajax="false" id="frm-update">
                                    <div class="row">
                                        <span class="col-6">Tên khách hàng:</span>
                                        <span class="col-6" id="data-ename"></span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Số điện thoại:</span>
                                        <span class="col-6" id="data-ephone"></span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Dịch vụ:</span>
                                        <span class="col-6" id="data-eservice"></span>
                                    </div>
                                    <div class="row">
                                        <span class="col-6">Thời lượng:</span>
                                        <span class="col-6" id="data-etime"></span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="edoctor">Bác sĩ</label>
                                        <select class="select2 select-label form-control w-100" id="edoctor" name="doctor">
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="estart_time">Giờ vào</label>
                                        <input type="text" id="estart_time" name="start_time" class="form-control flatpickr-time text-left" placeholder="HH:MM" onchange="egioRa()" />
                                    </div>
                                    <div class="form-group">
                                        <label for="eend_time">Giờ ra</label>
                                        <input type="text" id="eend_time" name="end_time" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                    </div>

                                    <div class="form-group">
                                        <label for="enote">Mô tả</label>
                                        <textarea name="enote" class="form-control" id="note" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="form-group d-flex">
                                        <button type="submit" class="btn btn-primary add-event-btn mr-1">Add</button>
                                        <button type="submit" class="btn btn-primary update-event-btn d-none mr-1">Update</button>
                                        <button type="button" class="btn btn-outline-secondary btn-cancel mr-1" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-outline-danger btn-delete-event d-none">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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