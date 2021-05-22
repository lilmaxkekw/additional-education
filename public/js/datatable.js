$(document).ready( function () {
    $('.select').mouseup(function (e) {
        e.preventDefault();

        let select = $(this);
        let input = $('.mark-id').val();

        $.ajax({
            url: "{{ route('report.card') }}",
            dataType: 'json',
            method: 'POST',
            data: {
                '_token': $('#csrf').val(),
                'mark': select.val(),
                'input': input,
                'status': 'marks',
            },
            success: function (response) {
                $('#average-marks' + response.id_listener).attr('value', response.average_marks.toPrecision(3));
                // $('#average-marks' + response.id_listener).attr('value', response.average_marks.toFixed(2));
            },
        })
    });
});
