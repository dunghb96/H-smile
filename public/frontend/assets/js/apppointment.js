$(function () {

    'use strict';

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

function loaddata() {
    
}