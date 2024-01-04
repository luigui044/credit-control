


//traer precio de casa
$('#casa').change(function () {
    let casa = $('#casa option:selected').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post("/valor-casa", { casa: casa })
        .done(function (e) {


            $("#div-precio-casa").html(e);

            var monto = $('#monto');
            var interesMensual = $('#interesMensual');
            var cuota = $('#cuota');
            var precioCasa = $('#price');
            var anios = $('#years');
            var interes = $('#interes');
            var meses = $('#meses');

            calcularAmortizacion(precioCasa.val(), interes.val(), meses.val());



        })
        .fail(function (e) {
            console.log(e);
        })
});

$(document).ready(function () {

    calcMeses();
});

function calcMeses() {
    var meses = $('#meses');
    var anios = $('#years');
    meses.val(parseInt(anios.val()) * 12);
}

$('#years').change(function () {
    calcMeses();
})



$('#btnSave').click(function (e) {
    Swal.fire({
        title: "¿Está seguro de continuar?",
        text: "Presione 'Continuar' para registrar al cliente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Continuar"
    }).then((result) => {
        if (result.isConfirmed) {
            $('#form1').submit();
        }
    });
});


$('#form1').submit(function (e) {
    e.preventDefault(); // Evita el envío del formulario por defecto

    if (formIsValid()) {
        this.submit();
    }
});


function formIsValid() {
    var camposValidos = validarCamposRequeridos();

    if (!camposValidos) {
        alert('Por favor, completa todos los campos requeridos.');
        return false;
    }



    return true;
}

function validarCamposRequeridos() {
    var formIsValid = true;

    $('.campo-requerido').each(function () {
        if ($(this).val() === '') {
            formIsValid = false;
            return false; // Sale del bucle si encuentra un campo vacío
        }
    });

    return formIsValid;
}



function calcularAmortizacion(monto, interes, tiempo) {

    var tableBody = $('#myTableBody');
    let amortizacionConstante, pagoInteres, cuota;

    tableBody.empty();
    amortizacionConstante = monto / tiempo;

    for (let i = 1; i <= tiempo; i++) {
        pagoInteres = monto * (interes / 100);
        cuota = amortizacionConstante + pagoInteres;
        monto = monto - amortizacionConstante;

        tableBody.append(`<tr><td>${i}</td><td>${amortizacionConstante.toFixed(2)}</td><td>${pagoInteres.toFixed(2)}</td><td>${cuota.toFixed(2)}</td><td>${monto.toFixed(2)}</td></tr>`);
    }
}

