@extends('adminlte::page')

@section('title', 'Escala Corporation')


@section('content_header')
    <h1><b> Control de créditos</b></h1>
    <hr>
@stop
@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('addCredits') }}" class="btn btn-success" data-toggle="popover"
                data-content="Agrega nuevos créditos al sistema" data-trigger="hover"><i class="fas fa-coins"></i> Agregar
                nuevo crédito</a>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total de Créditos</span>
                    <h5 class="info-box-number">{{ $totalCreditos }}</h5>
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
        <div class="row">
            <div class="col-md-12 " id='div-clientes'>
                <table id="myTable" class="text-center table-striped table-bordered table-hover" class="display">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Crédito</th>
                            <th>Cliente</th>
                            <th>Casa</th>
                            <th>Monto Total</th>
                            <th>Saldo Restante</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Final</th>
                            <th>Interés anual</th>
                            <th>Prima</th>
                            <th>Seguro de deuda</th>

                        </tr>
                    </thead>
                    <tbody id="myTableBody">
                        @foreach ($creditos as $item)
                            <tr>

                                <td>{{ $item->id_credito }}</td>
                                <td>{{ $item->id_cliente }}</td>
                                <td>{{ $item->id_casa }}</td>
                                <td>{{ $item->monto_total }}</td>
                                <td>{{ $item->saldo_restante }}</td>
                                <td>{{ $item->fecha_inicio }}</td>
                                <td>{{ $item->fecha_fin }}</td>
                                <td>{{ $item->tasa_interes_anual }}</td>
                                <td>{{ $item->prima }}</td>
                                <th><b>
                                        @if ($item->seguro_deuda == 1)
                                            <span class="badge badge-success"> Activo</span>
                                        @else
                                            <span class="badge badge-danger"> Inactivo</span>
                                        @endif
                                    </b></th>
                                {{-- <td> 
                          <a href="#" onclick="infoClient({{ $item->id_cliente }})" class=" text-info"><i class="fas fa-eye" data-toggle="popover"  data-content="Información de usuario" data-trigger="hover"></i></a>
                          <a href="{{ route('editClient',['id'=>$item->id_cliente])  }}" class="ml-3 text-secondary" data-toggle="popover"  data-content="Editar usuario" data-trigger="hover"><i class="fas fa-edit"></i></a> 
                        
  
                          @if ($item->estado == 1)
                          <a onclick="stateClient({{ $item->id_cliente }},0)" class="ml-3 text-danger" data-toggle="popover"  data-content="Desactivar usuario" data-trigger="hover"><i class="fas fa-trash-alt"></i></a>
                          @else
                          <a onclick="stateClient({{ $item->id_cliente }},1)" class="ml-3 text-success" data-toggle="popover"  data-content="Activar usuario" data-trigger="hover"><i class="fas fa-user-check"></i></a>
                          @endif   
                      </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>





    </div>


@stop


@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">



@stop

@section('js')
    <script src="{{ asset('assets/js/credits/credits.js') }}"></script>
@stop
