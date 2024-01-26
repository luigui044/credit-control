$('#cliente').change(function () {
    let id = $('#cliente option:selected').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post(`/get-credits/${id}`)
        .done(function (e) {
            $("#credito-div").html(e);
        })
        .fail(function (e) {
            alert(e.message);
        })
});


function getCuota() {
    let credito = $('#credito option:selected').text();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post(`/get-couta/${credito}`)
        .done(function (e) {
            $("#div-cuota").html(e);
        })
        .fail(function (e) {
            console.log(e)
        })
}


