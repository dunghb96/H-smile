@extends('backend.layouts.app')

@section('title')
Danh sách dich vu
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @includeIf('backend.components.notification')
    @include('backend.layouts.content-header', ['page' => 'Danh sách dich vu'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('addService') }}" class="btn btn-success float-left m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Status</th>
                                            <th>Acction</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($service as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>

                                            <td><img src="{{asset('storage/'.$item->image)}}" style="width: 70px;"></td>
                                            <td>{{$item->detail}}</td>
                                            <td>@if($item->status==1)
                                                <span class="text text-danger">Tạm Ngưng</span>
                                                @elseif($item->status==2)
                                                <span class="text text-warning">Đang Tiến Hành</span>
                                                @else
                                                <span class="text text-success">Hoàn Thành</span>
                                                @endif
                                            </td>



                                            <td>
                                                <a href="{{route('editService',['id'=>$item->id])}}" class="btn btn-primary waves-effect waves-light btn-primary mb-1"> Sửa</a>
                                                <a href="{{route('deleteService',['id'=>$item->id])}}" onclick="return confirm('Bạn chắc chắn muốn xoá?')" class="btn btn-danger waves-effect waves-light btn-danger mb-1">Xoá</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <!-- Pagination -->

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