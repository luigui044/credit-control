<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
    <style>
        /* Estilos CSS para el recibo */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .info {
            font-size: 16px;
            margin-bottom: 20px;
            text-align: left;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td,
        .table tr {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        #date-generated {
            text-align: right;
            font-size: 12px;
            /* Alinea el contenido del pie de página a la izquierda */
        }

        #saldo-pendiente {
            text-align: center;

        }

        .empresa {
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://escala.innovasv.net/assets/img/logoescala.png" alt="" width="100px">
            <div class="empresa">ESCALA CORPORATION, S. A. DE C.V. <br> email: miriam.cabrera@escalacorporation.com
                <br>
                teléfono: +503 7922-5179
            </div>
            <div class="title">Recibo de pago</div>
            <div class="info">
                <div><strong>Cliente:</strong> {{ $recibo->nombre }}</div>

                <div><strong>Crédito No.: </strong> {{ $credito->no_credito }} <strong> Cuota mensual:</strong>
                    ${{ number_format($credito->cuota_mensual, 2, '.', ',') }} </div>
                <div><strong>Fecha de pago:</strong> {{ \Carbon\Carbon::parse($recibo->fecha)->format('d/m/Y') }}</div>
                <div><strong>No. Comprobante:</strong> {{ $recibo->no_recibo }}</div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" colspan="4">Cuota Mensual</th>
                </tr>
                <tr class="text-center">
                    <th>Descripción</th>
                    <th>Monto Pagado</th>
                    <th>Mora</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="text-center">

                <tr class="text-center">
                    <td>Pago de cuota {{ \Carbon\Carbon::parse($recibo->fecha_cuota)->format('d/m/Y') }}</td>

                    <td> ${{ number_format($recibo->monto, 2, '.', ',') }}</td>
                    <td>${{ number_format($recibo->monto_mora, 2, '.', ',') }}</td>
                    <td>${{ number_format($recibo->monto - $recibo->monto_mora, 2, '.', ',') }}</td>
                </tr>

                @if ($recibo->monto_seguro && $recibo->monto_seguro > 0)
                    <tr>
                        <td>Pago de seguro de deuda </td>
                        <td>${{ number_format($recibo->monto_seguro, 2, '.', ',') }}</td>
                        <td>$0.00</td>
                        <td>${{ number_format($recibo->monto_seguro, 2, '.', ',') }}</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">

                        <h3 style="text-align: center"><b>Total pagado:</b>
                            ${{ number_format($recibo->monto_seguro + $recibo->monto, 2, '.', ',') }}
                        </h3>

                    </td>
                </tr>
                <tr>


                    <td colspan="4">

                        <h3 id="saldo-pendiente"><b>Saldo pendiente de cuota:</b>
                            @if ($saldoPendiente < 1)
                                $0.00
                            @else
                                $ {{ number_format($saldoPendiente, 2, '.', ',') }}
                            @endif
                        </h3>

                    </td>
                </tr>
            </tfoot>

        </table>


        @if (count($cobroUnico) > 0)
            <table class="table text-center">

                <head class="text-center">
                    <tr>
                        <th class="" colspan="5">Pagos Únicos</th>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <th>Cargo total</th>
                        <th>Monto abonado</th>
                        <th>Mora</th>
                        <th>Saldo restante</th>
                    </tr>
                </head>
                <tbody class="text-center">
                    @foreach ($cobroUnico as $item)
                        <tr>
                            <td>
                                {{ $item->desc_pago }} vencimiento:
                                {{ \Carbon\Carbon::parse($item->fecha_cuota)->format('d/m/Y') }}
                            </td>
                            <td> ${{ number_format($item->total_cobro, 2, '.', ',') }}</td>

                            <td> ${{ number_format($item->monto, 2, '.', ',') }}</td>
                            <td>${{ number_format($item->mora, 2, '.', ',') }}</td>
                            <th>${{ number_format($item->restante, 2, '.', ',') }}</th>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif

    </div>
    <footer>
        <p id="date-generated">Recibo generado: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</p>

    </footer>
</body>

</html>
