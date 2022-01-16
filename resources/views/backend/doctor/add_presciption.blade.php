@extends('backend.layout.app')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @if (isset($info))
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Nha sĩ</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">Nha sĩ
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Row grouping -->
                <form action="{{ route('admin.doctor.store_prescription')}}" id="add_pre" method="post" >
                    @csrf
                    {{-- @dd($info->id) --}}
                    <input type="hidden" name="schedule_id" value="{{ $info->id }}" >
                        <div class="add_medicine">
                            <div class="row add_div">
                                <div class="col-2">
                                    <select class="form-control" name="medicine_id[]" id="" required>
                                        @foreach ($medicine as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="total_quantity[]" placeholder="Số lượng" required>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" name="detail[]" placeholder="Thời gian và liều lượng" required>
                                </div>
                                <div class="col-2">
                                    <a class="btn btn-success" onclick="addMedicine()">Thêm</a>
                                    <a class="btn btn-danger" onclick="deleteMedicine()">Xóa</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-10">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" placeholder=""name="note" id="" cols="80" rows="10"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <button type="submit"  class="btn btn-primary">Tạo đơn thuốc</button>
                            </div>
                        </div>
                    </form>
                    <!--/ Row grouping -->
                </div>
            </div>
        @endif
        @if (isset($pre))
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Nha sĩ</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">Nha sĩ
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Row grouping -->
                <form action="{{ route('admin.doctor.store_edit_prescription', ['id' => $pre->id])}}" id="edit_pre" method="post" >
                    @csrf
                    {{-- @dd($info->id) --}}
                    {{-- <input type="hidden" name="schedule_id" value="{{ $pre->id }}" > --}}
                        <div class="add_medicine">
                            @foreach ($medicines as $key => $value)
                                <div class="row add_div">
                                    <div class="col-2">
                                        <select class="form-control" name="medicine_id[]" id="" required>
                                            @foreach ($medicine as $row)
                                                <option value="{{ $row->name }}" {{ $row->name == $value ? 'selected' : '' }}>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="total_quantity[]" value="{{ $quantity ? $quantity[$key] : ''}}"placeholder="Số lượng" required>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="detail[]" value="{{ $detail ? $detail[$key] : ''}}" placeholder="Thời gian và liều lượng" required>
                                    </div>
                                    <div class="col-2">
                                        <a class="btn btn-success" onclick="addMedicine()">Thêm</a>
                                        <a class="btn btn-danger" onclick="deleteMedicine()">Xóa</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-10">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" placeholder="" name="note" id="" cols="80" rows="10">{{ $pre->note }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <button type="submit"  class="btn btn-primary">Sửa đơn thuốc</button>
                            </div>
                        </div>
                    </form>
                    <!--/ Row grouping -->
                </div>
            </div>
        @endif
    </div>





@endsection

@push('css')
    <style>
        .add_div {
            margin-bottom: 10px;
        }
    </style>
@endpush

@push('js')
<script src="{{ asset('user_asset/js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user_asset/js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('user_asset/js/jquery-validation/localization/messages_ja.min.js') }}"></script>
<script>
    function addMedicine () {
        $(".add_medicine").append(`
            <div class="row add_div">
                <div class="col-2">
                    <select class="form-control" name="medicine_id[]" id="" required>
                        @foreach ($medicine as $row)
                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="total_quantity[]" placeholder="Số lượng" required>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" name="detail[]" placeholder="Thời gian và liều lượng" required>
                </div>
                <div class="col-2">
                    <a class="btn btn-success" onclick="addMedicine()">Thêm</a>
                    <a class="btn btn-danger delete_medicine" onclick="deleteMedicine()">Xóa</a>
                </div>
            </div>
        `);
        function deleteMedicine(e) {
            console.log(123);
            e.parent().parent().remove();
        }

        function deleteMedicine(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        }
        $(function() {
            $(document).on('click', '.delete_medicine', deleteMedicine);
        })
    }
    (function($) {
        var beenSubmitted = false;
        $('#add_pre').validate({
            rules: {
                'medicine_id[]': {
                    required: true,
                },
                'total_quantity[]': {
                    required: true,
                },
                'detail[]': {
                    required: true,
                    digits: true
                },
                note: {
                    required: true,
                }
            },
            messages: {
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                if (element.closest('.show-error').length > 0) {
                    element.closest('.show-error').find('#add_pre').after(error);
                } else {
                    error.insertAfter(element); // default error placement.
                }
            },

            submitHandler: function(form) {
                if (!beenSubmitted) {
                    beenSubmitted = true;
                    sendTransactionMessage();
                }
            },
        });
        $('#edit_pre').validate({
            rules: {
                'medicine_id[]': {
                    required: true,
                },
                'total_quantity[]': {
                    required: true,
                },
                'detail[]': {
                    required: true,
                },
                note: {
                    required: true,
                }
            },
            messages: {
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                if (element.closest('.show-error').length > 0) {
                    element.closest('.show-error').find('#edit_pre').after(error);
                } else {
                    error.insertAfter(element); // default error placement.
                }
            },

            submitHandler: function(form) {
                if (!beenSubmitted) {
                    beenSubmitted = true;
                    sendTransactionMessage();
                }
            },
        });
        $.validator.addMethod("noSpace", function(value, element) {
            return value == '' || value.trim().length != 0;
        }, "");
    })(jQuery)
</script>

@endpush
