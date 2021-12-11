function resetInput(id) {
    $("input#" + id).val('');
    $("#image-preview-" + id).find('img').attr("src", "/images/no-image.png");
}

const route_prefix = "/admin/laravel-filemanager";
$('.lfm-image').filemanager('image', {prefix: route_prefix});
$('.lfm-file').filemanager('file', {prefix: route_prefix});

//check all
$("#check-all").change(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
});

// alert message
$('div.alert-message').delay(3000).slideUp();

function confirmDelete(url, itemId, token) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((isConfirm) => {
        if (isConfirm.value) {
            $.post(url, {
                item_id : itemId,
                _token : token
            }, function (data) {
                if (data.status === 'success'){
                    $("#row-id-" + itemId).slideUp();
                    Swal.fire(data.title + "!", data.message, "success");
                }else{
                    Swal.fire(data.title + "!", data.message, data.status);
                }
            });
        } else {
            Swal.fire("Cancelled", "Action has been canceled.", "error");
        }
    });
}

function postData(route, dataPost) {
    $.post(route, dataPost)
        .done(function (data) {
            if (data.status && data.status === 'success') {
                toastr.success(data.message, 'Success');
            }
        })
        .fail(function (data) {
            if (data.status === 422) {
                let response = data.responseJSON;
                $.each(response.errors, function (key, value) {
                    toastr.error(value, 'Error');
                });
            }
        });
}

