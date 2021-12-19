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
                        <h2 class="content-header-title float-left mb-0">Blog</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Bài viết
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Row grouping -->
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-datatable">
                                <table class="datatables-basic table" id="tableBasic">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Hình ảnh</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="modal new-user-modal fade" id="addnew">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content pt-0">
                                        <div class="modal-header mb-1">
                                            <h5 class="modal-title">Thêm bài viết mới</h5>
                                        </div>
                                        <div class="modal-body flex-grow-1">
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

                                                <!-- <div class="card">
                                                    <div class="card-body"> -->
                                                <div class="m-2 custom-control custom-checkbox">
                                                    <input type="checkbox" id="check-all" class="custom-control-input">
                                                    <label class="custom-control-label" for="check-all">Permissions</label>
                                                </div>
                                                <!-- <div class="card">
                                                    <div class="card-body"> -->
                                                @foreach($permissionGroups as $group)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4>{{ $group->name }}</h4>
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
                                                <!-- </div>
                                                </div> -->
                                                <button type="button" onclick="save()" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Cập nhật</button>
                                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Bỏ qua</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <!--/ Row grouping -->
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $("#check-all").change(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script src="/backend/dist/js/pages/form/tinymce/tinymce.js"></script>
<script src="/backend/assets/js/blog.js"></script>
@endpush