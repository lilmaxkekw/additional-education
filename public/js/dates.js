$(document).ready( function () {
    $('.edit-date').change(function (e) {
        e.preventDefault();

        let input = $(this);
        //let idSection = ;
        //console.log('idSection = ' + idSection);

        $.post({
            url: '/educator/report-card',
            dataType: 'text',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'date': input.val(),
                'status': 'dates',
                'idSection': input.attr('data-section'),
            }
        })
    });

});
