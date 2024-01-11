

$('#btnSave').click(function (e) { 
    Swal.fire({
            title: "¿Está seguro de continuar?",
            text: "Presione 'Continuar' para registrar la nueva casa",
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

