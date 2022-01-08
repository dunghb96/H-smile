/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
$(function () {
    $('#category_id').select2({
        placeholder: "Chọn danh mục",
        allowClear: true,
        dropdownParent: $('#category_id').parent(),
    })
    $('#category_id').val('0').trigger('change');

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
            ajax: '/admin/doctor/json',
            // select: {
            //     style: 'single'
            // },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'phone_number' },
                { data: 'email' },
                // { data: '' }
            ],
            columnDefs: [
                // {
                //     targets: 4,
                //     render: function (data, type, full, meta) {
                //         var html = '';
                //         html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Chỉnh sửa" onclick="loaddata(' + full['id'] + ')">';
                //         html += '<i class="fas fa-pencil-alt"></i>';
                //         html += '</button> &nbsp;';
                //         html += '<button type="button" class="btn btn-icon btn-outline-danger waves-effect" title="Xóa" onclick="del(' + full['id'] + ')">';
                //         html += '<i class="fas fa-trash-alt"></i>';
                //         html += '</button>';
                //         return html;
                //     },
                //     width: 150
                // }
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

function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm dịch vụ mới');
    $('#name').val('');
    $('#description').val('');
    $('#category_id').val('0').change();
    url = '/admin/doctor/add';
    iid = 0;
}

function loaddata(id) {
    $("#addnew").modal('show');
    $(".modal-title").html('Cập nhật dịch vụ');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/admin/doctor/loaddata/" + id,
        success: function (data) {
            $('#name').val(data.name);
            $('#short_description').val(data.short_description);
            $('#content').val(data.content);
            $('#category_id').val(data.category_id).change();
            url = '/admin/doctor/edit';
            iid = id;
        },
        error: function () {
            notify_error('Lỗi truy xuất database');
        }
    });
}

function save() {
    var info = {};
    if (iid != 0) {
        info.id = iid;
    }
    info.name = $("#name").val();
    info.short_description = $("#short_description").val();
    info.content = $("#content").val();
    info.category_id = $("#category_id").val();
    if (info.name == '') {
        notify_error('Tên dịch vụ trống');
    } else if (info.category_id == '') {
        notify_error('Danh mục dịch vụ trống');
    } else {
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
                url: "/admin/doctor/del",
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