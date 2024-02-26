@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <h1><b>Administración de Cobros Únicos</b></h1>
    <hr>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Acciones a realizar</h2>
        </div>
        <div class="col-md-12 d-inline">
            <a class="btn btn-primary btn-rounded" href="{{ route('createBill') }}">Generar nuevo cobro</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Lista de cobros únicos</h2>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered text-center" id="tableCobros">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Concepto de Cobro</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Mora</th>
                        <th scope="col">Total</th>
                        <th scope="col">Restante</th>

                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cobrosUnicos as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->desc_pago }}</td>
                            <td>${{ number_format($item->monto, 2, '.', ',') }}</td>
                            <td>${{ number_format($item->mora, 2, '.', ',') }}</td>
                            <td>${{ number_format($item->total, 2, '.', ',') }}</td>
                            <td>${{ number_format($item->restante, 2, '.', ',') }}</td>
                            <td> {{ \Carbon\Carbon::parse($item->fecha_vencimiento)->format('d/m/Y') }}</td>
                            @switch($item->estado)
                                @case(1)
                                    <td>
                                        <p class="badge badge-warning">
                                            Pendiente
                                        </p>
                                    </td>
                                @break

                                @case(2)
                                    <td>
                                        <p class="badge badge-success">
                                            Pagado
                                        </p>
                                    </td>
                                @break

                                @case(3)
                                    <td>
                                        <p class="badge badge-danger">

                                            Vencido
                                        </p>
                                    </td>
                                @break
                            @endswitch

                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>

@stop
@section('css')


    <link href="css/addons/datatables2.min.css" rel="stylesheet">
@stop

@section('js')
    @include('sweetalert::alert')

    <script>
        $('#tableCobros').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
            },
        });
    </script>
@stop
