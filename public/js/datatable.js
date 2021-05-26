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
                if ($('#partition-mark' +  response.id_listener).attr('data-check') === 'false') {
                    $('#partition-mark' + response.id_listener).attr('value', response.average_marks.toPrecision(3));
                }
            },
        })
    });

    $('.partition-mark').keyup(function (e) {
        e.preventDefault();

        let mark = $(this).val(),
            id = $(this).attr('id'),
            id_listener = $(this).attr('data-id'),
            id_section = $(this).attr('data-section');

        $.ajax({
            url: "{{ route('report.card') }}",
            dataType: 'json',
            method: 'POST',
            data: {
                '_token': $('#csrf').val(),
                'mark': mark,
                'id': id,
                'id_listener': id_listener,
                'id_section': id_section,
                'status': 'total'
            },
            success: function (response) {
                $('#' + response.id).attr('data-check', 'true');
            }
        });
    });
});
