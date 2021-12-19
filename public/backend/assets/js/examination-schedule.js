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
                        // html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chỉnh sửa" onclick="loaddata(' + full['id'] + ')">';
                        // html += '<i class="fas fa-pencil-alt"></i>';
                        // html += '</button> &nbsp;';
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

function loaddata(id) {
    $("#addnew").modal('show');
    $(".modal-title").html('Cập nhật nhân sự');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/employee/loaddata",
        success: function (data) {
            $('#name').val(data.name);
            $('#phone_number').val(data.phone_number);
            $('#email').val(data.email);
            $('#position').val(data.position);
            $('#majors').val(data.majors);
            $('#type').val(data.type).change();
            $('#short_description').val(data.short_description);
            if (data.services) {
                services = data.services.split(',');
                $('#service').val(services).change();
            }
            $('#username').val(data.username);
            $('#password').val('');
            $('#role').val(data.rolesOfUser).change();
            url = '/admin/employee/edit';
            iid = id;
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function save() {
    var info = {};
    var isValid = $('#frm').valid();
    if (iid != 0) {
        info.id = iid;
        info.name = $("#name").val();
        info.type = $("#type").val();
        info.position = $("#position").val();
        info.majors = $("#majors").val();
        info.email = $("#email").val();
        info.phone_number = $("#phone_number").val();
        info.short_description = $("#short_description").val();
        info.username = $("#username").val();
        info.password = $("#epassword").val();
        info.role = $("#role").val();
        var service = $("#service").val();
        let services = '';
        service.forEach(function (item) {
            services += item + ',';
        });
        info.services = services.slice(0, -1);
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
                } else
                    notify_error(data.msg);
            },
            error: function () {
                notify_error('Cập nhật không thành công');
            }
        });
    } else {
        if (isValid) {
            info.name = $("#name").val();
            info.type = $("#type").val();
            info.position = $("#position").val();
            info.majors = $("#majors").val();
            info.email = $("#email").val();
            info.phone_number = $("#phone_number").val();
            info.short_description = $("#short_description").val();
            info.username = $("#username").val();
            info.password = $("#password").val();
            info.role = $("#role").val();
            var service = $("#service").val();
            let services = '';
            service.forEach(function (item) {
                services += item + ',';
            });
            info.services = services.slice(0, -1);
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
                    } else
                        notify_error(data.msg);
                },
                error: function () {
                    notify_error('Cập nhật không thành công');
                }
            });
        }
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
                        //     // $('#minlogo').hide();
                        //     if (feather) {
                        //         feather.replace({
                        //             width: 14,
                        //             height: 14
                        //         });
                        //     }
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
