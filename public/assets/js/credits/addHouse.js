

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
$('#depto').change(function () {
    let depto = $('#depto option:selected').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post("/filter-muni", { depto: depto })
        .done(function (e) {
            $("#div-munis").html(e);
        })
        .fail(function (e) {
            alert(e);
        })
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

document.getElementById('antes').addEventListener('change', function (event) {
    var fileList = event.target.files;
    var thumbnailsContainer = document.getElementById('antes1');
    thumbnailsContainer.innerHTML = ''; // Limpiar contenedor

    if (fileList.length) {
        for (var i = 0; i < fileList.length; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px'; // Ajustar el tamaño máximo de la miniatura
                img.style.maxHeight = '100px'; // Ajustar el tamaño máximo de la miniatura
                img.style.marginRight = '10px'; // Aplicar margen derecho
                img.style.marginBottom = '10px';
                thumbnailsContainer.appendChild(img);
            };
            reader.readAsDataURL(fileList[i]);
        }
    } else {
        thumbnailsContainer.textContent = 'No se han seleccionado archivos de imagen.';
    }
});

document.getElementById('despues').addEventListener('change', function (event) {
    var fileList = event.target.files;
    var thumbnailsContainer = document.getElementById('despues2');
    thumbnailsContainer.innerHTML = ''; // Limpiar contenedor

    if (fileList.length) {
        for (var i = 0; i < fileList.length; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px'; // Ajustar el tamaño máximo de la miniatura
                img.style.maxHeight = '100px'; // Ajustar el tamaño máximo de la miniatura
                img.style.marginRight = '10px'; // Aplicar margen derecho
                img.style.marginBottom = '10px';
                thumbnailsContainer.appendChild(img);
            };
            reader.readAsDataURL(fileList[i]);
        }
    } else {
        thumbnailsContainer.textContent = 'No se han seleccionado archivos de imagen.';
    }
});