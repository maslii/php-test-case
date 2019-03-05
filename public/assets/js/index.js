$(document).ready(function () {

    $('.btn-update').on('click', function () {
        $.ajax({
            url: '/user/get',
            type: "POST",
            data: {id: $(this).data('id')}
        }).done(function (data) {
            $('.container > #modal-update').remove();
            $('.container').append(data);
            $('#modal-update').modal('show');
        });
    });

    $('#btn-add').on('click', function () {

    });

});