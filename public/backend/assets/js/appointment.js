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

    $(window).on('load', function () {
        // $('#minlogo').hide();
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
    // var timePickr = $('.flatpickr-time');

    // if (timePickr.length) {
    //     timePickr.flatpickr({
    //         enableTime: true,
    //         dateFormat: "H:i",
    //         noCalendar: true
    //     });
    // }

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
        //  console.log(data);
        var table = table_table.DataTable({

            ajax: '/admin/appointment/json',

            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'phone_number' },
                { data: 'list_service' },
                // { data: 'service_id' },
                { data: 'date' },
                { data: 'shift' },
                { data: 'status_word' },
                { data: 'status' },
                { data: '' }
            ],
            columnDefs: [
                // {
                //     targets: 1,
                //     render: function (data, type, full, meta) {
                //         return '<a href="javascript:void(0)" class="user_name text-primary" onclick="loadpatient(' + full['patient_id'] + ')"><span class="font-weight-bold">' + full['full_name'] + '</span></a>'
                //     }
                // },
                // {
                //     targets: 4,
                //     visible: false,
                // },
                {
                    targets: 7,
                    visible: false,
                },
                // {
                //     targets: 10,
                //     visible: false,
                // },
                {
                    targets: -1,
                    render: function (data, type, full, meta) {
                        var html = '';
                        var status = full['status'];
                        if (status == 2) {
                            html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chi tiết đơn hàng" onclick="loadorder(' + full['id'] + ')">';
                            html += '<i class="fas fa-shopping-basket"></i>';
                            html += '</button> &nbsp;';
                        }
                        if (status == 1) {
                            html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Xác nhận" onclick="xacnhan(' + full['id'] + ',' + full['status'] + ')">';
                            html += '<i class="far fa-calendar-check"></i>';
                            html += '</button> &nbsp;';
                        }
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chỉnh sửa" onclick="loaddata(' + full['id'] + ')">';
                        html += '<i class="fas fa-pencil-alt"></i>';
                        html += '</button> &nbsp;';
                        html += '<button type="button" class="btn btn-icon btn-outline-danger waves-effect" title="Hủy yêu cầu" onclick="del(' + full['id'] + ',' + full['status'] + ')">';
                        html += '<i class="fas fa-trash-alt"></i>';
                        html += '</button>';
                        return html;
                    },
                    width: 150
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
                {
                    text: "Thêm mới",
                    className: "add-new btn btn-primary mt-50",
                    init: function (api, node, config) {
                        $(node).removeClass("btn-secondary");
                    },
                    action: function (e, dt, node, config) {
                        loadadd();
                    },
                },
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

// function loadpatient(id) {
//     $('#information-tab').click();
//     $('#patientinfo').modal('show');
//     $(".modal-title").html('Thông tin khách hàng');
//     $.ajax({
//         type: "POST",
//         dataType: "json",
//         data: { id: id },
//         url: "/admin/patient/loaddata",
//         success: function (data) {
//             $('#patient-name').html(data.full_name);
//             $('#patient-age').html(data.age);
//             $('#patient-phone').html(data.phone_number);
//             $('#patient-email').html(data.email);
//             loadhistorytb(id);
//         },
//         error: function () {
//             notify_error('Lỗi truy xuất database');
//         }
//     });
// }

// function loadhistorytb(id) {
//     var listhistory = $('#listhistory');
//     if (listhistory.length) {
//         var listhistory = listhistory.DataTable({
//             ajax: '/admin/patient/loadhistory?id=' + id,
//             // "bDestroy": true,
//             destroy: true,
//             columns: [
//                 { data: 'status' },
//                 { data: 'status' },
//                 { data: 'status' },
//                 { data: 'status' },
//                 { data: 'status' },
//             ],
//             columnDefs: [],
//             // order: [[0, 'DESC']],
//             dom:
//                 '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
//                 '<"col-lg-12 col-xl-6" l>' +
//                 '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
//                 ">t" +
//                 '<"d-flex justify-content-between mx-2 row mb-1"' +
//                 '<"col-sm-12 col-md-6"i>' +
//                 '<"col-sm-12 col-md-6"p>' +
//                 ">",
//             // displayLength: 10,
//             lengthMenu: [10, 20, 30, 50, 70, 100],
//             language: {
//                 sLengthMenu: "Show _MENU_",
//                 search: "Search",
//                 searchPlaceholder: "11111111112..",
//             },
//             buttons: [],
//             language: {
//                 paginate: {
//                     previous: "&nbsp;",
//                     next: "&nbsp;",
//                 },
//             },
//         });
//     }
// }

function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm yêu cầu mới');
    // $('#adoctor').select2({
    //     placeholder: "Chọn nha sĩ",
    //     allowClear: true,
    //     dropdownParent: $('#adoctor').parent(),
    // })
    // $('#adoctor').val(null).change();
    // $('#adoctor').attr("disabled", true);
    $('#customer').val('').change();
    $('#services').val('').change();
    // $('#date_at').val('');
    start = Date.now();
    $('#date_at').flatpickr({
        altInput: true,
        altFormat: "d/m/Y",
        defaultDate: start,
        dateFormat: "d/m/Y",
        minDate: "today"
    });

    $('#full_name').val('');
    $('#age').val('');
    $('#phone_number').val('');
    $('#email').val('');
    $('#address').val('');
    url = '/admin/appointment/add';
    iid = 0;
}

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
                $('#customer').attr("disabled",true);
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

// function duyet(id, service, status, patient) {
//     if (status == 1) {
//         $("#addlich").modal('show');
//         $(".modal-title").html('Tạo lịch khám');
//         $.ajax({
//             type: "POST",
//             dataType: "json",
//             data: { service: service },
//             url: "/admin/appointment/get-doctor",
//             success: function (data) {
//                 $('#doctor_id').html('');
//                 data.forEach(function (val, index) {
//                     var opt = '<option value="' + val.id + '">' + val.name + '</option>';
//                     $('#doctor_id').append(opt);
//                 });
//                 $('#doctor_id').select2({
//                     placeholder: "Chọn bác sĩ",
//                     allowClear: true,
//                     dropdownParent: $('#doctor_id').parent(),
//                 })
//                 $('#doctor_id').val(null).trigger('change');

//             },
//         });
//         patient_id = patient;
//         iid = id;
//     } else if (status == 2) {
//         notify_error('Lịch khám đang thực hiện');
//     } else if (status == 3) {
//         notify_error('Lịch hẹn đã bị hủy');
//     } else if (status == 4) {
//         notify_error('Lịch hẹn đã hoàn thành');
//     }
// }

// function saveExamSchedule() {
//     var info = {};
//     info.patient_id = patient_id;
//     info.appointment = iid;
//     info.doctor = $('#doctor_id').val();
//     info.service = $('#services').val();
//     info.dateat = $('#date_at').val();
//     info.timeat = $('#atime_at').val();
//     $.ajax({
//         type: "POST",
//         dataType: "json",
//         data: info,
//         url: "/admin/appointment/add-schedule",
//         success: function (data) {
//             if (data.success) {
//                 notyfi_success(data.msg);
//                 $('#addlich').modal('hide');
//                 $("#tableBasic").DataTable().ajax.reload(null, false);
//             } else {
//                 notify_error(data.msg);
//             }
//         },
//         error: function () {
//             notify_error('Lỗi truy xuất database');
//         }
//     });
// }

function loadorder(id) {
    localStorage.setItem('appointment_id', id);
    window.location.href = './admin/appointment/order-detail';
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

// function changeSV() {
//     var service = $("#service").val();
//     if (service != null) {
//         $.ajax({
//             type: "POST",
//             dataType: "json",
//             data: { service: service },
//             url: "/admin/appointment/get-doctor",
//             success: function (data) {
//                 $('#adoctor').html('');
//                 data.forEach(function (val, index) {
//                     var opt = '<option value="' + val.id + '">' + val.name + '</option>';
//                     $('#adoctor').append(opt);
//                 });
//                 $('#adoctor').select2({
//                     placeholder: "Chọn bác sĩ",
//                     allowClear: true,
//                     dropdownParent: $('#adoctor').parent(),
//                 })
//                 $('#adoctor').val(null).trigger('change');
//             },
//         });
//         $('#adoctor').val('').attr("disabled", false);
//     } else {
//         $('#adoctor').val(null).trigger('change');
//         $('#adoctor').attr("disabled", true);
//     }

// }

function changeKH() {
    var customer = $("#customer").val();
    if (customer) {
        $.ajax({
            type: "POST",
            dataType: "json",
            data: { id: customer },
            url: "/admin/patient/getcustomer",
            success: function (data) {
                $('#full_name').val(data.full_name).attr("disabled", true);
                $('#age').val(data.age).attr("disabled", true);
                $('#phone_number').val(data.phone_number).attr("disabled", true);
                $('#email').val(data.email).attr("disabled", true);
                $('#address').val(data.address).attr("disabled", true);
                if (data.gender == 0) {
                    $("#nam").prop("checked", true).trigger("click");
                    $("#nu").attr("disabled", true);
                    $("#khac").attr("disabled", true);
                } else if (data.gender == 1) {
                    $("#nu").prop("checked", true).trigger("click");
                    $("#nam").attr("disabled", true);
                    $("#khac").attr("disabled", true);
                } else {
                    $("#khac").prop("checked", true).trigger("click");
                    $("#nu").attr("disabled", true);
                    $("#nam").attr("disabled", true);
                }
            },
        });
    } else {
        $('#full_name').val('').attr("disabled", false);
        $('#age').val('').attr("disabled", false);
        $('#phone_number').val('').attr("disabled", false);
        $('#email').val('').attr("disabled", false);
        $('#address').val('').attr("disabled", false);
        $("#nam").prop("checked", false).trigger("click").attr("disabled", false);
        $("#nu").prop("checked", false).trigger("click").attr("disabled", false);
        $("#khac").prop("checked", false).trigger("click").attr("disabled", false);
    }

}