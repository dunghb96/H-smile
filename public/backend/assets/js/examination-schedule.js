/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
var appointmentid = 0;
var patientid = 0;
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

    'use strict';

    // select2
    //  select.each(function () {
    //      var $this = $(this);
    //      $this.wrap('<div class="position-relative"></div>');
    //      $this.select2({
    //          placeholder: 'Select value',
    //          dropdownParent: $this.parent()
    //      });
    //  });

    var table_table = $('#tableBasic');
    // DataTable with buttons
    // --------------------------------------------------------------------
    if (table_table.length) {
        var table = table_table.DataTable({
            ajax: '/admin/examination-schedule/json',
            // select: {
            //     style: 'single'
            // },
            columns: [
                { data: 'id' },
                { data: 'date_at' },
                { data: 'time_at' },
                { data: 'service' },
                { data: 'service_id' },
                { data: 'patient' },
                { data: 'patient_id' },
                { data: 'doctor' },
                { data: 'status_name' },
                { data: 'status' },
                { data: 'appointment' },
                { data: '' }
            ],
            columnDefs: [
                {
                    targets: 4,
                    visible: false,
                },
                {
                    targets: 5,
                    render: function (data, type, full, meta) {
                        return '<a href="javascript:void(0)" class="user_name text-primary" onclick="loadpatient(' + full['patient_id'] + ')"><span class="font-weight-bold">' + full['patient'] + '</span></a>'
                    }
                },
                {
                    targets: 6,
                    visible: false,
                },
                {
                    targets: 9,
                    visible: false,
                },
                {
                    targets: 10,
                    visible: false,
                },
                {
                    targets: 11,
                    render: function (data, type, full, meta) {
                        var html = '';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Hoàn thành" onclick="hoanthanh(' + full['id'] + ',' + full['status'] + ',' + full['appointment'] + ')">';
                        html += '<i data-feather="check"></i>';
                        html += '</button> &nbsp;';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Hẹn tiếp" onclick="hentiep(' + full['id'] + ',' + full['appointment'] + ',' + full['status'] + ',' + full['service_id'] + ',' + full['patient_id'] + ')">';
                        html += '<i data-feather="arrow-right-circle"></i>';
                        html += '</button> &nbsp;';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chỉnh sửa" onclick="loaddata(' + full['id'] + ',' + full['appointment'] + ',' + full['status'] + ',' + full['service_id'] + ',' + full['patient_id'] + ')">';
                        html += '<i class="fas fa-pencil-alt"></i>';
                        html += '</button> &nbsp;';
                        html += '<button type="button" class="btn btn-icon btn-outline-danger waves-effect" title="Hủy lịch khám" onclick="del(' + full['id'] + ',' + full['status'] + ')">';
                        html += '<i class="fas fa-trash-alt"></i>';
                        html += '</button>';
                        return html;
                    },
                    width: 180
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
            // drawCallback: function (settings) {
            //     var api = this.api();
            //     var rows = api.rows({page: 'current'}).nodes();
            //     var last = null;
            //     api
            //         .column(2, {page: 'current'})
            //         .data()
            //         .each(function (group, i) {
            //             if (last !== group) {
            //                 $(rows)
            //                     .eq(i)
            //                     .before('<tr class="group"><td colspan="8" style="font-weight: bold">' + group + '</td></tr>');
            //
            //                 last = group;
            //             }
            //         });
            // },
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
    $('#frm-edit-lich').each(function () {
        var $this = $(this);
        $this.validate({
            rules: {
                doctor_id: {
                    required: true
                },
                date_at: {
                    required: true
                },
                time_at: {
                    required: true
                },
            }
        });
    });
});

function loadpatient(id) {
    $('#information-tab').click();
    $('#patientinfo').modal('show');
    $(".modal-title").html('Thông tin khách hàng');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/patient/loaddata",
        success: function (data) {
            $('#patient-name').html(data.full_name);
            $('#patient-age').html(data.age);
            $('#patient-phone').html(data.phone_number);
            $('#patient-email').html(data.email);
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}


function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm nhân viên mới');
    $('#name').val('');
    $('#position').val('').change();
    $('#email').val('');
    $('#phone_number').val('');
    $('#username').val('');
    $('#password').val('');
    $('#role').val('0').change();
    url = '/admin/employee/add';
    iid = 0;
}

function changeType() {
    var opt = $("#type").val();
    if (opt == 1) {
        $('#service_input').removeClass('d-none');
    } else {
        $('#service_input').addClass('d-none');
    }
}

function loaddata(id, appointment, status, service_id, patient) {
    if(status == 1) {
        $("#editlich").modal('show');
        $(".modal-title").html('Cập nhật lịch khám');
        $.ajax({
            type: "POST",
            dataType: "json",
            data: { id: id },
            url: "/admin/examination-schedule/loaddata",
            success: function (data) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: { service: service_id },
                    url: "/admin/appointment/get-doctor",
                    success: function (data) {
                        $('#doctor_id').html('');
                        data.forEach(function (val, index) {
                            var opt = '<option value="' + val.id + '">' + val.name + '</option>';
                            $('#doctor_id').append(opt);
                        });
                        $('#doctor_id').select2({
                            placeholder: "Chọn bác sĩ",
                            allowClear: true,
                            dropdownParent: $('#doctor_id').parent(),
                        })
                       
                    },
                });
                $('#doctor_id').val(data.doctor_id).trigger('change');
                $('#etime_at').val(data.time_at).trigger('change');
                $('#edate_at').flatpickr({
                    altInput: true,
                    altFormat: "d/m/Y",
                    defaultDate: data.date_at,  
                    dateFormat: "d/m/Y",
                    minDate: "today",
                });
                
                iid = id;
            },
            error: function () {
                notify_error('Lỗi truy xuất database');
            }
        });
    } else if (status == 2) {
        notify_error('Lịch khám đã hoàn thành');
    } else if (status == 3) {
        notify_error('Lịch khám đã hủy');
    }
}

function editExamSchedule() {
    var info = {};
    var isValid = $('#frm-edit-lich').valid();
    if (isValid) {
        info.id = iid;
        info.doctor_id = $("#doctor_id").val();
        info.date_at = $("#edate_at").val();
        info.time_at = $("#etime_at").val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: '/admin/examination-schedule/saveExamSchedule',
            success: function (data) {
                if (data.success) {
                    notyfi_success(data.msg);
                    $('#editlich').modal('hide');
                    $("#tableBasic").DataTable().ajax.reload(null, false);
                } else
                    notify_error(data.msg);
            },
            error: function () {
                notify_error('Cập nhật không thành công');
            }
        });
    }

}

function hoanthanh(id, status, appointment) {
    if (status == 1) {
        Swal.fire({
            title: 'Khám xong',
            text: "Bạn có chắc chắn muốn hoàn thành lịch khám!",
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
                    url: "/admin/examination-schedule/hoanthanh",
                    type: 'post',
                    dataType: "json",
                    data: { id: id, appointment: appointment },
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
        notify_error("Lịch khám đã hoàn thành");
    } else if (status == 3) {
        notify_error("Lịch khám đã bị hủy");
    }

}

function hentiep(id, appointment, status, service_id, patient) {
    if (status == 1) {
        Swal.fire({
            title: 'Hẹn tiếp',
            text: "Bạn có muốn hoàn thành lịch khám và tạo lịch hẹn mới!",
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
                $("#hentiep").modal('show');
                $(".modal-title").html('Tạo lịch hẹn mới');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: { service: service_id },
                    url: "/admin/examination-schedule/get-doctor",
                    success: function (data) {
                        $('#doctor').html('');
                        data.forEach(function (val, index) {
                            var opt = '<option value="' + val.id + '">' + val.name + '</option>';
                            $('#doctor').append(opt);
                        });
                        $('#doctor').select2({
                            placeholder: "Chọn bác sĩ",
                            allowClear: true,
                            dropdownParent: $('#doctor').parent(),
                        })
                        $('#doctor').val(null).trigger('change');
                        iid = id;
                        appointmentid = appointment;
                        patientid = patient;
                        // $(window).on('load', function() {
                            if (feather) {
                                feather.replace({
                                    width: 14,
                                    height: 14
                                });
                            }
                        // })
                    },
                });
            }
        });
    } else if (status == 2) {
        notify_error("Lịch khám đã hoàn thành");
    } else if (status == 3) {
        notify_error("Lịch khám đã bị hủy");
    }
}

function saveExamSchedule() {
    var info = {};
    info.patient = patientid;
    info.schedule = iid;
    info.appointment = appointmentid;
    info.doctor = $('#doctor').val();
    info.service = $('#service').val();
    info.dateat = $('#date_at').val();
    info.timeat = $('#time_at').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: info,
        url: "/admin/examination-schedule/hentiep",
        success: function (data) {
            if (data.success) {
                notyfi_success(data.msg);
                $('#hentiep').modal('hide');
                $("#tableBasic").DataTable().ajax.reload(null, false);
            } else {
                notify_error(data.msg);
            }
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function del(id, status) {
    if (status == 1) {
        Swal.fire({
            title: 'Hủy lịch khám',
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
                    url: "/admin/examination-schedule/del",
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
        notify_error("Lịch khám đã hoàn thành");
    } else if (status == 3) {
        notify_error("Lịch khám đã bị hủy");
    }
}
