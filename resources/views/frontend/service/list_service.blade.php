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
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                src="{{asset('frontend/assets/img/nhakhoa/mao-rang-su.jpg')}}" role="img" aria-label="Placeholder: Thumbnail"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#55595c"></rect>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                <div class="card-body">
                  <h4>Bọc răng sứ</h4>
                  <p>Bọc răng sứ là giải pháp tái tạo hình thể răng hoàn hảo giúp khắc phục nhanh chóng tình trạng răng
                    nhiễm màu, răng vàng ố, răng bị sứt mẻ hoặc thân răng không đều...</p>
                  <h3><a href="bocrangsu.html" class="btn btn-secondary">Xem thêm >></a> </h3>


                </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                src="{{asset('frontend/assets/img/nhakhoa/so-sanh-invisalign-mac-cai-1400x745.jpg')}}" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">

                <div class="card-body">
                  <h4>Niềng răng thẩm mỹ</h4>
                  <p>Niềng răng là phương pháp sử dụng khí cụ nha khoa chuyên dụng được gắn cố định hoặc tháo lắp trên
                    răng để giúp di chuyển và sắp xếp răng về đúng vị trí</p>
                  <h3><a href="#" class="btn btn-secondary">Xem thêm >></a></h3>

                </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                src="{{asset('frontend/assets/img/nhakhoa/viem-nha-chu.jpg')}}" role="img" aria-label="Placeholder: Thumbnail"
                preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">

                <div class="card-body">
                  <h4>Bệnh lý nha chu</h4>
                  <p>Bệnh nha chu là căn bệnh phổ biến ở vùng răng miệng. Đây là bệnh xuất hiện ở người trung niên,
                     và nó cũng chính là nguyên nhân gây ra tình trạng mất răng ở những người lớn tuổi.</p>
                  <h3><a href="#" class="btn btn-secondary">Xem thêm >></a></h3>


                </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('frontend/assets/img/nhakhoa/OIP.jpg')}}"
                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">

                <div class="card-body">
                  <h4>Điều trị tủy</h4>
                  <p>Điều trị tủy là cách can thiệp hàng đầu trong trường hợp bị viêm tủy răng.
                    Đây là quy trình lần lượt từng bước nhằm giúp lấy sạch phần tủy răng bị viêm nhiễm, tổn thương bên
                    trong khoang tủy. Sau đó, ống chứa tủy sẽ được vệ sinh, trám kín lại và phục hồi răng. </p>
                  <h3><a href="#" class="btn btn-secondary">Xem thêm >></a></h3>


                </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('frontend/assets/img/nhakhoa/OIP (1).jpg')}}"
                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">

                <div class="card-body">
                  <h4>Chăm sóc răng miệng</h4>
                  <p>Quan tâm chăm sóc tốt sức khỏe răng miệng trong đời sống hằng ngày có thể giúp ngăn ngừa nhiều vấn
                    đề khi bạn ngày càng lớn tuổi hơn. Chăm sóc sức khỏe răng miệng đơn giản là chải (đánh) răng, dùng
                    chỉ nha khoa mỗi ngày và được thăm khám răng miệng định kỳ.</p>
                  <h3><a href="#" class="btn btn-secondary">Xem thêm >></a></h3>


                </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('frontend/assets/img/nhakhoa/OIP (2).jpg')}}"
                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">

                <div class="card-body">
                  <h4>Nhổ răng</h4>
                  <p>Nhổ răng khôn là một quá trình phẫu thuật được thực hiện bởi nha sĩ hoặc bác sĩ phẫu thuật răng
                    miệng để nhổ một hoặc nhiều răng khôn của bạn. Răng khôn là bốn răng vĩnh viễn mọc sau cùng ở độ
                    tuổi trưởng thành, nằm ở góc trong cùng của hàm trên và hàm dưới</p>
                  <h3><a href="#" class="btn btn-secondary">Xem thêm >></a></h3>


                </div>
            </div>
          </div>
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
