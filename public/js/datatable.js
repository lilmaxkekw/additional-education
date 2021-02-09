var result = null;

$(document).ready( function () {
    $('.select').blur(function (e) {
        e.preventDefault();

        var select = $(this);

        $.post({
            url: '/educator/report-card',
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'items': select.val()
            }
        })
    });
} );
