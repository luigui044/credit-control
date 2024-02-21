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
                                ${{ number_format($credito->precio_casa, 2, '.', ',') }} USD
                            </td>
                            <td>
                                ${{ number_format($credito->prima, 2, '.', ',') }} USD
                            </td>
                            <td>
                                {{ $credito->id_prima }}
                            </td>
                            <td>
                                ${{ number_format($credito->saldo_restante, 2, '.', ',') }} USD
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($credito->fecha_inicio)->format('d/m/Y') }}
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
                                {{ \Carbon\Carbon::parse($credito->fecha_fin)->format('d/m/Y') }}
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
                            <th>Generar PDF</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($detaCredito as $item)
                            <tr>
                                <td>
                                    {{ $item->no_recibo }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y') }}
                                </td>

                                <td>
                                    ${{ number_format($item->monto, 2, '.', ',') }} USD
                                </td>
                                <td>
                                    ${{ number_format($item->monto_mora, 2, '.', ',') }} USD
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->fecha_cuota)->format('d/m/Y') }}
                                </td>
                                <td>
                                    <a target="blank" href="{{ route('generateRecipe', ['id' => $item->id_transaccion]) }}"
                                        class="btn btn-secondary"> <i class="fas fa-file-pdf"></i></a>
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
