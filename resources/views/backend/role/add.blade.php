@extends('backend.layouts.app')

@section('title')
Thêm mới quyền
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('backend.layouts.content-header', ['page' => 'Thêm mới quyền'])
    <div class="row">
        <div class="col-md-12">
            @include('backend.components.notification')
        </div>
        <div class="col-md-12">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 control-label col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-2 custom-control custom-checkbox">
                                <input type="checkbox" id="check-all" class="custom-control-input">
                                <label class="custom-control-label" for="check-all">Permissions</label>
                            </div>

                            @foreach($permissionGroups as $group)
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $group->name }}</h4><br>
                                    <div class="row">
                                        @foreach($group->permissions as $permission)
                                        <div class="col-md-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}" class="custom-control-input" value="{{ $permission->id }}">
                                                <label class="custom-control-label" for="permission-{{ $permission->id }}">{{ $permission->title }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
@endsection