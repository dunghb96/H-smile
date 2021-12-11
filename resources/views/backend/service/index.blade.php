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
                    <a href="{{ route('service.add') }}" class="btn btn-success float-left m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Parent_ID</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($service as $item)
                                        <tr id="row-id-{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $item->name }} </td>
                                            <td><img src="{{asset('storage/'.$item->image)}}" style="width: 70px;"></td>

                                            <td> {{ $item->price }} </td>
                                            <td> {!! $item->description !!} </td>
                                            <td> {{ $item->parent_id   }}</td>
                                            <td>@if($item->status==1)
                                                <span class="text text-danger">Ẩn </span>
                                                @elseif($item->status==2)
                                                <span class="text text-warning">Hiện</span>

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('service.edit',['id'=>$item->id])}}" class="btn btn-primary waves-effect waves-light btn-primary mb-1"> Sửa</a>
                                                <a href="{{route('service.delete',['id'=>$item->id])}}" onclick="return confirm('Bạn chắc chắn muốn xoá?')" class="btn btn-danger waves-effect waves-light btn-danger mb-1">Xoá</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <!-- Pagination -->

                            </div>
                            <div class="col-md-12">
                                {{$service->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection