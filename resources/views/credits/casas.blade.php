@extends('adminlte::page')

@section('title', 'Escala Corporation')


@section('content_header')
    <h1><b>Listado de casas</b></h1>
    <hr>
@stop
@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('addHouse') }}" class="btn btn-success" data-toggle="popover"
                data-content="Agrega una nueva casa al sistema" data-trigger="hover"><i class="fas fa-clinic-medical"></i>
                Agregar nueva casa</a>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-city"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total de casas</span>
                    <h5 class="info-box-number">{{ $totalCasas }}</h5>
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
                            <th>ID Casa</th>
                            <th>Direccion</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Expediente</th>


                        </tr>
                    </thead>
                    <tbody id="myTableBody">
                        @foreach ($casas as $item)
                            <tr>

                                <td>{{ $item->id_casa }}</td>
                                <td>{{ $item->direccion }}</td>
                                <td>{{ $item->precio }}</td>
                                <td>{{ $item->descripcion }}</td>

                                <td>
                                    @if ($item->estado == 'Disponible')
                                        <span class="badge badge-success"> {{ $item->estado }}</span>
                                    @else
                                        <span class="badge badge-info"> {{ $item->estado }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('detailHouse', ['id' => $item->id_casa]) }}"
                                        class="btn btn-sm btn-success"><i class="far fa-folder-open"></i>
                                        Abrir</a>
                                </td>
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
    <script src="{{ asset('assets/js/credits/casas.js') }}"></script>
@stop
