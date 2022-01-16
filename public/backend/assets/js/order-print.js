var appointment_id = localStorage.getItem('appointment_id');
$(function () {
    'use strict';
    loadorder(appointment_id);
});

function loadorder(appointment_id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { appointment_id: appointment_id },
        url: "/admin/order/loadorder",
        success: function (data) {
            $('#order_id').html('#'+data.id);
            $('#customer_name').html(data.customer_name);
            $('#customer_phone').html(data.customer_phone);
            $('#customer_email').html(data.customer_email);
            $('#customer_address').html(data.customer_address);
            $('#create_at').html(data.create_at);
            if (data.status == 1) {
                $('#order_status').html('Chưa thanh toán');
            } else {
                $('#order_status').html('Đã thanh toán');
            }
            $('#total_price').html(data.total_price + ' VNĐ');
            if (data.staff_name != '') {
                $('#staff_name').html(data.staff_name);
            }
            $.ajax({
                type: "POST",
                dataType: "json",
                data: { order_id: data.id },
                url: "/admin/order/loadorderdetail",
                success: function (data) {
                    data.map(item => {
                        return $('#order-detail').append('<tr> <td class="py-1"> <span class="font-weight-bold">' + item.stt + '</span> </td> <td class="py-1"><p class="card-text font-weight-bold mb-25">' + item.service_name + '</p></td> <td class="py-1"> <span class="font-weight-bold">' + item.service_time + ' phút</span></td> <td class="py-1"> <span class="font-weight-bold">' + item.service_price + ' VNĐ</span> </td> </tr>');
                    });
                    window.print();
                },
                error: function () {
                    notify_error('Lỗi truy xuất database');
                }
            });
            
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}
