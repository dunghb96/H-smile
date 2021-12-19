
$(function () {

    var timePickr = $('.flatpickr-time');

    if (timePickr.length) {
        timePickr.flatpickr({
            enableTime: true,
            dateFormat: "H:i",
            noCalendar: true
        });
    }

});

function thaylogo(){
    var myform = new FormData($('#frm-setting')[0]);
    $.ajax({
        url: "/admin/setting/thaylogo",
        method: 'post',
        dataType: 'json',
        data: myform,
        contentType: false,
        processData: false,
        success: function(data){
            // data = JSON.parse(data);
            if (data.success) {
               notyfi_success(data.msg);
               $('#logo-img').attr('src', data.filename);
            }
            else
                notify_error(data.msg);
        },
    });
}

function thayfavicon(){
    var myform = new FormData($('#frm-setting')[0]);
    $.ajax({
        url: "/admin/setting/thayfavicon",
        method: 'post',
        dataType: 'json',
        data: myform,
        contentType: false,
        processData: false,
        success: function(data){
            // data = JSON.parse(data);
            if (data.success) {
               notyfi_success(data.msg);
               $('#favicon-img').attr('src', data.filename);
            }
            else
                notify_error(data.msg);
        },
    });
}

function thaylogofooter(){
    var myform = new FormData($('#frm-setting')[0]);
    $.ajax({
        url: "/admin/setting/thaylogofooter",
        method: 'post',
        dataType: 'json',
        data: myform,
        contentType: false,
        processData: false,
        success: function(data){
            // data = JSON.parse(data);
            if (data.success) {
               notyfi_success(data.msg);
               $('#logofooter-img').attr('src', data.filename);
            }
            else
                notify_error(data.msg);
        },
    });
}

function save() {
    // var info = new FormData($("#setting")[0]);
    // console.log(info);
    var info = {};
    info.start_date = $("#start_date").val();
    info.end_date = $("#end_date").val();
    info.time_open = $("#time_open").val();
    info.time_close = $("#time_close").val();
    info.hotline = $("#hotline").val();
    info.email = $("#email").val();
    info.address = $("#address").val();
    info.site_title = $("#site_title").val();
    info.site_desc = $("#site_desc").val();
    info.map = $("#map").val();
    info.about = $("#about").val();
    info.facebook = $("#facebook").val();
    info.zalo = $("#zalo").val();
    info.youtube = $("#youtube").val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: info,
        url: '/admin/setting/saveForm',
        // contentType: false,
        // processData: false,
        success: function (data) {
            if (data.success) {
                notyfi_success(data.msg);
            }
            else
                notify_error(data.msg);
        },
        error: function () {
            notify_error('Cập nhật không thành công');
        }
    });

}
