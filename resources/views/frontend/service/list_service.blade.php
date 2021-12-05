@extends('frontend.layout.index')
@section('content')
<section class="breadcrumbs">
</section>
<section>
    <center>
        <h2>CÁC DỊCH VỤ CỦA CHÚNG TÔI</h2>
    </center>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($service as $item)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="200" src="{{ asset('storage/' . $item->image) }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                            <div class="card-body">
                                <h4>{{ $item->name }}</h4>
                                <p style=" display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 4; overflow: hidden;">
                                    {!! $item->description !!}...</p>
                                <h3><a href="bocrangsu.html" class="btn btn-secondary">Xem thêm >></a> </h3>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
@endsection
