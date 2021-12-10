@extends('backend.layouts.app')

@section('title')
Thêm tin
@endsection
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('backend.layouts.content-header', ['page' => 'Thêm Bảng tin'])


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
                                    <label>Ảnh thu nhỏ</label>
                                    @includeIf('backend.components.select_file', [
                                    'keyId' => "img_url",
                                    'inputName' => "image",
                                    'inputValue' => old("image") ?? $new->image,
                                    'lfmType' => 'file',
                                    'note' => '1700 x 900px',
                                    ])
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') ?? $new->title }}" />
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <input type="text" class="form-control" name="short_desc" value="{{ old('short_desc') ?? $new->short_desc }}" />
                                    @error('short_desc')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea type="text" class="form-control ckeditor" id="content" name="content">{{ $new->content  }}</textarea>
                                    @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
<script>
    CKEDITOR.replace('content');
</script>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/pages/form/select2/select2.init.js') }}"></script>
@endpush