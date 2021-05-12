$(document).ready( function () {
    $('.edit-date').change(function (e) {
        e.preventDefault();

        let input = $(this);

        $.ajax({
            url: "{{ route('report.card') }}",
            dataType: 'text',
            method: 'POST',
            data: {
                '_token': $('#csrf').val(),
                'date': input.val(),
                'idSection': input.attr('data-section'),
                'status': 'dates',
            },
            success: function () {
                location.reload();
            }
        })
    });

});
