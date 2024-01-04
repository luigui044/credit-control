
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


function stateClient(id,newState) {
        if(newState === 0)
        {
            var ask = "¿Está seguro en desactivar al cliente?";
            var text=  "Presione 'Continuar' para desactivar al cliente";
            var icon = 'error';
        }
        else {
            var ask = "¿Está seguro de activar al cliente?";
            var text=  "Presione 'Continuar' para activar al cliente";
            var icon = 'warning';
        }


        Swal.fire({
            title: ask,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Continuar"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
            
                $.ajax({
                    url: '/desactivar-cliente/'+id+'/'+newState,
                    type: 'PUT',
                
                    success: function(e) {
                        $("#div-clientes").html(e);
                        $('#myTable').DataTable().draw()
                        // $('#myTable').DataTable({
                        //     language: {
                        //         url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                        //     },
                        // });
                        $('[data-toggle="popover"] ').popover()
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr)
                        console.log(error)
                    }
                });
            }
    });

 
}

function infoClient(id) {
    let modal = $('#infoClientModal');
    let modalBody = $('#infoclientModalBody');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        url: '/consultar-cliente/'+id,
        type: 'GET',
    
        success: function(e) {
            modalBody.html(e);
            modal.modal('toggle');
        },
        error: function(xhr, status, error) {
            console.log(xhr)
            console.log(error)
        }
    });


    
}