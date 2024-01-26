@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <h1>Registro de pagos de créditos</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card card-primary">
                <div class="card-header">

                    <h3 class="card-title">Completa los datos</h3>
                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger alerta">
                            Ingrese todos los campos correctamente
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alerta">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="form1" action="{{ route('savePayment') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control campo-requerido" id="cliente" name="cliente" required>
                                        <option>Seleccione un cliente</option>
                                        @foreach ($clientes as $item)
                                            <option value="{{ $item->id_cliente }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente')
                                        <span class="alert text-danger alerta">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="credito-div">
                                    <label for="credito">Crédito</label>
                                    <select class="form-control campo-requerido" id="credito" name="credito" disabled
                                        required>
                                        <option>Seleccione el Crédito</option>
                                        {{-- @foreach ($clientes as $item)
                                            <option value="{{ $item->id_cliente }}">{{ $item->nombre }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('credito')
                                        <span class="alert text-danger alerta">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recibo">ID Recibo</label>
                                    <input type="text" class="form-control campo-requerido" id="recibo" name="recibo"
                                        placeholder="ID Recibo" required>
                                    @error('recibo')
                                        <span class="alert text-danger alerta">El Campo de recibo es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group " id="div-cuota">
                                    <label for="monto">Monto a pagar($)</label>
                                    <input type="text" class="form-control campo-requerido" id="monto" name="monto"
                                        placeholder="Monto a pagar" required>
                                    @error('monto')
                                        <span class="alert text-danger alerta">El Campo de monto es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group " id="div-cuota">
                                    <label for="fecha">Fecha de pago</label>
                                    <input type="date" class="form-control campo-requerido" id="fecha" name="fecha"
                                        placeholder="Monto a pagar" required>
                                    @error('fecha')
                                        <span class="alert text-danger alerta">El Campo de fecha es requerido</span>
                                    @enderror
                                </div>
                            </div>






                            <button type="submit" id="btnSave" class="btn btn-primary btn-block">Registrar</button>
                    </form>
                </div>

            </div>
            <!-- /.card -->


        </div>
    </div>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('js')
    @include('sweetalert::alert')
    <script src="{{ asset('assets/js/payments/payment.js') }}"></script>
@stop
