@extends('adminlte::page')

@section('title', 'Escala Corporation')
@include('footer')
@section('content_header')
    <h1>RESUMEN DE CRÉDITOS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div id="podometro-recaudacion">

            </div>
        </div>
        <div class="col-md-4">
            <div id="clientes-pendientes">

            </div>
        </div>
        <div class="col-md-4 padre ">
            <div class="small-box bg-gradient-success hijo">
                <div class="inner">
                    <h3>$ {{ number_format($totalTransacciones->monto - $acumulado->capital_pagado, 2, '.', ',') }} USD
                    </h3>
                    <h4><b> Interes Recaudado </b></h4>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a> --}}
            </div>


        </div>
        <div class="col-md-3">
            @include('components.box1', [
                'color' => 'bg-success',
                'icon' => 'far fa-flag',
                'title' => 'Valor total de casas',
                'number' => '$' . number_format($acumulado->total_valor_casas, 2, '.', ',') . ' USD',
            ])
            @include('components.box1', [
                'color' => 'bg-warning',
                'icon' => 'far fa-flag',
                'title' => 'Valor total de primas pagadas',
                'number' => '$' . number_format($acumulado->total_primas, 2, '.', ',') . ' USD',
            ])
        </div>

        <div class="col-md-3">
            @include('components.box1', [
                'color' => 'bg-secondary',
                'icon' => 'far fa-flag',
                'title' => 'Sumatoria total de capital pendiente',
                'number' => '$' . number_format($acumulado->total_capital_restante, 2, '.', ',') . ' USD',
            ])
            @include('components.box1', [
                'color' => 'bg-primary',
                'icon' => 'far fa-flag',
                'title' => 'Sumatoria total de capital pagado',
                'number' => '$' . number_format($acumulado->capital_pagado, 2, '.', ',') . ' USD',
            ])
        </div>



        <div class="col-md-6">
            <h3><b>Clientes con pagos pendiente</b></h3>
            <table id="myTable" class="  table text-center table-striped table-bordered table-hover" class="display">
                <thead class="bg-info">
                    <tr>
                        <th>Cliente</th>
                        <th>No. Credito</th>
                        <th>Cuotas pendiente</th>

                    </tr>
                </thead>
                <tbody id="myTableBody">
                    @foreach ($clientesMora as $item)
                        <tr>

                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->no_credito }}</td>
                            <td>{{ $item->cuotas_pendiente }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div id="treemap">

            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        #podometro-recaudacion,
        #clientes-pendientes {
            width: 100%;
            height: 300px;
        }

        #treemap {
            width: 100%;
            height: 500px;
        }

        .padre {
            display: flex;
            align-items: center;
        }

        .hijo {
            width: 100%;
        }

        html,
        body {
            margin: 0px !important;
            height: 106% !important;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="{{ asset('assets/js/charts/treemap.js') }}"></script>

    <script src="{{ asset('assets/js/charts/podometro.js') }}"></script>
    <script src="{{ asset('assets/js/charts/donut.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

@stop
