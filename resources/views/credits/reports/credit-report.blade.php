<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        #table-cabecera {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div id="pdf-report">
        <div class="row justify-content-center text-center mt-2">
            <div class="col-md-8">
                <img src="{{ public_path('assets/img/logoescala.png') }}" alt="" width="100px">
                <h1><b>Balance de Crédito No.{{ $credito->no_credito }}</b></h1>
                <table id="table-cabecera" class="table table-sm table-bordered table-striped mt-1 ">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Crédito</th>
                            <th>Cliente</th>
                            <th>Precio de propiedad</th>
                            <th>Prima</th>
                            <th>ID Prima</th>

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
                                000000000
                            </td>


                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th>Edad</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Departamento</th>


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



                        </tr>
                    </tbody>

                    <thead class="thead-dark">
                        <tr>
                            <th>Municipio</th>
                            <th>Fecha de inicio</th>

                            <th>Fecha de Final</th>
                            <th>Saldo restante</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $credito->municipio }}
                            </td>


                            <td>
                                {{ \Carbon\Carbon::parse($credito->fecha_fin)->toDateString() }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($credito->fecha_inicio)->toDateString() }}
                            </td>
                            <td>
                                ${{ number_format($credito->saldo_restante, 2, '.', ',') }} USD
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-7">
                <h1><u>Detalle de Cuotas</u></h1>

                <table class="table table-sm table-bordered table-striped mt-1 text-center">
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
                                    {{ \Carbon\Carbon::parse($item->fecha)->toDateString() }}
                                </td>

                                <td>
                                    ${{ number_format($item->monto, 2, '.', ',') }} USD
                                </td>
                                <td>
                                    ${{ number_format($item->monto_mora, 2, '.', ',') }} USD
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->fecha_cuota)->toDateString() }}
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
