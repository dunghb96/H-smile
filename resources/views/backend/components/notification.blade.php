<!-- Notification -->
@if(Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('status') }} alert-message">
        {{ Session::get('flash_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
@endif

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->