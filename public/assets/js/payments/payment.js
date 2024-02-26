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




$('#credito').change(function () {
    let id = $('#credito option:selected').val();
    console.log(id)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post(`/get-cobros/${id}`)
        .done(function (e) {
            $("#cobros-div").html(e);
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


function getMontoCobro() {
    // let credito = $('#cobro option:selected').text();

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $.post(`/get-couta/${credito}`)
    //     .done(function (e) {
    //         $("#div-cuota").html(e);
    //     })
    //     .fail(function (e) {
    //         console.log(e)
    //     })
}
function updateTotal() {
    let monto = ($('#monto').val() !== "" && !isNaN($('#monto').val())) ? parseFloat($('#monto').val()) : 0;
    let mora = ($('#mora').val() !== "" && !isNaN($('#mora').val())) ? parseFloat($('#mora').val()) : 0;
    console.log(monto)
    console.log(mora)
    let total = $('#total');

    total.val((monto + mora).toFixed(2));
}
$('.valores').change(function () {
    updateTotal();
})