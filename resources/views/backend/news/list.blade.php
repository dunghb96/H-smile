@extends('backend.layouts.app')

@section('title')
    Danh sách tin tức
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('backend.layouts.content-header', ['page' => 'Danh sách tin tức'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.components.notification')
                        <a href="{{ route('news.add') }}" class="btn btn-success float-left m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tiêu đề</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $new)
                                            <tr>
                                                <td>{{$new->id}}</td>
                                                <td>{{$new->title}}</td>
                                                <td><img src="{{$new->image}}" height="50" width="50"></td>
                                                <td>{{$new->short_desc}}</td>

                                                <td>
{{--                                                    @if($new->id <> Auth::id())--}}
                                                        @include('backend.components.button.edit', ['route' => route('news.edit', $new->id)])
                                                     @include('backend.components.button.delete', ['route' => route('news.delete'), 'id' => $new->id])
{{--                                                    @endif--}}
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
