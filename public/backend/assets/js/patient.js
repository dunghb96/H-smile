/**
 * DataTables Basic
 */
var url = '';
var iid = 0;
$(function () {
    'use strict';
    var table_table = $('#tableBasic');
    // DataTable with buttons
    // --------------------------------------------------------------------
    if (table_table.length) {
        //  console.log(data);
        var table = table_table.DataTable({

            ajax: '/admin/patient/json',

            columns: [
                { data: 'id' },
                { data: 'full_name' },
                { data: 'age' },
                { data: 'phone_number' },
                { data: 'email' },
                { data: 'address' },
                // { data: '' }
            ],
            columnDefs: [
                // {
                //     targets: 6,
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

            language: {
                sLengthMenu: "Show _MENU_",
                search: "Search",
                searchPlaceholder: "11111111112..",
            },
            // Buttons with Dropdown
            buttons: [
                //  {
                //      text: "Thêm mới",
                //      className: "add-new btn btn-primary mt-50",
                //      init: function (api, node, config) {
                //          $(node).removeClass("btn-secondary");
                //      },
                //      action: function (e, dt, node, config) {
                //          loadadd();
                //      },
                //  },
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
                },
                price: {
                    digits: true
                }
            }
        });
    });
});
