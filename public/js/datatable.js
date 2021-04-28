$(document).ready( function () {
    $('.select').change(function (e) {
        e.preventDefault();

        let select = $(this);
        let input = $('.mark-id').val();

        $.post({
            url: '/educator/report-card',
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'mark': select.val(),
                'input': input,
                'status': 'marks'
            }
        })
    });
});
