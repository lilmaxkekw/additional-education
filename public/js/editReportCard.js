$(document).ready(function() {
    $('.select').mouseup();

    $('.edit-modal').click(function (e) {
        e.preventDefault();

        let idSection = $(this).attr('data-id');

        $('#name_section').attr('value', $(this).attr('data-name'));
        $('#description_section').attr('value', $(this).attr('data-description'));
        $('#date_section').attr('value', $(this).attr('data-date'));

        $('#btnSave').click(function (e) {
            e.preventDefault();

            let nameSection = $('#name_section').val(),
                descriptionSection = $('#description_section').val(),
                dateSection = $('#date_section').val();

            $.ajax({
                url: "{{ route('edit.report.card.modal') }}",
                method: 'PATCH',
                dataType: 'json',
                data: {
                    '_token': $('#csrf').val(),
                    'id_section': idSection,
                    'name_section': nameSection,
                    'description_section': descriptionSection,
                    'date_section': dateSection
                },
                success: function (data) {
                    modal.classList.remove('fadeIn');
                    modal.classList.add('fadeOut');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 500);

                    location.reload();
                },
                error: function (data) {
                    let errors = data.responseJSON;

                    $('#name_section').removeClass('border border-red-400');
                    $('#description_section').removeClass('border border-red-400');
                    $('#date_section').removeClass('border border-red-400');

                    $('#name_section_error').addClass('hidden');
                    $('#description_section_error').addClass('hidden');
                    $('#date_section_error').addClass('hidden');

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
    });

});
