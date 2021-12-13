$(function () {

    'use strict';
    // $('#doctor').attr('disabled',true);
    $('#doctor').val('').attr("disabled", true);

    var time = $('#time li');
    var timeat = $('#time .active').text();

    time.on('click', function () {
        time.removeClass('active');
        $(this).addClass('active');
        timeat = $('#time .active').text();
        $('#time_at').val(timeat);
    })

    loaddata();
    // sao nó bị chạy luôn lần đầu nhỉ

})

// anh viết hàm lấy dữ liệu doctor theo id dịch vụ thay đổi
function changeSV() {
    var service = $("#service").val();// này nó lấy value rồi
    var html = '';
        // gọi ajax lấy doctor có trường services like services ở trên rồi đổ dữ liệu ra select doctor( bỏ disabled của nó đi nhá)
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {service: service},
        url: "/appointment/get-doctor", // giờ anh tạo route rồi lấy dữ liệu doctor ra cho em nha OK
        success: function (data) {
            data.forEach(function (val, index) {
                var opt = '<option value="' + val.id + '">' + val.name + '</option>';
                html += opt;
                $('#doctor').append(html);
            });
            $('#doctor').val('').attr("disabled", false);
            // sao cái này vẫn disabled nhỉ
        },
    });

}

function loaddata() {

}
