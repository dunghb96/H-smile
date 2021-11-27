@extends('backend.layouts.app')

@section('title')
Thêm mới tài khoản
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('backend.layouts.content-header', ['page' => 'Thêm mới tài khoản'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('backend.components.notification')
                    <div class="card">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name',$service->name) }}" />
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price',$service->price) }}" />
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description',$service->description) }}" />

                                </div>

                                <div class="form-group row">
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus" class="form-control custom-select" value="{{old('status')}}" name="Status">
                                            <option value="1" {{($service->status==1) ? 'selected' : ""}}>Tạm ngưng</option>
                                            <option value="2" {{($service->status==2) ? 'selected' : ""}}>Đang tiến hành</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card card-secondary">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputEstimatedBudget">Ảnh đại diện</label>
                                                <input type="file" name="image" value="{{$service->image}}" class="form-control">
                                                <img src="{{asset('storage/' . $service->image)}}" width="50%">
                                                @error('image')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="action-form">
                            <div class="form-group mb-0 text-center">
                                @includeIf('backend.components.button.submit')
                                @includeIf('backend.components.button.cancel')
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/pages/form/select2/select2.init.js') }}"></script>
@endpush