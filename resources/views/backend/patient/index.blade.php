
@php
    use App\Models\Patients;
@endphp
@extends('backend.layouts.app')

@section('title')
Danh sách bệnh nhân
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @includeIf('backend.components.notification')
    @include('backend.layouts.content-header', ['page' => 'Danh sách tài khoản'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('user.add') }}" class="btn btn-success float-left m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Họ và Tên</th>
                                            <th scope="col">Giới tính</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Tuổi</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $patient)
                                        <tr id="row-id-{{ $patient->id }}">
                                            <td>$loop->iteration</td>
                                            <td>{{ $patient->name }}</td>
                                            <td> {{ Patients::GENDER[$patient->gender] }} </td>
                                            <td>{{ $patient->email }}</td>
                                            <td>{{ $patient->phone_number }}</td>
                                            <td>{{ $patient->name }}</td>
                                            <td>{{ $patient->address }}</td>
                                            <td>
                                                <a href="" class="btn btn-warning">Xem chi tiết</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
    <link href="/backend/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/backend/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">
@endpush

@push('js')
<script src="/backend/plugins/toastr/toastr.min.js"></script>
<script src="/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $(".bt-switch input[type='checkbox']").bootstrapSwitch();

    $('.change-status').on('switchChange.bootstrapSwitch', function(event) {
        let field = $(this).data('field');
        let itemId = $(this).data('item-id');
        let isChecked = event.target.checked;

        if (itemId) {
            postData("{{ route('user.change_status') }}", {
                'field': field,
                'item_id': itemId,
                'status': isChecked ? 1 : 0,
                '_token': '{{ csrf_token() }}'
            });
        }
    });
</script>
@endpush
