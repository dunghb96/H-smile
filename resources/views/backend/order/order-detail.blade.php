@extends('backend.layout.app')

@push('css')
<link rel="stylesheet" type="text/css" href="/backend/app-assets/css/pages/app-invoice.css">
@endpush

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-preview-wrapper">
                <div class="row invoice-preview">
                    <!-- Invoice -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card">
                            <div class="card-body invoice-padding pb-0">
                                <!-- Header starts -->
                                <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <img width="50%" src="{{ asset('frontend/images/resources/logo.png') }}" />
                                        </div>
                                        <p class="card-text mb-25"><span class="font-weight-bold">Tên khách hàng:</span> <span id="customer_name"></span></p>
                                        <p class="card-text mb-25"><span class="font-weight-bold">Địa chỉ:</span> <span id="customer_address"></span></p>
                                        <p class="card-text mb-25"><span class="font-weight-bold">Số điện thoại:</span> <span id="customer_phone"></span></p>
                                        <p class="card-text mb-0"><span class="font-weight-bold">Email:</span> <span id="customer_email"></span></p>
                                    </div>
                                    <div class="mt-md-0 mt-2">
                                        <h4 class="invoice-title">
                                            Đơn hàng
                                            <span class="invoice-number" id="order_id"></span>
                                        </h4>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Ngày tạo:</p>
                                            <p class="invoice-date" id="create_at"></p>
                                        </div>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Trạng thái:</p>
                                            <p class="invoice-date" id="order_status"></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Header ends -->
                            </div>

                            <!-- Invoice Description starts -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="py-1">STT</th>
                                            <th class="py-1">Dịch vụ</th>
                                            <th class="py-1">Thời lượng</th>
                                            <th class="py-1">Chi phí</th>
                                            <th class="py-1">Trạng thái</th>
                                            <th class="py-1">Tái khám</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-detail">

                                    </tbody>
                                </table>
                            </div>

                            <div class="card-body invoice-padding pb-0">
                                <div class="row invoice-sales-total-wrapper">
                                    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                        <p class="card-text mb-0">
                                            <span class="font-weight-bold">Người thanh toán:</span> <span class="ml-75" id="staff_name"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end order-md-3 order-1">
                                        <div class="invoice-total-wrapper">
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Tổng cộng:</p>
                                                <p class="invoice-total-amount" id="total_price"></p>
                                            </div>
                                            <!-- <div class="invoice-total-item">
                                                <p class="invoice-total-title">Discount:</p>
                                                <p class="invoice-total-amount">$28</p>
                                            </div>
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Tax:</p>
                                                <p class="invoice-total-amount">21%</p>
                                            </div>
                                            <hr class="my-50" />
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Total:</p>
                                                <p class="invoice-total-amount">$1690</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Description ends -->

                            <hr class="invoice-spacing" />

                            <!-- Invoice Note starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- <span class="font-weight-bold">Note:</span> -->
                                        <span>Cảm ơn bạn đã tin dùng dịch vụ của chúng tôi!</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Note ends -->
                        </div>
                    </div>
                    <!-- /Invoice -->

                    <!-- Invoice Actions -->
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
                                    Gửi đơn hàng
                                </button>
                                <!-- <button class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Download</button> -->
                                <a class="btn btn-outline-secondary btn-block mb-75" href="{{ route('order.print') }}" target="_blank">
                                    In
                                </a>
                                <!-- <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-edit.html"> Edit </a> -->
                                <!-- <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
                                    Thêm hóa đơn
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Actions -->
                </div>
            </section>

            <div class="modal fade text-left" id="hen-lai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                                    <label for="date_at">Ngày</label>
                                    <input type="text" id="date_at" name="date_at" class="form-control flatpickr-basic" placeholder="DD/MM/YYYY" />
                                </div>
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
                                    <input type="text" id="end_time" name="end_time" class="form-control flatpickr-time text-left" placeholder="HH:MM" />
                                </div>

                                <div class="form-group">
                                    <label for="note">Mô tả</label>
                                    <textarea name="note" class="form-control" id="note" cols="30" rows="5"></textarea>
                                </div>

                                <div class="d-flex flex-sm-row flex-column mt-2">
                                    <button type="button" onclick="saveHL()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Send Invoice Sidebar -->
            <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Send Invoice</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form>
                                <div class="form-group">
                                    <label for="invoice-from" class="form-label">From</label>
                                    <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                                </div>
                                <div class="form-group">
                                    <label for="invoice-to" class="form-label">To</label>
                                    <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                                </div>
                                <div class="form-group">
                                    <label for="invoice-subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                                </div>
                                <div class="form-group">
                                    <label for="invoice-message" class="form-label">Message</label>
                                    <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11" placeholder="Message...">
                                        Dear Queen Consolidated,
                                        Thank you for your business, always a pleasure to work with you!
                                        We have generated a new invoice in the amount of $95.59
                                        We would appreciate payment of this invoice by 05/11/2019</textarea>
                                </div>
                                <div class="form-group">
                                    <span class="badge badge-light-primary">
                                        <i data-feather="link" class="mr-25"></i>
                                        <span class="align-middle">Invoice Attached</span>
                                    </span>
                                </div>
                                <div class="form-group d-flex flex-wrap mt-2">
                                    <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Send Invoice Sidebar -->

            <!-- Add Payment Sidebar -->
            <!-- <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Add Payment</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form>
                                <div class="form-group">
                                    <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="amount">Payment Amount</label>
                                    <input id="amount" class="form-control" type="number" placeholder="$1000" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment-date">Payment Date</label>
                                    <input id="payment-date" class="form-control date-picker" type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment-method">Payment Method</label>
                                    <select class="form-control" id="payment-method">
                                        <option value="" selected disabled>Select payment method</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Paypal">Paypal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment-note">Internal Payment Note</label>
                                    <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
                                </div>
                                <div class="form-group d-flex flex-wrap mb-0">
                                    <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /Add Payment Sidebar -->

        </div>
    </div>
</div>
@endsection
@push('js')
<script src="/backend/assets/js/order-detail.js"></script>
@endpush