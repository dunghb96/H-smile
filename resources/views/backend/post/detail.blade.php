@extends('backend.layouts.app')

@section('title')
    Chi tiết bài viết
@endsection

@section('content')
    @include('backend.layouts.content-header', ['page' => 'Chi tiết bài viết'])

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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>{{ $post->title }}</h3>
                                        <p>Ngày đăng : {{ $post->created_at }}</p>
                                        <p>{{ $post->short_desc }}</p>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-4">
                                        <img width="200" src="https://picsum.photos/200/300" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <p>
                                        {{ $post->content }}
                                    </p>
                                </div>
                                <div class="row">
                                    <a href="" class="btn btn-warning"> Sửa </a>&nbsp;

                                    <a href="" class="btn btn-danger"> Xóa </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
