$(document).ready( function () {
    $('.edit-date').change(function (e) {
        e.preventDefault();

        let input = $(this);
        let idSection = $('.id-section').val();

        $.post({
            url: '/educator/report-card',
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'date': input.val(),
                'status': 'dates',
                'idSection': idSection
            }
        })
    });

});
