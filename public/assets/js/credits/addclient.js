$(document).ready(function () {
    setTimeout(() => {
            $('.alerta').fadeOut();          
        }, 3000);
    $('#phone').mask('00000000');
    $('#age').mask('00');
    $('#dui').mask('00000000-0');
} );

$('#depto').change(function(){
    let depto =$('#depto option:selected').val();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post( "/filter-muni",{depto:depto})
            .done(function(e) {
               $("#div-munis").html(e);
            })
            .fail(function(e) {
                alert( e );
            })
});

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



$('#form1').submit(function(e) {
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

    if (!validarTelefono()) {
        return false;
    }

    if (!validarDUI()) {
        return false;
    }

    return true;
}


function validarCamposRequeridos() {
    var formIsValid = true;

    $('.campo-requerido').each(function() {
        if ($(this).val() === '') {
            formIsValid = false;
            return false; // Sale del bucle si encuentra un campo vacío
        }
    });

    return formIsValid;
}

function validarTelefono() {
    var telefono = $('#phone').val();
    var regexTelefono = /^\d{8}$/;

    if (!regexTelefono.test(telefono)) {
        alert('El formato del número de teléfono debe ser 00000000');
        $('#phone').css('border-color', 'red');
        return false;
    }

    return true;
}

function validarDUI() {
    var dui = $('#dui').val();
    var regexDUI = /^\d{8}-\d{1}$/;

    if (!regexDUI.test(dui)) {
        alert('El formato del DUI debe ser 00000000-0');
        $('#dui').css('border-color', 'red');
        return false;
    }

    return true;
}