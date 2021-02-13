$(document).ready( function () {
    $('.select').change(function (e) {
        e.preventDefault();

        let select = $(this);

        $.post({
            url: '/educator/report-card',
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'items': select.val(),
                'status': 'marks'
            }
        })
    });
});
