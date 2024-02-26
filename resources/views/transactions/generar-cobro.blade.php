@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <h1><b>Generar de Cobro Único</b></h1>
    <hr>
@stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header bg-primary">Crear nuevo cobro</h5>
                <div class="card-body">
                    <form action="{{ route('saveBill') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control" id="cliente" name="cliente">
                                        <option>Seleccione un cliente</option>
                                        @foreach ($clientes as $item)
                                            <option value="{{ $item->id_cliente }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="credito-div">
                                    <label for="credito">Crédito</label>
                                    <select class="form-control" id="credito" name="credito" disabled>
                                        <option>Seleccione un Crédito</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concepto">Concepto de cobro</label>
                                    <input type="text" class="form-control" id="concepto" name="concepto">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="recibo">No. Recibo</label>
                                    <input type="text" class="form-control campo-requerido" id="recibo" name="recibo"
                                        placeholder="No. Recibo">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fechaVencimiento">Fecha de vencimiento</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="monto">Monto</label>
                                    <input type="text" class="form-control valores" id="monto" name="monto"
                                        placeholder="0.00">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mora">Mora aplicada</label>
                                    <input type="text" class="form-control valores" id="mora" name="mora"
                                        placeholder="0.00">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" name="total"
                                        placeholder="0.00" readonly>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">Estado de cobro</label>
                                    <select class="form-control" id="estado" name="estado" required>
                                        <option>Seleccione un estado</option>
                                        <option value="1">Pendiente</option>
                                        <option value="2">Pagado</option>
                                        <option value="3">Vencido</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Generar Cobro</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

@stop

@section('js')
    <script src="{{ asset('assets/js/payments/payment.js') }}"></script>



@stop
