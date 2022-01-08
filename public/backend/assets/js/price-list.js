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
            ajax: '/admin/price-list/json',
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'short_description' },
                { data: '' }
            ],
            columnDefs: [
                {
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var html = '';
                        html += '<button type="button" class="btn btn-icon btn-outline-primary waves-effect" title="Tạo bảng giá" onclick="loaddata(' + full['id'] + ')">';
                        html += '<i class="fas fa-pencil-alt"></i>';
                        html += '</button> &nbsp;';
                        return html;
                    },
                    width: 150
                }
            ],
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
                category_id: {
                    required: true
                }
            }
        });
    });
});

function loadadd() {
    $("#addnew").modal('show');
    $(".modal-title").html('Thêm dịch vụ mới');
    $('#name').val('');
    $('#description').val('');
    $('#category_id').val('0').change();
    url = '/admin/service/add';
    iid = 0;
}

function loaddata(id) {
    $("#addnew").modal('show');
    $(".modal-title").html('Cập nhật bảng giá');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: { id: id },
        url: "/admin/price-list/loaddata",
        success: function (data) {
            $('#name').val(data.name);
            $('#short_description').val(data.short_description);
            $('#content').val(data.content);
            $('#category_id').val(data.category_id).change();
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
    if (isValid) {
        if (iid != 0) {
            info.id = iid;
        }
        info.name = $("#name").val();
        info.short_description = $("#short_description").val();
        info.content = $("#content").val();
        info.category_id = $("#category_id").val();
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