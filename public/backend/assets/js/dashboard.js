$(window).on('load', function () {
    'use strict';
  
    setTimeout(function () {
      toastr['success'](
        'Chào mừng bạn trở lại!',
        '👋 Welcome '+username+'!',
        {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        }
      );
    }, 2000);

})