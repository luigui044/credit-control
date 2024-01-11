@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <h1><b> Administración de clientes</b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('addClient') }}" class="btn btn-success" data-toggle="popover"
                data-content="Agrega nuevos clientes al sistema" data-trigger="hover"><i class="fas fa-user-plus"> </i> Agregar
                nuevo cliente</a>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Clientes registrados</span>
                    <h5 class="info-box-number">{{ $total }}</h5>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Clientes de activos</span>
              <h5 class="info-box-number">410</h5>
            </div>
          </div>
    </div> --}}
    </div>
    <div class="row">
        <div class="col-md-12 " id='div-clientes'>
            <table id="myTable" class="text-center table-striped table-bordered table-hover" class="display">
                <thead class="thead-light">
                    <tr>
                        <th>ID Acreedor</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="myTableBody">
                    @foreach ($clientes as $item)
                        <tr>

                            <td>{{ $item->id_cliente }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>{{ $item->correo }}</td>
                            <th><b>

                                    @switch($item->estado)
                                        @case(1)
                                            <span class="badge badge-success"> Activo</span>
                                        @break

                                        @case(2)
                                            <span class="badge badge-danger"> Inactivo</span>
                                        @break

                                        @case(3)
                                            <span class="badge badge-warning">Pendiente de pago</span>
                                        @break

                                        @case(4)
                                            <span class="badge badge-info"> Con crédito</span>
                                        @break
                                    @endswitch

                                </b></th>
                            <td>
                                <a href="#" onclick="infoClient({{ $item->id_cliente }})" class=" text-info"><i
                                        class="fas fa-eye" data-toggle="popover" data-content="Información de usuario"
                                        data-trigger="hover"></i></a>
                                <a href="{{ route('editClient', ['id' => $item->id_cliente]) }}" class="ml-3 text-secondary"
                                    data-toggle="popover" data-content="Editar usuario" data-trigger="hover"><i
                                        class="fas fa-edit"></i></a>


                                @if ($item->estado == 1 || $item->estado == 3 || $item->estado == 4)
                                    <a onclick="stateClient({{ $item->id_cliente }},2)" class="ml-3 text-danger"
                                        data-toggle="popover" data-content="Desactivar usuario" data-trigger="hover"><i
                                            class="fas fa-trash-alt"></i></a>
                                @else
                                    <a onclick="stateClient({{ $item->id_cliente }},1)" class="ml-3 text-success"
                                        data-toggle="popover" data-content="Activar usuario" data-trigger="hover"><i
                                            class="fas fa-user-check"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="infoClientModal" tabindex="-1" aria-labelledby="infoClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoClientModalLabel">INFORMACIÓN DE CLIENTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="infoclientModalBody">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        thead th {
            text-align: center !important;
        }
    </style>


@stop

@section('js')
    <script src="{{ asset('assets/js/credits/clients.js') }}"></script>
@stop
