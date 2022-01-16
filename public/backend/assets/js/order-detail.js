var appointment_id = localStorage.getItem('appointment_id');
var thoiluong = 0;
var customerid = 0;
var patient_code = '';
var serviceid = 0;

$(function () {
    loadorder(appointment_id);
    $('#doctor').select2({
        placeholder: "Chọn nha sỹ",
        dropdownParent: $('#doctor').parent(),
    })
    $('#start_time').flatpickr({
        enableTime: true,
        dateFormat: "H:i",
        noCalendar: true
    });
    $('#frm-xl').each(function () {
        var $this = $(this);
        $this.validate({
            rules: {
                doctor: {
                    required: true
                },
                start_time: {
                    required: true
                }
            }
        });
    });
})

function loadorder(appointment_id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { appointment_id: appointment_id },
        url:  "/admin/order/loadorder",
        success: function (data) {
            var customer_id = data.customer_id;
            $('#order_id').html('#'+data.id);
            $('#customer_name').html(data.customer_name);
            $('#customer_phone').html(data.customer_phone);
            $('#customer_email').html(data.customer_email);
            $('#customer_address').html(data.customer_address);
            $('#create_at').html(data.create_at);
            if(data.status == 1) {
                $('#order_status').html('Chưa thanh toán');
            } else {
                $('#order_status').html('Đã thanh toán');
            }
            $('#total_price').html(data.total_price+' VNĐ');
            if(data.staff_name != '') {
                $('#staff_name').html(data.staff_name);
            }
            $.ajax({
                type: "POST",
                dataType: "json",
                data: { order_id: data.id },
                url:  "/admin/order/loadorderdetail",
                success: function (data) {
                    data.map(item => {
                        var status = item.schedule_status;
                        var statusName = "";
                        if(status==1) {
                            statusName = 'Chờ xếp lịch';
                        } else if (status==2) {
                            statusName = 'Chờ khám';
                        } else if (status==3){
                            statusName = 'Đang khám';
                        } else if (status==4) {
                            statusName = 'Quá hạn';
                        } else if (status==5) {
                            statusName = 'Hoàn thành';
                        }
                        return $('#order-detail').append('<tr> <td class="py-1"> <span class="font-weight-bold">'+item.stt+'</span> </td> <td class="py-1"><p class="card-text font-weight-bold mb-25">'+item.service_name+'</p></td> <td class="py-1"> <span class="font-weight-bold">'+item.service_time+' phút</span></td> <td class="py-1"> <span class="font-weight-bold">'+item.service_price+' VNĐ</span> </td> <td class="py-1"> <span class="font-weight-bold">'+statusName+'</span> </td><td class="py-1"> <span class="font-weight-bold"><button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Tạo lịch hẹn" onclick="henlai('+item.order_id+','+item.service_id+','+customer_id+')"><i class="far fa-calendar-alt"></i></button></span> </td> </tr>');
                    });
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

function henlai(order_id,service_id,customer_id) {
    $("#hen-lai").modal('show');
    $(".modal-title").html('Tạo lịch tái khám');
    var info = {};
    info.order_id = order_id;
    info.service_id = service_id;
    $.ajax({
        type: "POST",
        dataType: "json",
        data: info,
        url:  "/admin/order/henlai",
        success: function (data) {
            $('#data-name').html(data.customer_name);
            $('#data-phone').html(data.phone_number);
            $('#data-service').html(data.service_name);
            $('#data-time').html(data.service_time + ' phút');
            $('#end_time').attr("disabled", true);
            $('#date_at').flatpickr({
                altInput: true,
                altFormat: "d/m/Y",
                defaultDate: data.date_at,
                dateFormat: "d/m/Y",
                minDate: "today",
            });
            $('#doctor').val(null).change();
            thoiluong = data.service_time;
            patient_code = data.patient_code;
            customerid = customer_id;
            serviceid = service_id;
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function saveHL() {
    var isValid = $('#frm-xl').valid();
    if (isValid) {
        var info = {};
        info.customer_id = customerid;
        info.patient_code = patient_code;
        info.service_id = serviceid;
        info.date_at = $('#date_at').val();
        info.doctor_id = $('#doctor').val();
        info.start_time = $('#start_time').val();
        info.end_time = $('#end_time').val();
        info.note = $('#note').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: "/admin/order/saveHL",
            success: function (data) {
                if (data.success) {
                    $("#hen-lai").modal('hide');
                    notyfi_success(data.msg);
                } else {
                    notify_error(data.msg);
                }
            },
            error: function () {
                notify_error('Lỗi truy xuất database');
            }
        });
    }
}

function gioRa() {
    startTime = $('#start_time').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { start_time: startTime, time: thoiluong },
        url: "/admin/examination-schedule/changeTime",
        success: function (data) {
            $('#end_time').flatpickr({
                altInput: true,
                defaultDate: data.end_time,
                altFormat: "H:i",
                dateFormat: "H:i",
            });
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}