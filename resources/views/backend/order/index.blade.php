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
                        <h2 class="content-header-title float-left mb-0">Đơn hàng</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Đơn hàng
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
                                            <th>Dịch vụ</th>
                                            <th>Thời lượng</th>
                                            <th>Tổng chi phí</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <!-- <div class="modal modal-slide-in new-user-modal fade" id="addnew">
                                <div class="modal-dialog">
                                    <form class="modal-content pt-0" id="frm-add">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title"></h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
                                            <input type="hidden" id="patient_code" name="patient_code" />
                                            <div class="form-group" id="customer-div">
                                                <label for="customer">Khách hàng</label>
                                                <select class="form-control" id="customer" name="customer" onchange="changeKH()">
                                                   
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="services">Dịch vụ</label>
                                                <select class="select2 form-control" id="services" name="services[]" multiple="multiple" required>
                                                   
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="date_at">Ngày</label>
                                                <input type="text" id="date_at" name="date_at" class="form-control flatpickr-basic" placeholder="DD/MM/YYYY" />
                                            </div>
                                            <div class="form-group">
                                                <label for="shift">Ca hẹn</label>
                                                <select class="form-control" id="shift" name="shift">
                                                    <option value="1">Sáng</option>
                                                    <option value="2">Chiều</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Họ và tên" >
                                            </div>
                                            <div class="form-group">
                                                <label>Tuổi</label>
                                                <input type="number" class="form-control" id="age" name="age" placeholder="Tuổi">
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Số điện thoại" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" >
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block mb-1">Giới tính</label>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="nam" name="gioi_tinh" class="custom-control-input" value="0" />
                                                    <label class="custom-control-label" for="nam">Nam</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="nu" name="gioi_tinh" class="custom-control-input" value="1" />
                                                    <label class="custom-control-label" for="nu">Nữ</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="khac" name="gioi_tinh" class="custom-control-input" value="2" />
                                                    <label class="custom-control-label" for="khac">Khác</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="note">Mô tả</label>
                                                <textarea id="note" name="note" rows="3" class="form-control" placeholder="Mô tả tình trạng"></textarea>
                                            </div>
                                            <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
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
<script src="/backend/assets/js/order.js"></script>
@endpush
