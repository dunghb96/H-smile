@extends('backend.layouts.app')
@section('title', 'Update profile')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('backend.layouts.content-header', ['page' => 'Cập nhật tài khoản'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('backend.components.notification')
                    <div class="card">
                        <form action="" method="POST" class="form-horizontal pt-3">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" value="{{ old('name') ?? $dataUser->name }}" class="form-control" required>
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 control-label col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" name="email" value="{{ old('email') ?? $dataUser->email }}" class="form-control" required>
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="old_password" class="col-sm-2 control-label col-form-label">Old password</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="old_password" name="old_password" value="" class="form-control" minlength="8">
                                        @error('old_password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 control-label col-form-label">New password</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="{{ __('Leave blanl if you don\'t want to change password') }}" class="form-control" minlength="8">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 control-label col-form-label">Confirm new password</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{ __('Leave blanl if you don\'t want to change password') }}" class="form-control" minlength="8">
                                        @error('password_confirmation')
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
@endsection()