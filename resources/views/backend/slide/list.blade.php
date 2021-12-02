@extends('backend.layouts.app')

@section('title')
    Danh sách Slide
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('backend.layouts.content-header', ['page' => 'Danh sách slide'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.components.notification')
                        <a href="{{ route('slide.add') }}" class="btn btn-success float-left m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Thứ tự</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($slides as $slide)
                                            <tr>
                                                <td>{{$slide->rank}}</td>
                                                <td>{{$slide->short_desc}}</td>
                                                <td><img src="{{$slide->image}}" height="50" width="150"></td>
                                                <td>
{{--                                                    @if($slide->id <> Auth::id())--}}
                                                        @include('backend.components.button.edit', ['route' => route('slide.edit', $slide->id)])
                                                        @include('backend.components.button.delete', ['route' => route('slide.delete'), 'id' => $slide->id])
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
