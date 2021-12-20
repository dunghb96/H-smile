/**
 * DataTables Basic
 */
var url = '';
var iid = 0;

$(function () {
    $('#role').select2({
        placeholder: "Chọn các quyền",
        allowClear: true,
        multiple: true,
        dropdownParent: $('#role').parent(),
    })
    $('#role').val(null).trigger('change');

    'use strict';
    var table_table = $('#tableBasic');
    // $('#nhanvien').select2();
    // $('#tinh_trang').select2({
    //     minimumResultsForSearch: Infinity
    // });
    // DataTable with buttons
    // --------------------------------------------------------------------
    if (table_table.length) {
        var table = table_table.DataTable({
            ajax: '/admin/user/json',
            // select: {
            //     style: 'single'
            // },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: ''}
            ],
            columnDefs: [
                {
                    targets: 3,
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


function thayanh() {
    var myform = new FormData($('#upload-avt')[0]);
    $.ajax({
        url: "/admin/user/thayanh",
        type: 'post',
        data: myform,
        contentType: false,
        processData: false,
        dataType:'json',
        success: function (data) {
            if (data.success) {
                $('#avatar').attr('src', data.filename);
                $('#hungsua2').attr('src', data.filename);
            }
            else
                notify_error(data.msg);
        },
    });
}

function xoaanh() {
    $.ajax({
        type: "post",
        url: "/admin/user/xoaanh",
        success: function (data) {
            if (data.success){
                $('#avatar').attr('src', '/images/avatar-s-11.jpg');
                $('#hungsua2').attr('src', '/images/avatar-s-11.jpg');
            }
        },
    });
}

function save() {
    var info = {};

    iid = $("#iid").val();
    if (iid != 0) {
        info.id = iid;
        console.log("Thành Công");
        var info = new FormData($("#frm-edit")[0]);
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: "/admin/user/edit",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    notyfi_success(data.msg);
                    setInterval(function () {
                        window.location.reload();
                    }, 1000);
                } else
                    notify_error(data.msg);
            },
            error: function () {
                notify_error('Cập nhật không thành công');
            }
        });
    }
}


function editPassword() {
    var info = {};

    iid = $("#iid").val();
    if (iid != 0) {
        info.id = $("#iid").val();
        console.log("Thành Công");
        var info = new FormData($("#frm-changePassword")[0]);
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: "/admin/user/changePassword",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    notyfi_success(data.msg);
                    setInterval(function () {
                        window.location.href = "logout";
                    }, 2000);
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
                url: "/admin/user/delete",
                type: 'post',
                dataType: "json",
                data: {item_id: id},
                success: function (data) {
                    if (data.success) {
                        notyfi_success(data.msg);
                        $(".user-list-table").DataTable().ajax.reload(null, false);
                    } else
                        notify_error(data.msg);
                },
            });
        }
    });
}
