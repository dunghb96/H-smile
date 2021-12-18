/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
$(function () {

    var basicPickr = $('.flatpickr-basic');
    if (basicPickr.length) {
        basicPickr.flatpickr({
            dateFormat: "d/m/Y",
        });
    }

    $('#service').select2({
        placeholder: "Chọn dịch vụ",
        allowClear: true,
        dropdownParent: $('#service').parent(),
    })

    $('#service').val(null).change();

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
                { data: 'full_name' },
                { data: 'patient_id' },
                { data: 'age' },
                { data: 'services' },
                { data: 'service_id' },
                { data: 'status' },
                { data: 'status_word' },
                { data: '' }
            ],
            columnDefs: [
                {
                    targets: 1,
                    render: function(data, type, full, meta){
                        return '<a href="javascript:void(0)" class="user_name text-primary" onclick="loadpatient('+full['patient_id']+')"><span class="font-weight-bold">'+full['full_name']+'</span></a>'
                    }
                },
                {
                    targets: 2,
                    visible: false,
                },
                {
                    targets: 5,
                    visible: false,
                },
                {
                    targets: 6,
                    visible: false,
                },
                {
                    targets: 8,
                    render: function (data, type, full, meta) {
                        var html = '';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Tạo lịch khám" onclick="duyet(' + full['id'] + ',' + full['service_id'] + ',' + full['status'] + ')">';
                        html += '<i data-feather="calendar"></i>';
                        html += '</button> &nbsp;';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chỉnh sửa" onclick="loaddata(' + full['id'] + ')">';
                        html += '<i class="fas fa-pencil-alt"></i>';
                        html += '</button> &nbsp;';
                        html += '<button type="button" class="btn btn-icon btn-outline-danger waves-effect" title="Xóa" onclick="del(' + full['id'] + ')">';
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
                name: {
                    required: true
                },
                parent_id: {
                    required: true
                },
                price: {
                    digits: true
                }
            }
        });
    });
});

function loadpatient()
{
    $('#patientinfo').modal('show');
}

function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm dịch vụ mới');
    $('#name').val('');
    $('#short_description').val('');
    $('#price').val('');
    $('#parent_id').val('0').change();
    url = '/admin/service/add';
    iid = 0;
}

function loaddata(id) {
    $("#editinfo").modal('show');
    $(".modal-title").html('Cập nhật dịch vụ');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/service/loaddata",
        success: function (data) {
            $('#ename').val(data.name);
            $('#eprice').val(data.price);
            $('#eshort_description').val(data.short_description);
            $('#econtent').val(data.content);
            $('#parent_id').val(data.parent_id).change();
            $('#iid').val(id);
            url = '/admin/service/edit';
            iid = id;
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function save() {
    var info = {};
    var isValid = $('#frm-add').valid();

    if (iid != 0) {
        var info = new FormData($("#frm-edit")[0]);
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: url,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    notyfi_success(data.msg);
                    $('#editinfo').modal('hide');
                    $("#tableBasic").DataTable().ajax.reload(null, false);
                }
                else
                    notify_error(data.msg);
            },
            error: function () {
                notify_error('Cập nhật không thành công');
            }
        });
    } else {
        if (isValid) {
            var info = new FormData($("#frm-add")[0]);
            $.ajax({
                type: "POST",
                dataType: "json",
                data: info,
                url: url,
                contentType: false,
                processData: false,
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
}

function duyet(id, service, status) {
    if(status == 1) {
        $("#addlich").modal('show');
        $(".modal-title").html('Tạo lịch khám');
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {service: service},
            url: "/admin/appointment/get-doctor", // giờ anh tạo route rồi lấy dữ liệu doctor ra cho em nha OK
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
                $(window).on('load', function() {
                    // $('#minlogo').hide();
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                })
            },
        });
        iid = id;
    } else if(status == 2) {
        notify_error('Lịch khám đang thực hiện');
    } else if(status == 3) {
        notify_error('Lịch hẹn đã hoàn thành');
    }
    
}

function saveExamSchedule() {
    var info = {};
    info.appointment = iid;
    info.doctor = $('#doctor').val();
    info.service = $('#service').val();
    info.dateat = $('#date_at').val();
    info.shift = $('#shift').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: info,
        url: "/admin/appointment/add-schedule",
        success: function (data) {
            if(data.success) {
                notyfi_success(data.msg);
                $('#addlich').modal('hide');
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

function del(id) {
    Swal.fire({
        title: 'Xóa dữ liệu',
        text: "Bạn có chắc chắn muốn xóa!",
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
                url: "/admin/service/del",
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
