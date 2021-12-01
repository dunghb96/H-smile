@extends('backend.layouts.app')

@section('title')
    Lịch khám
@endsection

@section('content')
    @include('backend.layouts.content-header', ['page' => 'Danh sách bài viết'])

    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.components.notification')
                        <a href="{{ route('role.add') }}" class="btn btn-success float-left m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tên khách hàng</th>
                                                <th scope="col">Tuổi</th>
                                                <th scope="col">Lý do khám</th>
                                                <th scope="col">Giờ đăng ký</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($appointments as $row)
                                            <tr id="row-id-{{ $row->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->Patients->full_name ?? '' }} </td>
                                                <td> {{ $row->Patients->birth_date ?? '' }} </td>
                                                <td> {{ $row->Patients->reason ?? '' }} </td>
                                                <td> {{ $row->shift_time }} </td>
                                                <td> <a href="{{ route('post.detail', ['id'=>$row->id]) }}" class="btn btn-warning"> Xem chi tiết </a> </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <!-- Pagination -->
                                    {{ $appointments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
