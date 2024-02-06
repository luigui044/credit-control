@extends('adminlte::page')

@section('title', 'Escala Corporation')
@include('footer')
@section('content_header')
    <h1>RESUMEN DE CRÉDITOS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('components.box1', [
                'color' => 'bg-success',
                'icon' => 'far fa-flag',
                'title' => 'Valor total de casas',
                'number' => '$' . number_format($acumulado->total_valor_casas, 2, '.', ',') . ' USD',
            ])
        </div>
        <div class="col-md-3">
            @include('components.box1', [
                'color' => 'bg-warning',
                'icon' => 'far fa-flag',
                'title' => 'Valor total de primas pagadas',
                'number' => '$' . number_format($acumulado->total_primas, 2, '.', ',') . ' USD',
            ])
        </div>
        <div class="col-md-3">
            @include('components.box1', [
                'color' => 'bg-info',
                'icon' => 'far fa-flag',
                'title' => 'Sumatoria total de capital pendiente',
                'number' => '$' . number_format($acumulado->total_capital_restante, 2, '.', ',') . ' USD',
            ])
        </div>
        <div class="col-md-3">
            @include('components.box1', [
                'color' => 'bg-primary',
                'icon' => 'far fa-flag',
                'title' => 'Sumatoria total de capital pagado',
                'number' => '$' . number_format($acumulado->capital_pagado, 2, '.', ',') . ' USD',
            ])
        </div>
        <div class="col-md-4">
            <div id="podometro-recaudacion">

            </div>
        </div>
        <div class="col-md-4">
            <div id="clientes-pendientes">

            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        #podometro-recaudacion {
            width: 100%;
            height: 300px;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('assets/js/charts/podometro.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

@stop
