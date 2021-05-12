$(document).ready( function () {
    $('.btnSaveAccount').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/educator/account",
            dataType: 'json',
            method: 'POST',
            data: {
                '_token': $('#csrf').val(),
                'name': $('#name').val(),
                'number_phone': $('#number_phone').val(),
                'email': $('#email').val(),
            },
            success: function (response) {
                let tmp = JSON.stringify(response);

                $('#modalSuccess').removeClass('hidden')
                $('.addText').text(`Аккаунт успешно сохранен!`)
            }
        })
    });

    $('button[name=ok]').click(function () {
        $('.modalSuccess').fadeOut(300)
        location.reload();
    });

});
