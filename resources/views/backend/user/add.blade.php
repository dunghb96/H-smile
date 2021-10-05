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
                                    <label>Avatar</label>
                                    @includeIf('backend.components.select_file', [
                                    'keyId' => "img_url",
                                    'inputName' => "avatar",
                                    'inputValue' => old("avatar"),
                                    'lfmType' => 'file',
                                    'note' => '1700 x 900px',
                                    ])
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" />
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                                    @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-sm-2 control-label col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 role-placeholder" name="role[]" multiple="multiple" style="width: 100%;" required>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-2">Status</label>
                                    <div class="col-md-10">
                                        @foreach($status as $key => $statusName)
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="status" id="status-{{ $key }}" class="custom-control-input" value="{{ $key }}" {{ old('status') === $key || $key === 'Active' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="status-{{ $key }}">{{ $statusName }}</label>
                                        </div>
                                        @endforeach
                                        @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
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