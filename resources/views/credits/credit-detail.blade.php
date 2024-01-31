@extends('adminlte::page')
@section('content_header')
    <a href="" class="btn btn-info"> <i class="fas fa-print"></i></a>
    <a href="{{ route('generatePDF', ['id' => $credito->id]) }}" class="btn btn-secondary"> <i class="fas fa-file-pdf"></i></a>
@stop
@section('content')
    <div id="pdf-report">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h1><u>Información de Crédito</u></h1>
                <table class="table table-bordered table-striped mt-1">
                    <thead>
                        <tr>
                            <th>ID Crédito</th>
                            <th>Cliente</th>
                            <th>Precio de propiedad</th>
                            <th>Prima</th>
                            <th>ID Prima</th>
                            <th>Saldo restante</th>
                            <th>Fecha de inicio</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $credito->no_credito }}
                            </td>
                            <td>
                                {{ $credito->nombre }}
                            </td>

                            <td>
                                ${{ $credito->precio_casa }}
                            </td>
                            <td>
                                ${{ $credito->prima }}
                            </td>
                            <td>
                                000000000
                            </td>
                            <td>
                                ${{ $credito->saldo_restante }}
                            </td>
                            <td>
                                {{ $credito->fecha_inicio }}
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Edad</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Fecha de Final</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $credito->edad }}
                            </td>
                            <td>
                                {{ $credito->telefono }}
                            </td>

                            <td>
                                {{ $credito->correo }}
                            </td>
                            <td>
                                {{ $credito->direccion }}
                            </td>
                            <td>
                                {{ $credito->departamento }}
                            </td>
                            <td>
                                {{ $credito->municipio }}
                            </td>
                            <td>
                                {{ $credito->fecha_fin }}
                            </td>


                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-7">
                <h1><u>Detalle de Cuotas</u></h1>

                <table class="table table-bordered table-striped mt-1">
                    <thead>
                        <tr>
                            <th>ID Recibo</th>
                            <th>Fecha Recibo</th>
                            <th>Monto</th>
                            <th>Mora</th>
                            <th>Fecha de Cuota</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($detaCredito as $item)
                            <tr>
                                <td>
                                    {{ $item->no_recibo }}
                                </td>
                                <td>
                                    {{ $item->fecha }}
                                </td>

                                <td>
                                    {{ $item->monto }}
                                </td>
                                <td>
                                    {{ $item->monto_mora }}
                                </td>
                                <td>
                                    {{ $item->fecha_cuota }}
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
        </div>





    </div>


    <br>

    {{-- {{ var_dump($detaCredito) }} --}}
@endsection
@section('css')

@endsection

@section('js')




@endsection