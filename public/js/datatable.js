$(document).ready( function () {
    $('.select').mouseup(function (e) {
        e.preventDefault();

        let select = $(this);
        let input = $('.mark-id').val();

        $.ajax({
            url: "{{ route('report.card') }}",
            dataType: 'json',
            method: 'POST',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'mark': select.val(),
                'input': input,
                'status': 'marks'
            },
            success: function (response) {
                $('#average-marks' + response.id_listener).attr('value', response.average_marks.toFixed(2));
            },
            error: function (response) {
                console.log(response);
            }
        })
    });
});
