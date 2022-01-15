@extends('backend.layout.app')

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
                                    <button class="btn btn-primary btn-toggle-sidebar btn-block" data-toggle="modal" data-target="#add-new-sidebar">
                                        <span class="align-middle">Thêm lịch hẹn mới</span>
                                    </button>
                                </div>
                                <div class="card-body pb-0">
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
                <!-- Calendar Add/Update/Delete event modal-->
                <div class="modal modal-slide-in event-sidebar fade" id="add-new-sidebar">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">Đặt lịch</h5>
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
<script src="/backend/assets/js/booking.js"></script>
@endpush