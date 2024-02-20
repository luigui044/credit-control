@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('getCredits') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="col-md-11">
            <h1><b> Registro de nuevo crédito</b></h1>
        </div>
    </div>


    <hr>
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
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alerta">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="form1" action="{{ route('saveCredit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente">Acreedor</label>
                                    <select class="form-control campo-requerido" id="cliente" name="cliente" required>
                                        <option>Seleccione un cliente</option>
                                        @foreach ($clientes as $item)
                                            <option value="{{ $item->id_cliente }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente')
                                        <span class="alert text-danger alerta">El Campo de acreedor es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="casa">Casa</label>
                                    <select class="form-control campo-requerido" id="casa" name="casa" required>
                                        <option>Seleccione una casa</option>
                                        @foreach ($casas as $item)
                                            <option value="{{ $item->id_casa }}">{{ $item->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @error('casa')
                                        <span class="alert text-danger alerta">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="div-precio-casa">
                                    <label for="price">Valor de casa($)</label>
                                    <input type="text" class="form-control campo-requerido" id="price" name="price"
                                        placeholder="Valor de casa" readonly>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="interes">Interés anual(%)</label>
                                    <input type="text" class="form-control campo-requerido recCredit" id="interes"
                                        name="interes" placeholder="Tasa de interés" required value="8.5">
                                    @error('interes')
                                        <span class="alert text-danger alerta ">El porcentaje de interés anual es
                                            requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="years">Cantidad de años</label>
                                    <input type="text" class="form-control campo-requerido recCredit" id="years"
                                        name="years" placeholder="Tasa de interés" required value="5">
                                    @error('interes')
                                        <span class="alert text-danger alerta">La cantidad de años del crédito es
                                            requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="years">Prima(%)</label>
                                    <select class="form-control campo-requerido recCredit" id="prima" name="prima"
                                        required>


                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                        <option value="30">30%</option>
                                    </select>
                                    @error('prima1')
                                        <span class="alert text-danger alerta">El porcentaje de prima es
                                            requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="primaMount">Monto de prima($)</label>
                                    <input type="text" class="form-control campo-requerido" id="primaMount"
                                        name="primaMount" placeholder="Monto de prima" readonly required>
                                    @error('primaMount')
                                        <span class="alert text-danger alerta">El monto de prima es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="monto">Total de crédito($)</label>
                                    <input type="text" class="form-control campo-requerido" id="monto" name="monto"
                                        placeholder="Monto del crédito" readonly required>
                                    @error('monto')
                                        <span class="alert text-danger alerta">El Campo de monto del crédito es requerido</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="interes">Interés mensual(%)</label>
                                    <input type="text" class="form-control campo-requerido" id="interesMensual"
                                        name="interesMensual" placeholder="Tasa de interés mensual" readonly>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="interes">Cuota mensual($)</label>
                                    <input type="text" class="form-control campo-requerido" id="cuota"
                                        name="cuota" placeholder="cuota" readonly>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="interes">Cantidad de meses</label>
                                    <input type="text" class="form-control campo-requerido" id="meses"
                                        name="meses" placeholder="Cantidad de meses" readonly>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecIni">Fecha de inicio</label>
                                    <input type="date" class="form-control campo-requerido" id="fecIni"
                                        name="fecIni" placeholder="Fecha de inicio" required>
                                    @error('fecIni')
                                        <span class="alert text-danger alerta">La fecha de incio es requerida</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecFin">Fecha de finalización</label>
                                    <input type="date" class="form-control campo-requerido" id="fecFin"
                                        name="fecFin" placeholder="Fecha de inicio" readonly required>
                                    @error('fecFin')
                                        <span class="alert text-danger alerta">La fecha de finalización es requerida</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="interes">Seguro de deuda</label>
                                    <div class="form-check form-check-inline recCredit">
                                        <input class="form-check-input" type="radio" required id="seguro"
                                            name="seguro" value="1">
                                        <label class="form-check-label" for="seguro1">Incluir</label>
                                    </div>
                                    <div class="form-check form-check-inline recCredit">
                                        <input class="form-check-input" type="radio" checked id="seguro0"
                                            name="seguro" value="0">
                                        <label class="form-check-label" for="seguro0">No incluir</label>
                                    </div>
                                    @error('interes')
                                        <span class="alert text-danger alerta">Debe seleccionar una opción para el
                                            seguro</span>
                                    @enderror
                                </div>
                            </div>


                        </div>




                        <button type="button" id="btnSave" class="btn btn-primary btn-block">Registrar</button>
                    </form>
                </div>
                <!-- /.card-body -->
                {{-- <div class="card-footer">
              The footer of the card
            </div> --}}
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->


        </div>
        <div class="col-md-5">

            <div class="card card-primary">
                <div class="card-header">

                    <h3 class="card-title">Tabla de cálculo de cuotas</h3>
                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-sm text-center table-striped table-bordered table-hover"
                        class="display">
                        <thead class="thead-light">
                            <tr>
                                <th>Cuota</th>
                                <th>Valor</th>
                                <th>Interés</th>
                                <th>Capital</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody id="myTableBody">


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        textarea {
            resize: none;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('js')
    @include('sweetalert::alert')

    <script src="{{ asset('assets/js/credits/addCredits.js') }}"></script>
@stop
