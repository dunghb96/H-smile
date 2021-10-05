@extends('backend.layouts.app')

@section('title')
Danh sách quyền
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('backend.layouts.content-header', ['page' => 'Danh sách quyền'])

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
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $role)
                                        <tr id="row-id-{{ $role->id }}">
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>
                                            @if($role->name <> "Admin")
                                                @can('edit_roles')
                                                    @include('backend.components.button.edit', ['route' => route('role.edit', $role->id)])
                                                @endcan
                                                @can('delete_roles')
                                                    @include('backend.components.button.delete', ['route' => route('role.delete'), 'id' => $role->id])
                                                @endcan
                                            @endif
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