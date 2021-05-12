$(document).ready( function () {
    $('.btnSave').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/educator/account",
            dataType: 'json',
            method: 'POST',
            data: {
                '_token': $('#csrf').val(),
                'name': $('#name').val(),
                'email': $('#email').val(),
            },
            success: function (response) {
                let tmp = JSON.stringify(response);

                modal.classList.remove('fadeIn');
                modal.classList.add('fadeOut');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 500);

                $('[data-status=success]').removeClass('hidden')
                $('.addText').text(`Аккаунт успешно сохранен!`)

            },
            error: function (response) {
                modal.classList.remove('fadeIn');
                modal.classList.add('fadeOut');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 500);

                $('[data-status=failed]').removeClass('hidden')
                $('.addText').text(`При сохранении произошла ошибка!`)
            },
        })
    });

    $('button[name=ok]').click(function () {
        $('.modalSuccess').fadeOut(300)
        location.reload();
    });

});
