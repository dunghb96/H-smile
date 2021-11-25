@extends('backend.layouts.app')

@section('title')
    Danh sách bài viết
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
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Short_desc</th>
                                                <th scope="col">Content</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($posts as $post)
                                            <tr id="row-id-{{ $post->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $post->title }} </td>
                                                <td> {{ $post->thumbnail }} </td>
                                                <td> {{ $post->short_desc }} </td>
                                                <td> {{ $post->content }} </td>
                                                <td> <a href="{{ route('post.detail', ['id'=>$post->id]) }}" class="btn btn-warning"> Xem chi tiết </a> </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <!-- Pagination -->
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
