$(document).ready( function () {
    $('.btnSaveAccountEducator').click(function (e) {
        e.preventDefault();

        console.log($('#name').val());
        console.log($('#number_phone').val());
        console.log($('#email').val());


        $.ajax({
            url: "{{ route('educator.account') }}",
            dataType: 'JSON',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('#csrf').val(),
            },
            data: {
                'name': $('#name').val(),
                'number_phone': $('#number_phone').val(),
                'email': $('#email').val(),
            },
            success: function (response) {
                let tmp = JSON.stringify(response);

                $('#modalSuccess').removeClass('hidden')
                $('.addText').text(`Аккаунт успешно сохранен!`)
            },
            error: function (response) {
                let errors = response.responseJSON;

                $('#email').removeClass('border border-red-400');
                $('#name').removeClass('border border-red-400');
                $('#number_phone').removeClass('border border-red-400');

                $('#email_error').addClass('hidden');
                $('#name_error').addClass('hidden');
                $('#number_phone_error').addClass('hidden');

                if($.isEmptyObject(errors) === false) {
                    $.each(errors.errors, function(key, value){
                        let mainInput = '#' + key,
                            errorInput = '#' + key + '_error';

                        $(mainInput).addClass('border border-red-400');
                        $(errorInput).removeClass('hidden');
                        $(errorInput).text(value);
                    });
                }
            },
        })
    });

    $('button[name=ok]').click(function () {
        $('.modalSuccess').fadeOut(300)
        //location.reload();
    });

});
