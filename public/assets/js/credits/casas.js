$(document).ready(function () {
    $('#myTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });
});


$(function () {
    $('[data-toggle="popover"] ').popover()
})
