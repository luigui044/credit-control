
<table id="myTable" class="text-center table-striped table-bordered table-hover" class="display">
    <thead class="thead-light">
        <tr >
            <th>ID Acreedor</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="myTableBody" >
        @foreach ($clientes as $item)
        <tr>
            
            <td>{{ $item->id_cliente }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->telefono }}</td>
            <td>{{ $item->correo }}</td>
            <th><b>
            @if ( $item->estado == 1)
            <span class="badge badge-success">  Activo</span>
            @else
            <span class="badge badge-danger"> Inactivo</span>
            @endif    
            </b></th>
            <td> 
                <a href="#" onclick="infoClient({{ $item->id_cliente }})" class=" text-info"><i class="fas fa-eye" data-toggle="popover"  data-content="Información de usuario" data-trigger="hover"></i></a>
                <a href="#" class="ml-3 text-secondary" data-toggle="popover"  data-content="Editar usuario" data-trigger="hover"><i class="fas fa-edit"></i></a> 
                @if ( $item->estado == 1)
                        <a href="#" onclick="stateClient({{ $item->id_cliente }},0)" class="ml-3 text-danger" data-toggle="popover"  data-content="Desactivar usuario" data-trigger="hover"><i class="fas fa-trash-alt"></i></a>
                        @else
                        <a href="#" onclick="stateClient({{ $item->id_cliente }},1)" class="ml-3 text-success" data-toggle="popover"  data-content="Activar usuario" data-trigger="hover"><i class="fas fa-user-check"></i></a>
                        @endif   
            </td>
        </tr>
        @endforeach
       
    </tbody>
</table>