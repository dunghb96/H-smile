@extends('backend.layouts.app')

@section('title')
Danh sách tài khoản
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @includeIf('backend.components.notification')
    @include('backend.layouts.content-header', ['page' => 'Danh sách tài khoản'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('user.add') }}" class="btn btn-success float-left m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Member since</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $user)
                                        <tr id="row-id-{{ $user->id }}">
                                            <td>
                                                <img src="{{!empty($user->avatar) ? $user->avatar : '/images/no-image.png' }}" style="max-width: 125px;">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @foreach($user->getRoleNames() as $role)
                                                    {{ $role }} {{ ! $loop->last ? ', ' : '' }}
                                                @endforeach
                                            </td>
                                            <td class="bt-switch">
                                                @if($user->id <> Auth::id())
                                                    @can('edit_users')
                                                    <input type="checkbox" class="change-status" data-field="status" data-item-id="{{ $user->id }}" data-size="normal" data-on-color="success" data-on-text="ON" data-off-text="OFF" {{ $user->status == 1 ? 'checked' : '' }} />
                                                    @endcan
                                                @else
                                                    <span class="badge badge-{{ $user->status == 1 ? 'success' : 'danger' }}">
                                                        {{ data_get($status, $user->status, '-') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                @if($user->id <> Auth::id())
                                                    @include('backend.components.button.edit', ['route' => route('user.edit', $user->id)])
                                                    @include('backend.components.button.delete', ['route' => route('user.delete'), 'id' => $user->id])
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
    <link href="/backend/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/backend/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">
@endpush

@push('js')
<script src="/backend/plugins/toastr/toastr.min.js"></script>
<script src="/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $(".bt-switch input[type='checkbox']").bootstrapSwitch();

    $('.change-status').on('switchChange.bootstrapSwitch', function(event) {
        let field = $(this).data('field');
        let itemId = $(this).data('item-id');
        let isChecked = event.target.checked;

        if (itemId) {
            postData("{{ route('user.change_status') }}", {
                'field': field,
                'item_id': itemId,
                'status': isChecked ? 1 : 0,
                '_token': '{{ csrf_token() }}'
            });
        }
    });
</script>
@endpush