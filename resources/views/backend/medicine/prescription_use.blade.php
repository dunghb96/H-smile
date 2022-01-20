@php
    use Carbon\Carbon;
@endphp
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
                        <h2 class="content-header-title float-left mb-0">Đơn thuốc</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Đơn thuốc
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col">

                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper">
                                    <img width="50%" src="{{ asset('frontend/images/resources/logo.png') }}" />
                                    <br>
                                </div>
                                <p class="card-text mb-25"><span class="font-weight-bold">Tên khách hàng:</span> <span id="customer_name"> {{ $prescription_use->examinationSchedule->patient->full_name }} </span></p>
                                <p class="card-text mb-25"><span class="font-weight-bold">Địa chỉ:</span> <span id="customer_address">{{ $prescription_use->examinationSchedule->patient->address }}</span></p>
                                <p class="card-text mb-25"><span class="font-weight-bold">Số điện thoại:</span> <span id="customer_phone">{{ $prescription_use->examinationSchedule->patient->phone_number }}</span></p>
                                <p class="card-text mb-0"><span class="font-weight-bold">Email:</span> <span id="customer_email">{{ $prescription_use->examinationSchedule->patient->email }}</span></p>
                            </div>
                            <div class="mt-md-0 mt-2">
                                <h4 class="invoice-title">
                                    Đơn thuốc #000{{ $prescription_use->schedule_id }}
                                    <span class="invoice-number" id="order_id"></span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Ngày tạo: {{ Carbon::parse($prescription_use->created_at)->format('Y-m-d') }}</p>
                                    <p class="invoice-date" id="create_at"></p>
                                </div>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">Người tạo: {{ $prescription_use->examinationSchedule->doctors->name }}</p>
                                    <p class="invoice-date" id="order_status"></p>
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->
                    </div>
                </div>

            </div><br><br>
            <section>
                <div class="row">
                    <div class="col-12">
                        @if (isset($medicine))
                            <div class="container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên thuốc</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thời gian và liều lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicine as $key => $value)
                                            <tr>
                                                <td>{{$value}}</td>
                                                <td>{{$quantity[$key]}}</td>
                                                <td>{{$detail[$key]}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-10">
                                        <h4>Ghi chú</h4>
                                        <p>{{ $prescription_use->note }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col">
                                <a  style="margin: 0 auto;" class="btn btn-primary" href="{{ route('admin.editMedicineNew', ['id' => $prescription_use->id]) }}">Chỉnh sửa</a>
                                <a target="_blank" href="{{ route('schedule.in_medicine', ['id' => $prescription_use->id]) }}" class="btn btn-info" style="margin-right: 20px;">In đơn thuốc</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </section>
            <!--/ Row grouping -->
        </div>
    </div>
</div>

@endsection
