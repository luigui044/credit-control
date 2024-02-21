@extends('adminlte::page')

@section('title', 'Escala Corporation')


@section('content_header')
    <h1><b> Control de créditos</b></h1>
    <hr>
@stop
@section('content')
    <div class="row">
        <div class="col-md-5">
            <a href="{{ route('addCredits') }}" class="btn btn-lg btn-success" data-toggle="popover"
                data-content="Agrega nuevos créditos al sistema" data-trigger="hover"><i class="fas fa-coins"></i> Agregar
                nuevo crédito</a>
            <a href="{{ route('generateRecipe', ['id' => 0]) }}" id="descargar-zip" class="btn btn-lg btn-secondary"
                data-toggle="popover" data-content="Agrega nuevos créditos al sistema" data-trigger="hover"><i
                    class="fas fa-file-pdf"></i>
                Generar
                Recibos de útimo pago</a>
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

        <div class="row">
            <div class="col-md-12 " id='div-clientes'>
                <table id="myTable" class="text-center table-striped table-bordered table-hover" class="display">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Crédito</th>
                            <th>Cliente</th>

                            <th>Tiempo</th>
                            <th>Monto Total</th>
                            <th>Capital Restante</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Final</th>
                            <th>Interés anual</th>
                            <th>Prima</th>
                            <th>Cuota mensual</th>
                            <th>Seguro</th>
                            <th> Acciones</th>

                        </tr>
                    </thead>
                    <tbody id="myTableBody">
                        @foreach ($creditos as $item)
                            <tr>

                                <td>{{ $item->no_credito }}</td>
                                <td>{{ $item->nombre }}</td>

                                <td>{{ $item->tiempo_total }} años</td>
                                <td> ${{ number_format($item->precio_casa, 2, '.', ',') }} </td>
                                <td>${{ number_format($item->saldo_restante, 2, '.', ',') }} </td>
                                <td> {{ \Carbon\Carbon::parse($item->fecha_inicio)->format('d/m/Y') }}</td>
                                <td> {{ \Carbon\Carbon::parse($item->fecha_fin)->format('d/m/Y') }}</td>
                                <td>{{ $item->tasa_interes_anual }} %</td>
                                <td> ${{ number_format($item->prima, 2, '.', ',') }} </td>
                                <td>${{ number_format($item->cuota_mensual, 2, '.', ',') }} </td>
                                <td><b>
                                        @if ($item->seguro_deuda == 1)
                                            <span class="badge badge-success"> SI</span>
                                        @else
                                            <span class="badge badge-danger"> No</span>
                                        @endif
                                    </b>
                                </td>
                                <td>
                                    <a target="blank" href="{{ route('reportCredit', ['id' => $item->id_credito]) }}"
                                        class=" text-info"><i class="fas fa-eye" data-toggle="popover"
                                            data-content="Informe de Crédito" data-trigger="hover"></i></a>
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
    @include('sweetalert::alert')

    <script src="{{ asset('assets/js/credits/credits.js') }}"></script>



@stop
