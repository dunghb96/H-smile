@extends('frontend.layout.index')
@section('content')
<section>
  <br><br><br>
  <center>
    <h2>CÁC DỊCH VỤ CỦA CHÚNG TÔI</h2>
  </center>
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($service as $item)
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="200" src="{{asset('storage/'.$item->image)}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#55595c"></rect>
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">
              <div class="card-body">
                <h4>{{$item->name}}</h4>
                <p style=" display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 4;
 overflow: hidden;">{{$item -> description}}...</p>
                <h3><a href="bocrangsu.html" class="btn btn-secondary">Xem thêm >></a> </h3>


              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endsection
@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection