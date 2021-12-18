
 $(function () {

    $('#setting').validate({
        rules: {
            logo: {
                required: true
            },
            favicon: {
                required: true
            },
            logo_footer: {
                required: true
            },
            begin_date: {
                required: true
            },
            begin_date: {
                required: true
            },
            to_date: {
                required: true
            },
            open: {
                required: true
            },
            close: {
                required: true
            },
            hotline: {
                required: true
            },
            email: {
                required: true
            },
            address: {
                required: true
            },
            site_title: {
                required: true
            },
            site_desc: {
                required: true
            },
            map: {
                required: true
            },
            about: {
                required: true
            },
            facebook: {
                required: true
            },
            zalo: {
                required: true
            },
            youtube: {
                required: true
            }
        }
    });

 });
 save = function() {
    var isValid = $('#setting').valid();
    console.log(isValid);
    if (isValid) {
        var info = new FormData($("#setting")[0]);
        console.log(info);
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: '/admin/setting/saveForm',
            contentType: false,
            processData: false,
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
}
