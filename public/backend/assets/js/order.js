/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
var patient_id = 0;
var defaultDate = '';
$(function () {

    var basicPickr = $('.flatpickr-basic');
    if (basicPickr.length) {
        basicPickr.flatpickr({
            dateFormat: "d/m/Y",
            minDate: "today",
        });
    }

    $('#time_at').select2({
        placeholder: "Chọn giờ hẹn",
        allowClear: true,
        dropdownParent: $('#time_at').parent(),
    })
    $('#time_at').val(null).change();

    $('#services').select2({
        placeholder: "Chọn tối đa 3 dịch vụ",
        allowClear: true,
        dropdownParent: $('#services').parent(),
    })
    $('#services').val('').change();

    $('#customer').select2({
        placeholder: "Tìm nhanh khách hàng",
        allowClear: true,
        dropdownParent: $('#customer').parent(),
    })
    $('#customer').val('').change();

    'use strict';
    var table_table = $('#tableBasic');
    // DataTable with buttons
    // --------------------------------------------------------------------
    if (table_table.length) {
        var table = table_table.DataTable({
            ajax: '/admin/order/json',
            columns: [
                { data: 'id' },
                { data: 'customer_name' },
                { data: 'services_name' },
                { data: 'total_time' },
                { data: 'total_price' },
                { data: 'status_name' },
                { data: 'appointment_id' },
                { data: '' }
            ],
            columnDefs: [
                {
                    targets: 6,
                    visible: false
                },
                {
                    targets: -1,
                    render: function (data, type, full, meta) {
                        var status = full['status'];
                        var html = '';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chi tiết đơn hàng" onclick="loadorder(' + full['id'] + ')">';
                        html += '<i class="fas fa-shopping-basket"></i>';
                        html += '</button> &nbsp;';
                        if(status==1) {
                            html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Đã thanh toán" onclick="thanhtoan(' + full['id'] + ')">';
                            html += '<i class="fas fa-clipboard-check"></i>';
                            html += '</button> &nbsp;';
                        }
                        
                        // html += '<button type="button" class="btn btn-icon btn-outline-danger waves-effect" title="Xóa đơn hàng" onclick="del(' + full['id'] + ',' + full['status'] + ')">';
                        // html += '<i class="fas fa-trash-alt"></i>';
                        html += '</button>';
                        return html;
                    },
                    width: 100
                }
            ],
            // order: [[0, 'DESC']],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                ">t" +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                ">",
            displayLength: 10,
            lengthMenu: [10, 20, 30, 50, 70, 100],

            language: {
                sLengthMenu: "Show _MENU_",
                search: "Search",
                searchPlaceholder: "11111111112..",
            },
            // Buttons with Dropdown
            buttons: [
                // {
                //     text: "Thêm mới",
                //     className: "add-new btn btn-primary mt-50",
                //     init: function (api, node, config) {
                //         $(node).removeClass("btn-secondary");
                //     },
                //     action: function (e, dt, node, config) {
                //         loadadd();
                //     },
                // },
            ],
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: "&nbsp;",
                    next: "&nbsp;",
                },
            },
        });
    }

    $('#frm-add').each(function () {
        var $this = $(this);
        $this.validate({
            rules: {
                service: {
                    required: true
                },
                full_name: {
                    required: true
                },
                phone_number: {
                    required: true
                },
                email: {
                    required: true
                },
            }
        });
    });
});

function loaddata(id) {
    $("#addnew").modal('show');
    $(".modal-title").html('Cập nhật yêu cầu');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/appointment/loaddata",
        success: function (data) {
            var val = data.services.split(',');
            $("#services").val(val).change();
            $('#date_at').flatpickr({
                altInput: true,
                altFormat: "d/m/Y",
                defaultDate: data.date,
                dateFormat: "d/m/Y",
            });
            $('#shift').val(data.shift).change();
            if (data.customer_id) {
                $('#customer-div').removeClass("d-none");
                $('#customer').val(data.customer_id).change();
                $('#customer').attr("disabled", true);
            } else {
                $('#customer').val(null).change();
                $('#customer-div').addClass("d-none");
                $('#full_name').val(data.patient);
                $('#age').val(data.age);
                $('#phone_number').val(data.phone_number);
                $('#email').val(data.email);
                if (data.gender == 0) {
                    $("#nam").prop("checked", true).trigger("click");
                } else if (data.gender == 1) {
                    $("#nu").prop("checked", true).trigger("click");
                } else {
                    $("#khac").prop("checked", true).trigger("click");
                }
                $('#address').val(data.address);
            }
            $('#note').val(data.note);
            url = '/admin/appointment/edit';
            iid = id;
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function xacnhan(id, status) {
    if (status == 1) {
        $("#addnew").modal('show');
        $(".modal-title").html('Xác nhận lịch hẹn');
        $.ajax({
            type: "POST",
            dataType: "json",
            data: { id: id },
            url: "/admin/appointment/loaddata",
            success: function (data) {
                val = data.services.split(',');
                $("#services").val(val).change();
                $('#date_at').flatpickr({
                    altInput: true,
                    altFormat: "d/m/Y",
                    defaultDate: data.date,
                    dateFormat: "d/m/Y",
                });
                $('#shift').val(data.shift).change();
                $('#patient_code').val(data.patient_code);
                if (data.customer_id) {
                    $('#customer').val(data.customer_id).change();
                } else {
                    $('#customer').val(null).change();
                    $('#full_name').val(data.patient);
                    $('#age').val(data.age);
                    $('#phone_number').val(data.phone_number);
                    $('#email').val(data.email);
                    if (data.gender == 0)
                        $("#nam").prop("checked", true).trigger("click");
                    else if (data.gender == 1)
                        $("#nu").prop("checked", true).trigger("click");
                    else
                        $("#khac").prop("checked", true).trigger("click");
                    $('#address').val(data.address);
                }
                $('#note').val(data.note);
                url = '/admin/appointment/xacnhan';
                iid = id;
            },
            error: function () {
                notify_error('Lỗi truy xuất database');
            }
        });
    } else {
        notify_error('Lịch hẹn đã được xác nhận');
    }
}

function save() {
    var info = {};
    if (iid > 0) {
        info.id = iid;
    }
    info.customer_id = $('#customer').val();
    info.patient_code = $('#patient_code').val();
    info.service = $('#services').val();
    // info.doctor = $('#adoctor').val();
    info.dateat = $('#date_at').val();
    info.shift = $('#shift').val();
    info.fullname = $('#full_name').val();
    info.age = $('#age').val();
    info.phonenumber = $('#phone_number').val();
    info.email = $('#email').val();
    info.address = $('#address').val();
    info.gender = $("input[type='radio'][name='gender']:checked").val();
    info.note = $('#note').val();
    var isValid = $('#frm-add').valid();
    if (isValid) {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: url,
            success: function (data) {
                if (data.success) {
                    notyfi_success(data.msg);
                    $('#addnew').modal('hide');
                    $("#tableBasic").DataTable().ajax.reload(null, false);
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

function loadorder(order_id) {
    localStorage.setItem('order_id', order_id);
    window.location.href = './admin/order/order-detail';
}

function del(id, status) {
    if (status == 1) {
        Swal.fire({
            title: 'Hủy yêu cầu',
            text: "Bạn có chắc chắn muốn hủy ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tôi đồng ý',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: "/admin/appointment/del",
                    type: 'post',
                    dataType: "json",
                    data: { id: id },
                    success: function (data) {
                        if (data.success) {
                            notyfi_success(data.msg);
                            $("#tableBasic").DataTable().ajax.reload(null, false);
                        }
                        else
                            notify_error(data.msg);
                    },
                });
            }
        });
    } else if (status == 2) {
        $.ajax({
            url: "/admin/appointment/checkappointment",
            type: 'post',
            dataType: "json",
            data: { id: id },
            success: function (data) {
                if (data.success) {
                    Swal.fire({
                        title: 'Hủy yêu cầu',
                        text: "Bạn có chắc chắn muốn hủy ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Tôi đồng ý',
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-outline-danger ml-1'
                        },
                        buttonsStyling: false
                    }).then(function (result) {
                        if (result.value) {
                            $.ajax({
                                url: "/admin/appointment/del",
                                type: 'post',
                                dataType: "json",
                                data: { id: id },
                                success: function (data) {
                                    if (data.success) {
                                        notyfi_success(data.msg);
                                        $("#tableBasic").DataTable().ajax.reload(null, false);
                                    }
                                    else
                                        notify_error(data.msg);
                                },
                            });
                        }
                    });
                }
                else
                    notify_error('Đơn hàng đang thực hiện không thể xóa');
            },
        });
    } else if (status == 3) {
        notify_error('Đơn hàng đã hoàn thành không thể xóa!');
    }
}

function thanhtoan(id) {
    Swal.fire({
        title: 'Xác nhận thanh toán',
        text: "Bạn có chắc chắn đã thanh toán đơn hàng?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Tôi đồng ý',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: "/admin/order/thanhtoan",
                type: 'post',
                dataType: "json",
                data: { id: id },
                success: function (data) {
                    if (data.success) {
                        notyfi_success(data.msg);
                        $("#tableBasic").DataTable().ajax.reload(null, false);
                    }
                    else
                        notify_error(data.msg);
                },
            });
        }
    });
}