$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*  When user click add button */
    $('.modal-create').click(function (event) {
        event.preventDefault();
        $('#modalForm').attr('action', $('#urlabm').val());
        $('#btn-save').val("create").html('Agregar');
        $('#modalForm').trigger("reset");
        $('#crudModal').html("Agregar");
        $('#ajax-crud-modal').modal('show');
        $('#comment').removeAttr('readonly').removeAttr('disabled');
    });

    /* When click view */
    $('body').on('click', '.modal-view', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $.get($('#urlabm').val() + '/' + id + '/getone', function (data) {
            $('#crudModal').html("Ver");
            $('#btn-save').val("view").html('Aceptar');
            $('#ajax-crud-modal').modal('show');
            $('#id').val(data.id);
            $('#comment').val(data.comment).attr('readonly', 'readonly').attr('disabled', 'disabled');
        })
    });

    /* When click edit */
    $('body').on('click', '.modal-edit', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $('#modalForm').attr('action', $('#urlabm').val() + '/' + id);
        $.get($('#urlabm').val() + '/' + id + '/getone', function (data) {
            $('#crudModal').html("Editar");
            $('#btn-save').val("edit").html('Guardar');
            $('#ajax-crud-modal').modal('show');
            $('#id').val(data.id);
            $('#comment').val(data.comment).removeAttr('readonly').removeAttr('disabled');
        })
    });

    /* When click destroy */
    $('body').on('click', '.modal-destroy', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $('#modalForm').attr('action', $('#urlabm').val() + '/' + id);
        $.get($('#urlabm').val() + '/' + id + '/getone', function (data) {
            $('#crudModal').html("Borrar");
            $('#btn-save').val("destroy").html('Borrar');
            $('#ajax-crud-modal').modal('show');
            $('#id').val(data.id);
            $('#comment').val(data.comment).attr('readonly', 'readonly').attr('disabled', 'disabled');
        })
    });

    /* When click cancel */
    $('#btn-cancel').click(function () {
        $('#ajax-crud-modal').modal('hide');
    });

    /* When click destroy */
    $('body').on('click', '.modal-submit', function() {
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Enviando..');

        var ajaxType = '';
        switch (actionType) {
            case "create":
                ajaxType = 'POST';
                break;
            case "view":
                ajaxType = 'GET';
                break;
            case "edit":
                ajaxType = 'PUT';
                break;
            case "destroy":
                ajaxType = 'DELETE';
                break;
        }

        if (actionType == 'view') {
            $('#ajax-crud-modal').modal('hide');
        } else {
            $.ajax({
                data: $('#modalForm').serialize(),
                url: $('#modalForm').attr('action'),
                type: ajaxType,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    var htmlRow = data.tablerow;

                    switch (actionType) {
                        case "create":
                            $('#htmlTBody').prepend(htmlRow);
                            $("#id_" + data.id).hide();
                            $("#id_" + data.id).show('slow');
                            break;
                        case "edit":
                            $("#id_" + data.id).hide('slow', function() {
                                $(this).replaceWith(htmlRow);
                                $("#id_" + data.id).show('slow');
                            });
                            break;
                        case "destroy":
                            $("#id_" + data.id).hide('slow', function() {
                                $(this).remove();
                            });
                            break;
                    }

                    $('#modalForm').trigger("reset");
                    $('#ajax-crud-modal').modal('hide');
                    $('#btn-save').html('Los cambios fueron guardados con éxito');

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#btn-save').html('Ha ocurrido un error, por favor reintente');
                }
            });
        }
    });
});
