@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <h1><b>Detalle de casa</b></h1>
    <hr>
@stop
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-sm table-striped table-bordered text-center">
                <thead class="bg-dark">
                    <tr>
                        <th>
                            Block
                        </th>
                        <th>
                            Número
                        </th>
                        <th>
                            Pasaje
                        </th>
                        <th>
                            Precio
                        </th>
                        <th>
                            Monto Invertido
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $casa->block }}
                        </td>
                        <td>
                            {{ $casa->numero }}
                        </td>
                        <td>
                            {{ $casa->pasaje }}
                        </td>
                        <td>
                            ${{ number_format($casa->precio, 2, '.', ',') }}
                        </td>
                        <td>
                            ${{ number_format($casa->monto, 2, '.', ',') }}
                        </td>
                        </td>
                    </tr>

                </tbody>
                <thead class="bg-dark">
                    <tr>
                        <th>Dirección</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $casa->direccion }}
                        </td>
                        <td>
                            {{ $casa->id_depto }}
                        </td>
                        <td>
                            {{ $casa->id_muni }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2>ANTES</h2>
            <div class="row">
                @foreach ($imagenesCasa as $item)
                    @if ($item->tipo == 1)
                        <div class="col-md-3"> <img src="{{ asset('images/' . $item->img_url) }}"
                                alt="imagen_antes_{{ $item->img_url }}" width="200px"></div>
                    @endif
                @endforeach
            </div>

        </div>
        <div class="col-md-6">
            <h2>DESPUÉS</h2>
            <div class="row">
                @foreach ($imagenesCasa as $item)
                    @if ($item->tipo == 2)
                        <div class="col-md-3"> <img src="{{ asset('images/' . $item->img_url) }}"
                                alt="imagen_antes_{{ $item->img_url }}" width="200px"></div>
                    @endif
                @endforeach
            </div>

        </div>

    </div>
@stop
@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">



@stop

@section('js')

@stop
