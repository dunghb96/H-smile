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

})

// function changeSV() {
//     var opt = $("#phong_ban").val();
//     return_combobox_multi('#vi_tri', baseApi + '/vitri/combo?phongban=' + opt, 'Lựa chọn vị trí');
//     $('#vi_tri').val('').attr("disabled", false);

// }

function loaddata() {

}