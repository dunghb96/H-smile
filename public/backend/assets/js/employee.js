/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
$(function () {

    'use strict';
    var bsStepper = document.querySelectorAll('.bs-stepper'),
        select = $('.select2'),
        horizontalWizard = document.querySelector('.horizontal-wizard-example'),
        verticalWizard = document.querySelector('.vertical-wizard-example'),
        modernWizard = document.querySelector('.modern-wizard-example'),
        modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

    // Adds crossed class
    if (typeof bsStepper !== undefined && bsStepper !== null) {
        for (var el = 0; el < bsStepper.length; ++el) {
            bsStepper[el].addEventListener('show.bs-stepper', function (event) {
                var index = event.detail.indexStep;
                var numberOfSteps = $(event.target).find('.step').length - 1;
                var line = $(event.target).find('.step');

                // The first for loop is for increasing the steps,
                // the second is for turning them off when going back
                // and the third with the if statement because the last line
                // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

                for (var i = 0; i < index; i++) {
                    line[i].classList.add('crossed');

                    for (var j = index; j < numberOfSteps; j++) {
                        line[j].classList.remove('crossed');
                    }
                }
                if (event.detail.to == 0) {
                    for (var k = index; k < numberOfSteps; k++) {
                        line[k].classList.remove('crossed');
                    }
                    line[0].classList.remove('crossed');
                }
            });
        }
    }

    // select2
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            placeholder: 'Select value',
            dropdownParent: $this.parent()
        });
    });

    // Horizontal Wizard
    // --------------------------------------------------------------------
    if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
        var numberedStepper = new Stepper(horizontalWizard),
            $form = $(horizontalWizard).find('form');
        $form.each(function () {
            var $this = $(this);
            $this.validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone_number: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    short_description: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    role: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                }
            });
        });

        $(horizontalWizard)
            .find('.btn-next')
            .each(function () {
                $(this).on('click', function (e) {
                    var isValid = $(this).parent().siblings('form').valid();
                    if (isValid) {
                        numberedStepper.next();
                    } else {
                        e.preventDefault();
                    }
                });
            });

        $(horizontalWizard)
            .find('.btn-prev')
            .on('click', function () {
                numberedStepper.previous();
            });

        $(horizontalWizard)
            .find('.btn-submit')
            .on('click', function () {
                var isValid = $(this).parent().siblings('form').valid();
                if (isValid) {
                    // alert('Submitted..!!');
                    save();
                }
            });
    }

    // Vertical Wizard
    // --------------------------------------------------------------------
    if (typeof verticalWizard !== undefined && verticalWizard !== null) {
        var verticalStepper = new Stepper(verticalWizard, {
            linear: false
        });
        $(verticalWizard)
            .find('.btn-next')
            .on('click', function () {
                verticalStepper.next();
            });
        $(verticalWizard)
            .find('.btn-prev')
            .on('click', function () {
                verticalStepper.previous();
            });

        $(verticalWizard)
            .find('.btn-submit')
            .on('click', function () {
                alert('Submitted..!!');
            });
    }

    // Modern Wizard
    // --------------------------------------------------------------------
    if (typeof modernWizard !== undefined && modernWizard !== null) {
        var modernStepper = new Stepper(modernWizard, {
            linear: false
        });
        $(modernWizard)
            .find('.btn-next')
            .on('click', function () {
                modernStepper.next();
            });
        $(modernWizard)
            .find('.btn-prev')
            .on('click', function () {
                modernStepper.previous();
            });

        $(modernWizard)
            .find('.btn-submit')
            .on('click', function () {
                alert('Submitted..!!');
            });
    }

    // Modern Vertical Wizard
    // --------------------------------------------------------------------
    if (typeof modernVerticalWizard !== undefined && modernVerticalWizard !== null) {
        var modernVerticalStepper = new Stepper(modernVerticalWizard, {
            linear: false
        });
        $(modernVerticalWizard)
            .find('.btn-next')
            .on('click', function () {
                modernVerticalStepper.next();
            });
        $(modernVerticalWizard)
            .find('.btn-prev')
            .on('click', function () {
                modernVerticalStepper.previous();
            });

        $(modernVerticalWizard)
            .find('.btn-submit')
            .on('click', function () {
                alert('Submitted..!!');
            });
    }

    var table_table = $('#tableBasic');
    // $('#nhanvien').select2();
    // $('#tinh_trang').select2({
    //     minimumResultsForSearch: Infinity
    // });
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
                            return 'Thu ngân';
                        } else if ($type == 3) {
                            return 'Quản trị viên';
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
});

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