var url = '';
var iid = 0;
$(function () {
    'use strict';
    var select = $('.select2');
    // select2
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            placeholder: 'Select value',
            dropdownParent: $this.parent()
        });
    });

    var table_table = $('#tableBasic');
    // DataTable with buttons
    // --------------------------------------------------------------------
    if (table_table.length) {
        var table = table_table.DataTable({
            ajax: '/admin/employee/json',
            // select: {
            //     style: 'single'
            // },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'type' },
                { data: 'email' },
                { data: 'phone_number' },
                { data: '' }
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $type = full["type"];
                        if ($type == 1) {
                            return 'Nha sĩ';
                        } else if ($type == 2) {
                            return 'Quản trị viên';
                        } else if ($type == 3) {
                            return 'Nhân viên';
                        }
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var html = '';
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

    // $('#frm-add').each(function () {
    //     var $this = $(this);
    //     $this.validate({
    //         rules: {
    //             name: {
    //                 required: true
    //             },
    //             role: {
    //                 required: true
    //             },
    //             password: {
    //                 required: true
    //             },
    //             confirm_password: {
    //                 required: true
    //             },
    //         }
    //     });
    // });
});

function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm nhân viên mới');
    $('#name').val('');
    $('#position').val('').change();
    $('#email').val('');
    $('#phone_number').val('');
    $('#password').val('');
    $('#confirm_password').val('');
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
            $('#type').val(data.type);
            $('#short_description').val(data.short_description);
            if (data.services) {
                services = data.services.split(',');
                $('#service').val(services).change();
            }
            $('#username').val(data.username);
            $('#password').val('');
            $('#confirm_password').val('');
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
    var isValid = $('#frm-add').valid();
    if (isValid) {
        if (iid != 0) {
            info.id = iid;
        }

        info.name = $("#name").val();
        info.position = $("#position").val();
        info.type = $("#type").val();
        info.majors = $("#majors").val();
        info.email = $("#email").val();
        info.phone_number = $("#phone_number").val();
        info.short_description = $("#short_description").val();
        info.username = $("#username").val();
        info.password = $("#password").val();
        info.confirm_password = $("#confirm_password").val();
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
                url: "/admin/employee/del",
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

function changeRole() {
    var roles = $('#role').val();
    if (roles.length > 0) {
        roles.forEach(function (item) {
            if (item == 2) {
                $('#type').val(1);
                $('#service_input').val('').change();
                $('#service_input').removeClass('d-none');
            } else if (item == 1){
                $('#type').val(2);
                $('#service_input').val('').change();
                $('#service_input').addClass('d-none');
            } else {
                $('#type').val(3);
                $('#service_input').val('').change();
                $('#service_input').addClass('d-none');
            }
        });
    } else {
        $('#service_input').val('').change();
        $('#service_input').addClass('d-none');
    }
}
