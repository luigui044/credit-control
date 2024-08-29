


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




            var precioCasa = $('#price');
            var interes = $('#interes');
            var anios = $('#years');
            calcshow(precioCasa.val(), interes.val(), anios.val());



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

$('.recCredit').change(function () {

    var precioCasa = $('#price');
    var interes = $('#interes');
    var anios = $('#years');
    calcshow(precioCasa.val(), interes.val(), anios.val());


})




function fixVal(value, numberOfCharacters, numberOfDecimals, padCharacter) {
    var i, stringObject, stringLength, numberToPad;

    value = value * Math.pow(10, numberOfDecimals);
    value = Math.round(value);

    stringObject = new String(value);
    stringLength = stringObject.length;
    while (stringLength < numberOfDecimals) {
        stringObject = "0" + stringObject;
        stringLength = stringLength + 1;
    }

    if (numberOfDecimals > 0) {
        stringObject = stringObject.substring(0, stringLength - numberOfDecimals) + "." +
            stringObject.substring(stringLength - numberOfDecimals, stringLength);
    }

    if (stringObject.length < numberOfCharacters && numberOfCharacters > 0) {
        numberToPad = numberOfCharacters - stringObject.length;
        for (i = 0; i < numberToPad; i = i + 1) {
            stringObject = padCharacter + stringObject;
        }
    }

    return stringObject;
}

function calcshow(amount, rate, numpay) {
    if (amount == 0 || !amount || amount == undefined) {
        return;
    }
    amount = parseFloat(amount);
    numpay = parseInt(numpay);
    rate = parseFloat(rate);
    $('#myTableBody').empty();
    rate = (rate / 100);
    var prima = $('#prima option:selected');
    var primaMount = parseFloat(amount) * (prima.val() / 100);
    primaMount = primaMount.toFixed(2);
    var primaMountInput = $('#primaMount');
    var seguro = $('input[name="seguro"]:checked').val()
    primaMountInput.val(primaMount)
    if (seguro == 1) {
        amount = amount - primaMount + (15 * numpay);
    }
    else {
        amount = amount - primaMount;

    }

    var numpay = numpay * 12;
    var monthly = rate / 12;
    var payment = ((amount * monthly) / (1 - Math.pow((1 + monthly), -numpay)));
    var total = payment * numpay;
    var interest = total - amount;

    var commasMen = fixVal(payment, 0, 2, ' ');
    var newCommasMen = commasMen.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    var commasTotal = fixVal(total, 0, 2, ' ');
    var newCommasTotal = commasTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    var commasInt = fixVal(interest, 0, 2, ' ');
    var newCommasInte = commasInt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    var commas = fixVal(amount, 0, 2, ' ');
    var newCommas = commas.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $('#myTableBody').append(`<tr><td> 0 </td><td >  </td> 
    <td > </td> 
    <td >   </td> 
    <td >$ ${amount.toFixed(2)}  </td></tr>`);
    var monto = $('#monto');
    var interesMensual = $('#interesMensual')
    var cuota = $('#cuota');

    monto.val(newCommasTotal);
    cuota.val(newCommasMen)
    interesMensual.val((fixVal(monthly, 0, 4, ' ') * 100).toFixed(2));



    newPrincipal = amount;

    var i = 1;
    while (i <= numpay) {
        newInterest = monthly * newPrincipal;
        reduction = payment - newInterest;
        newPrincipal = newPrincipal - reduction;

        var commas = fixVal(newPrincipal, 0, 2, ' ');
        var newCommas = commas.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        var commasInte = fixVal(newInterest, 0, 2, ' ');
        var newCommasInte = commasInte.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        var commasRed = fixVal(reduction, 0, 2, ' ');
        var newCommasRed = commasRed.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        var commasPay = fixVal(payment, 0, 2, ' ');
        var newCommasPay = commasPay.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        $('#myTableBody').append(`<tr><td> ${i} </td><td >$ ${newCommasPay} </td> 
				<td >$ ${newCommasInte} </td> 
				<td >$ ${newCommasRed}  </td> 
				<td >$ ${newCommas}  </td></tr>`);

        i++;
    }


}

$('#fecIni').change(function () {
    var meses = $('#meses').val();
    var fechaFin = new Date($(this).val())
    fechaFin.setMonth(fechaFin.getMonth() + parseInt(meses));
    var formattedDate = fechaFin.toISOString().substring(0, 10);

    $('#fecFin').val(formattedDate);
})