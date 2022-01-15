$(function () {
    // $('#doctor').val('').attr("disabled", true);
    $('#service').select2({
        placeholder: "Chọn tối đa 3 dịch vụ",
        // allowClear: true,
        dropdownParent: $('#service').parent(),
    })
    $('#service').val('').trigger('change');

    var arr = new Array();
    $("select[multiple]").change(function() {
        $(this).find("option:selected")
        if ($(this).find("option:selected").length > 3) {
            $(this).find("option").removeAttr("selected");
            $(this).val(arr);
        }
        else {
            arr = new Array();
            $(this).find("option:selected").each(function(index, item) {
                arr.push($(item).val());
            });
        }
    })

    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });

    // var service = $('#service');
    // if (service.length) {
    //     service.each(function () {
    //         var $this = $(this);
    //         $this.wrap("<div class='position-relative'></div>").select2({
    //             placeholder: "Chọn tối đa 2 dịch vụ",
    //             dropdownParent: $this.parent(),
    //             escapeMarkup: function (es) {
    //                 return es;
    //             },
    //         });
    //     });
    // }
})

// function changeSV()
// {
//     var service = $("#service").val();
//     if(service != '') {
//         $.ajax({
//             type: "POST",
//             dataType: "json",
//             data: {service: service},
//             url: "/admin/appointment/get-doctor", // giờ anh tạo route rồi lấy dữ liệu doctor ra cho em nha OK
//             success: function (data) {
//                 $('#doctor').html('');
//                 data.forEach(function (val, index) {
//                     var opt = '<option value="' + val.id + '">' + val.name + '</option>';
//                     $('#doctor').append(opt);
//                 });
//                 // $('#doctor').select2({
//                 //     placeholder: "Chọn bác sĩ",
//                 //     allowClear: true,
//                 //     dropdownParent: $('#doctor').parent(),
//                 // })
//                 // $('#doctor').val(null).trigger('change');
//             },
//         });
//         $('#doctor').val('').attr("disabled", false);
//     } else {
//         // alert();
//         // $("#doctor").prop('disabled', true);
//         // $("input").addAttr('disabled');
//         $('#doctor').attr("disabled", true);
//         // $('#doctor').disabled = true;
//     }
   
// }