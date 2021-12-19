$(function () {
    $('#doctor').val('').attr("disabled", true);
})

function changeSV()
{
    var service = $("#service").val();
    alert(service);
    if(service != '') {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {service: service},
            url: "/admin/appointment/get-doctor", // giờ anh tạo route rồi lấy dữ liệu doctor ra cho em nha OK
            success: function (data) {
                $('#doctor').html('');
                data.forEach(function (val, index) {
                    var opt = '<option value="' + val.id + '">' + val.name + '</option>';
                    $('#doctor').append(opt);
                });
                // $('#doctor').select2({
                //     placeholder: "Chọn bác sĩ",
                //     allowClear: true,
                //     dropdownParent: $('#doctor').parent(),
                // })
                // $('#doctor').val(null).trigger('change');
            },
        });
        $('#doctor').val('').attr("disabled", false);
    } else {
        // alert();
        // $("#doctor").prop('disabled', true);
        // $("input").addAttr('disabled');
        $('#doctor').attr("disabled", true);
        // $('#doctor').disabled = true;
    }
   
}