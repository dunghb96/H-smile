$(function () {
    'use strict';
    var tungay = $('#tungay');
    var timePickr = $('.flatpickr-time');

    if (timePickr.length) {
        timePickr.flatpickr({
            enableTime: true,
            dateFormat: "H:i",
            noCalendar: true
        });
    }

    // if (tungay.length) {
    //     var tungay = tungay.flatpickr({
    //         enableTime: true,
    //         noCalendar: true,
    //         dateFormat: "H:i",
    //         altFormat: "H:i",
    //         time_24hr: true,
    //         enableSeconds: true,
    //         onReady: function (selectedDates, dateStr, instance) {
    //             if (instance.isMobile) {
    //                 $(instance.mobileInput).attr('step', null);
    //             }
    //         }
    //     });
    // }
})