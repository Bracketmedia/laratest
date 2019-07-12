// Delay comments load until everything else is loaded

// $(window).load(function () {
//     $('.card-body').removeAttr('style');
// })


//Add a new comment
$(document).on('click', '.add-modal', function () {
    $('.modal-title').text('Add');
    $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function () {
    $.ajax({
        type: 'POST',
        url: 'comments',
        data: {
            '_token': $('input[name=_token]').val(),
            'content': $('#content_add').val(),
            'author_id': $('#author_id').val(),
        },
        success: function (data) {
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Successfully added Comment!', 'Success Alert', {timeOut: 5000});

                if ($('#author_role').val() == 1) {
                    $('#commentContent').append("<div class='col item" + data.id + "'><h6 class='text-info text-right'>"+ data.updated_at +"</h6><p class='text-justify font-italic'>" + data.content + "</p><h6 class='text-left font-weight-bold'>" + $('#author_name').val() + "</h6><button class='edit-modal btn btn-info' data-id='"+ data.id +"' data-content='"+ data.content +"'>Edit</button><button class='delete-modal btn btn-danger' data-id='"+ data.id +"' data-content='"+ data.content +"'>Delete</button></div>");
                } else if ($('#author_role').val() == 2) {
                    $('#commentContent').append("<div class='col item" + data.id + "'><h6 class='text-info text-right'>"+ data.updated_at +"</h6><p class='text-justify font-italic'>" + data.content + "</p><h6 class='text-left font-weight-bold'>" + $('#author_name').val() + "</h6><button class='edit-modal btn btn-info' data-id='"+ data.id +"' data-content='"+ data.content +"'>Edit</button></div>");
                } else {
                    $('#commentContent').append("<div class='col item" + data.id + "'><h6 class='text-info text-right'>"+ data.updated_at +"</h6><p class='text-justify font-italic'>" + data.content + "</p><h6 class='text-left font-weight-bold'>" + $('#author_name').val() + "</h6></div>");
                }

            }
            console.log(data);
        },
    });
});

// Edit a comment
$(document).on('click', '.edit-modal', function () {
    $('.modal-title').text('Edit');
    $('#id_edit').val($(this).data('id'));
    $('#content_edit').val($(this).data('content'));
    id = $('#id_edit').val();
    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'PUT',
        url: 'comments/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id_edit").val(),
            'content': $('#content_edit').val(),
            'author_id': $('#author_id').val()
        },
        success: function (data) {
            $('.errorTitle').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#editModal').modal('show');
                    toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Successfully updated Comment!', 'Success Alert', {timeOut: 5000});

                if ($('#author_role').val() == 1) {
                    $('.item' + data.id).replaceWith("<div class='col item" + data.id + "'><h6 class='text-info text-right'>"+ data.updated_at +"</h6><p class='text-justify font-italic'>" + data.content + "</p><h6 class='text-left font-weight-bold'>" + $('#author_name').val() + "</h6><button class='edit-modal btn btn-info' data-id='"+ data.id +"' data-content='"+ data.content +"'>Edit</button><button class='delete-modal btn btn-danger' data-id='"+ data.id +"' data-content='"+ data.content +"'>Delete</button></div>");
                } else if ($('#author_role').val() == 2) {
                    $('.item' + data.id).replaceWith("<div class='col item" + data.id + "'><h6 class='text-info text-right'>"+ data.updated_at +"</h6><p class='text-justify font-italic'>" + data.content + "</p><h6 class='text-left font-weight-bold'>" + $('#author_name').val() + "</h6><button class='edit-modal btn btn-info' data-id='"+ data.id +"' data-content='"+ data.content +"'>Edit</button></div>");
                } else {
                    $('.item' + data.id).replaceWith("<div class='col item" + data.id + "'><h6 class='text-info text-right'>"+ data.updated_at +"</h6><p class='text-justify font-italic'>" + data.content + "</p><h6 class='text-left font-weight-bold'>" + $('#author_name').val() + "</h6></div>");
                }
            }
        }
    });
});

//Delete a comment
$(document).on('click', '.delete-modal', function () {
    $('.modal-title').text('Delete');
    $('#id_delete').val($(this).data('id'));
    $('#deleteModal').modal('show');
    id = $('#id_delete').val();
});
$('.modal-footer').on('click', '.delete', function () {
    $.ajax({
        type: 'DELETE',
        url: 'comments/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function (data) {
            toastr.success('Successfully deleted Comment!', 'Success Alert', {timeOut: 5000});
            $('.item' + data['id']).remove();
        }
    });
});
