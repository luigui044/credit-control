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
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>Mora</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Pago de cuota {{ \Carbon\Carbon::parse($recibo->fecha_cuota)->format('d/m/Y') }}</td>

                    <td> ${{ number_format($recibo->monto, 2, '.', ',') }}</td>
                    <td>${{ number_format($recibo->monto_mora, 2, '.', ',') }}</td>
                    <td>${{ number_format($recibo->monto + $recibo->monto_mora, 2, '.', ',') }}</td>
                </tr>


            </tbody>


        </table>

        @if (count($cobroUnico) > 0)
            <table class="table">

                <head>
                    <tr>
                        <th class="text-center" colspan="4">Pagos Únicos</th>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <th>Monto</th>
                        <th>Mora</th>
                        <th>Total</th>
                    </tr>
                </head>
                <tbody>
                    @foreach ($cobroUnico as $item)
                        <tr>
                            <td>
                                {{ $item->desc_pago }} vencimiento:
                                {{ \Carbon\Carbon::parse($item->fecha_vencimiento)->format('d/m/Y') }}
                            </td>

                            <td> ${{ number_format($item->restante - $item->mora, 2, '.', ',') }}</td>
                            <td>${{ number_format($item->mora, 2, '.', ',') }}</td>
                            <td>${{ number_format($item->restante, 2, '.', ',') }}</td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif

    </div>
    <footer>
        {{-- <h3 id="saldo-pendiente"><b>Saldo Pendiente:</b>
            @if ($saldoPendiente < 1)
                $0.00
            @else
                $ {{ number_format($saldoPendiente, 2, '.', ',') }}
            @endif
        </h3>
        <br> --}}
        <p id="date-generated">Recibo generado: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</p>
    </footer>
</body>

</html>
