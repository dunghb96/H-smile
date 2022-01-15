@extends('frontend.layouts.app')

@section('main-content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url(/frontend/images/resources/breadcrumb-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-left">
                            <h2>Đặt lịch khám</h2>
                        </div>
                        <div class="breadcrumb-menu float-right">
                            <ul class="clearfix">
                                <li><a href="{{ route('hsmile.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">Đặt lịch khám</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Appointment area -->
    <div class="appointment-area2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title max-width text-center">
                        @if($orderOne->status == "2")
                            <h1 class="text-success">Hóa đơn đã thanh toán thành công</h1>
                        @else
                            <h1>Hóa đơn thanh toán</h1>
                        @endif
                        <p>Tại đây, bạn có thể thanh toán hóa đơn qua hình thức ngân hàng Vietcombank, MBbank ...</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">
                    <div class="appointment-form-left">
                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                              rel="stylesheet"/>

                        <div class="page-content container">
                            <div class="page-header text-blue-d2">
                                <h1 class="page-title text-secondary-d1">
                                    Hóa đơn
                                    <small class="page-info">
                                        <i class="fa fa-angle-double-right text-80"></i>
                                        ID: #{{"A000" . $orderOne->id}}
                                    </small>
                                </h1>

                                <div class="page-tools">
                                    <div class="action-buttons">
                                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                            Print
                                        </a>
                                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                            Export
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="container px-0">
                                <div class="row mt-4">
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center text-150">
                                                    <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                                    <span class="text-default-d3">THANH TOÁN ONLINE</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .row -->

                                        <hr class="row brc-default-l1 mx-n1 mb-4"/>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <span class="text-sm text-grey-m2 align-middle font-weight-bold">Thông tin người dùng: </span>
                                                    <span
                                                        class="text-sm text-grey-m2 align-middle">{{ $infoPatien->full_name }}</span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <div class="my-1">
                                                        {{ $infoPatien->email }}
                                                    </div>
                                                    <div class="my-1">
                                                        {{ $infoPatien->address }}
                                                    </div>
                                                    <div class="my-1"><i
                                                            class="fa fa-phone fa-flip-horizontal text-secondary"></i>
                                                        <b class="text-600"> {{ $infoPatien->phone_number }}</b></div>
                                                </div>
                                            </div>
                                            <!-- /.col -->

                                            <div
                                                class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                <hr class="d-sm-none"/>
                                                <div class="text-grey-m2">
                                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                        Thông tin hóa đơn
                                                    </div>

                                                    <div class="my-2"><i
                                                            class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                            class="text-600 text-90">ID:</span>#{{"A000" . $orderOne->id}}
                                                    </div>

                                                    <div class="my-2"><i
                                                            class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                            class="text-600 text-90">Ngày:</span> {{date('d/m/Y H:i', strtotime($orderOne->created_at))}}
                                                    </div>

                                                    <div class="my-2"><i
                                                            class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                                            class="text-600 text-90">Trạng thái thanh toán:</span>
                                                        <div id="statusBank">
                                                            @if($orderOne->status == "1")
                                                                <span class="badge badge-warning badge-pill px-25"
                                                                >Chưa thanh toán</span>
                                                            @elseif($orderOne->status == "2")
                                                                <span class="badge badge-success badge-pill px-25"
                                                                >Đã thanh toán</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <div class="mt-4">

                                            <table class="table">
                                                <thead style="background-color: #32b6a1">
                                                <tr class="text-white">
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Dịch vụ</th>
                                                    <th scope="col">Thời gian</th>
                                                    <th scope="col">Chi phí</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orderDetailOne as $ido)
                                                    <tr>
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <td>{{ \App\Models\Service::find($ido->service_id)->name }}</td>
                                                        <td>{{ \App\Models\Service::find($ido->service_id)->time . " Phút" }}</td>
                                                        <td>{{ number_format(\App\Models\Service::find($ido->service_id)->price) }}
                                                            VNĐ
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>


                                            <div class="row border-b-2 brc-default-l2"></div>

                                            @if($orderOne->status == "1")
                                                <div>
                                                    <p class="font-weight-bold">Thông tin thanh toán</p>
                                                    <p class="">STK: 0101001194240</p>
                                                    <p class="">CTK: NGUYEN VAN LONG</p>
                                                    <img src="{{asset('/uploads/qrpay/Capture.JPG')}}" width="150"/>
                                                </div>
                                            @endif
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                    @if($orderOne->status == "1")
                                                        Nội dung chuyển khoản: {{$orderOne->pay_content}}
                                                    @endif

                                                </div>

                                                <div
                                                    class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            Tổng tiền
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-120 text-secondary-d1">{{number_format($orderOne->total_price)}} VNĐ</span>
                                                        </div>
                                                    </div>

                                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                        <div class="col-7 text-right">
                                                            Tổng tiền cần thanh toán
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-150 text-success-d3 opacity-2">{{number_format($orderOne->total_price)}} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr/>

                                            <div>
                                                <span class="text-secondary-d1 text-105">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</span>

                                                @if($orderOne->status == "1")

                                                    <input type="text" value="{{ $orderOne->id }}" id="order_id" hidden>
                                                    <button type="button" id="payNow"
                                                            class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0"
                                                            onclick="pay()">
                                                        Thanh toán
                                                        ngay
                                                    </button>

                                                    <button type="button" id="payNow2"
                                                            class="btn btn-white btn-bold px-4 float-right mt-3 mt-lg-0 border-info"
                                                            style="display: none">Đang kiểm tra <img id="loadBank"
                                                                                                     src="https://i.ibb.co/vmNTnG9/Pulse-1s-200px.gif"
                                                                                                     height="27"
                                                                                                     width="27">
                                                    </button>
                                                @elseif($orderOne->status == "2")
                                                    <button type="button"
                                                            class="btn btn-secondary btn-bold px-4 float-right mt-3 mt-lg-0"
                                                            disabled>
                                                        Đã thanh toán
                                                    </button>
                                                @endif


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($orderOne->status == "1")
                            <div>
                                <span class="text-danger">Không đóng trình duyệt khi thanh toán </span>
                            </div>
                        @endif

                    </div>


                </div>
            </div>
        </div>
    </div>

    <h1 id="theh1"></h1>
    <!--End Appointment area -->
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1, .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1, .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4, .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder, .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25, .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25, .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4, .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }

    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="/frontend/assets/js/appointment.js"></script> --}}

    <script>

        document.getElementById("payNow").addEventListener("click", onOfBtnBank);

        function onOfBtnBank() {
            document.querySelector("#payNow").style.display = "none";
            document.querySelector("#payNow2").style.display = "block";
        }

        function pay() {
            console.log("Đã gửi yêu cầu thanh toán");
            $.ajax({
                type: "get",
                dataType: "json",
                url: "/payOrder/" + $("#order_id").val(),
                contentType: false,
                processData: false,

                success: function (data) {
                    if (data.status == "2") {
                        const htmlStatusBank = `<span class="badge badge-success badge-pill px-25"
                                                                  id="statusBank">Đã thanh toán</span>`;
                        const imgLoadBank = `<span>Đã thanh toán</span>`
                        $('#statusBank').html(htmlStatusBank);
                        $("#loadBank").remove();
                        $('#payNow2').html(imgLoadBank);
                        location.reload();
                    } else {
                        setInterval(pay, 20000);
                        console.log("check tiếp")
                    }
                }

            })


        }


    </script>



@endpush


