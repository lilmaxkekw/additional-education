// $(document).ready( function () {
//     $('.edit-modal').click(function (e) {
//         e.preventDefault();
//
//         let idSection = $(this).attr('data-section');
//
//         $.ajax({
//             url: '{{ route("edit.report.card.modal", idSection) }}',
//             dataType: 'json',
//             method: 'PATCH',
//             data: {
//                 '_token': $('meta[name="csrf-token"]').attr('content'),
//                 'idSection': idSection,
//             },
//             success: function (response) {
//                 console.log(response);
//             },
//             error: function (response) {
//                 console.log(response);
//             }
//         })
//     });
// });
