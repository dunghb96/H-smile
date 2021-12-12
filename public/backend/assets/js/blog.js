/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
$(function () {
    $('#category').select2({
        placeholder: "Chọn danh mục",
        allowClear: true,
        dropdownParent: $('#category').parent(),
    })
    $('#category').val(null).trigger('change');

    'use strict';
    var table_table = $('#tableBasic');
    // DataTable with buttons
    // --------------------------------------------------------------------
    if (table_table.length) {
        var table = table_table.DataTable({
            ajax: '/admin/blog/json',
            // select: {
            //     style: 'single'
            // },
            columns: [
                { data: 'id' },
                { data: 'title' },
                { data: 'image' },
                { data: '' }
            ],
            columnDefs: [
                {
                    targets: 2,
                        render: function (data, type, full, meta) {
                            var src = full['image'];
                            return '<img src="' + src + '" width="200px" >';
                        },
                },

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
                title: {
                    required: true
                },
                image: {
                    required: true
                },
                category: {
                    required: true
                },
            }
        });
    });
});

function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm bài viết mới');
    $('#title').val('');
    $('#category').val(null).trigger('change');
    $('#short_desc').val('');
    url = '/admin/blog/add';
    iid = 0;
}

function loaddata(id) {
    $("#addnew").modal('show');
    $(".modal-title").html('Cập nhật bài viết');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/blog/loaddata",
        success: function (data) {
            $('#title').val(data.title);
            $('#short_desc').val(data.short_desc);
            tinyMCE.get('content').setContent(data.content);
            url = '/admin/blog/edit';
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
    tinyMCE.triggerSave();
    if (isValid) {
        if (iid != 0) {
            info.id = iid;
        }
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
                url: "/admin/blog/del",
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
