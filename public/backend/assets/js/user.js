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
        // $('input.dt-input').on('keyup', function () {
        //     filterColumn($(this).attr('data-column'), $(this).val());
        // });
        //$('div.head-label').html('<h6 class="mb-0">Menu</h6>');
    }

    // Delete Record
    // $('.del-item').on('click', function () {
    //     var data = $.map(table.rows('.selected').data(), function (item) {
    //         return item
    //     });
    //     if (data != '') {
    //         Swal.fire({
    //             title: "Bạn có chắc chắn không?",
    //             text: "Bạn sẽ ko thể hoàn tác thao tác này!",
    //             icon: "warning",
    //             showCancelButton: !0,
    //             confirmButtonText: "Đồng ý",
    //             cancelButtonText: "Hủy bỏ",
    //             customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-outline-danger ml-1"},
    //             buttonsStyling: !1
    //         }).then((function (t) {
    //             if(t.value) {
    //                 data = data[0];
    //                 $.post("nhanvien/del", {'id': data.id}, function (result) {
    //                     var result = JSON.parse(result);
    //                     if (result.success) {
    //                         table.ajax.reload(null, false);
    //                     } else {
    //                         Swal.fire({
    //                             //  title: 'Error!',
    //                             position: 'bottom-end',
    //                             text: result.msg,
    //                             icon: 'error',
    //                             customClass: {
    //                                 confirmButton: 'btn btn-primary'
    //                             },
    //                             buttonsStyling: false
    //                         });
    //                     }
    //                 });
    //             }
    //         }))
    //     } else {
    //         Swal.fire({
    //             text: 'Chưa có bản ghi được chọn!',
    //             position: 'bottom-end',
    //             icon: 'error',
    //             customClass: {
    //                 confirmButton: 'btn btn-primary'
    //             },
    //             buttonsStyling: false
    //         });
    //     }
    // });


    // $('.edit-item').on('click', function () {
    //     var data = $.map(table.rows('.selected').data(), function (item) {
    //         return item
    //     });
    //     if (data != '') {
    //             data = data[0];
    //             window.location.href = baseUrl + 'nhanvien/edit?id=' + data.id;
    //     } else {
    //         Swal.fire({
    //             text: 'Chưa có bản ghi được chọn!',
    //             position: 'bottom-end',
    //             icon: 'error',
    //             customClass: {
    //                 confirmButton: 'btn btn-primary'
    //             },
    //             buttonsStyling: false
    //         });
    //     }
    // });

    // $('.add-item').on('click', function () {
    //     window.location.href=baseUrl+'nhanvien/add'
    // });


    // $('#data-submit').on('click', function () {
    //     let url = baseUrl + 'nhanvien/saveadd';
    //     $('#fm').validate({
    //         submitHandler: function (form) {
    //             var formData = new FormData(form);
    //             $.ajax({
    //                 url: url,
    //                 type: 'POST',
    //                 data: formData,
    //                 async: false,
    //                 cache: false,
    //                 contentType: false,
    //                 enctype: 'multipart/form-data',
    //                 processData: false,
    //                 success: function (result) {
    //                     var result = eval("(" + result + ")");
    //                     if (result.success) {
    //                         window.location.href = baseUrl + "nhanvien";
    //                     } else {
    //                         Swal.fire({
    //                             //  title: 'Error!',
    //                             position: 'bottom-end',
    //                             text: result.msg,
    //                             icon: 'error',
    //                             customClass: {
    //                                 confirmButton: 'btn btn-primary'
    //                             },
    //                             buttonsStyling: false
    //                         });
    //                     }
    //                 }
    //             });
    //             return false;
    //         }
    //     });
    //     $('#fm').submit();
    // });
});


// function filterColumn(i, val) {
//     // if (i == 5) {
//     //     var startDate = $('.start_date').val(),
//     //         endDate = $('.end_date').val();
//     //     if (startDate !== '' && endDate !== '') {
//     //         filterByDate(i, startDate, endDate); // We call our filter function
//     //     }
//     //     $('#tableBasic').dataTable().fnDraw();
//     // } else {
//         $('#tableBasic').DataTable().column(i).search(val, false, true).draw();
//     // }
// }

// Advance filter function
// We pass the column location, the start date, and the end date
// var filterByDate = function (column, startDate, endDate) {
//     // Custom filter syntax requires pushing the new filter to the global filter array
//     $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
//         var rowDate = normalizeDate(aData[column]),
//             start = normalizeDate(startDate),
//             end = normalizeDate(endDate);

//         // If our date from the row is between the start and end
//         if (start <= rowDate && rowDate <= end) {
//             return true;
//         } else if (rowDate >= start && end === '' && start !== '') {
//             return true;
//         } else if (rowDate <= end && start === '' && end !== '') {
//             return true;
//         } else {
//             return false;
//         }
//     });
// };

// function loadadd() {
//     $("#addnew").modal('show');
//     $(".modal-title").html('Thêm tài khoản mới');
//     $('#name').val('');
//     $('#email').val('');
//     $('#password').val('');
//     $('#role').val('').change();
//     url = '/admin/user/edit';
// }

// function loaddata(id) {
//     console.log("Chay loaddata")
//     $.ajax({
//         type: "POST",
//         dataType: "json",
//         data: { id: id },
//         url: "/admin/user/loaddata",
//         success: function (data) {
//             url = '/admin/user/edit';
//             iid = $('#iid').val();
//         },
//         error: function () {
//             notify_error('Lỗi truy xuất database');
//         }
//     });
// }

function save() {
    var info = {};

    iid = $("#iid").val();
    if (iid != 0) {
        info.id = iid;

        info.name = $("#name").val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: info,
            url: "/admin/user/edit",

            success: function (data) {
                if (data.success) {
                    notyfi_success(data.msg);
                    // $('#addnew').modal('hide');
                    // $("#tableBasic").DataTable().ajax.reload(null, false);
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
