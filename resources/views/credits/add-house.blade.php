@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('getHouses') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="col-md-11">
            <h1><b> Registro de Casas</b></h1>
        </div>
    </div>


    <hr>
@stop

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">

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

                    <form id="form1" action="{{ route('saveHouse') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="block">Block</label>
                                    <input type="text" class="form-control campo-requerido" id="block" name="block"
                                        placeholder="Block">
                                    @error('block')
                                        <span class="alert text-danger alerta">Ingrese el block de la casa</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="casa">Número de casa</label>
                                    <input type="text" class="form-control campo-requerido" id="casa" name="casa"
                                        placeholder="Número de casa">
                                    @error('casa')
                                        <span class="alert text-danger alerta">Ingrese el número de la casa</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="pasaje">Pasaje</label>
                                    <input type="text" class="form-control campo-requerido" id="pasaje" name="pasaje"
                                        placeholder="Pasaje">
                                    @error('pasaje')
                                        <span class="alert text-danger alerta">Ingrese el Pasaje de la casa</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="price">Precio($)</label>
                                    <input type="text" class="form-control campo-requerido" id="price" name="price"
                                        placeholder="Precio de casa" required>
                                    @error('price')
                                        <span class="alert text-danger alerta">Ingrese el precio de la casa</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="monto">Monto invertido($)</label>
                                    <input type="text" class="form-control campo-requerido" id="monto" name="monto"
                                        placeholder="Monto invertido" required>
                                    @error('monto')
                                        <span class="alert text-danger alerta">Ingrese el monto invertido de la casa</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="depto">Departamento</label>

                                    <select class="form-control campo-requerido" id="depto" name="depto" required>
                                        <option>Seleccione un departamento</option>
                                        @foreach ($deptos as $item)
                                            <option value="{{ $item->id }}">{{ $item->departamento }}</option>
                                        @endforeach
                                    </select>
                                    @error('depto')
                                        <span class="alert text-danger alerta">El campo departamento es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="div-munis">
                                    <label for="muni">Municipio</label>

                                    <select class="form-control campo-requerido" id="muni" name="muni" disabled
                                        required>
                                        <option>Seleccione un municipio</option>

                                    </select>
                                    @error('muni')
                                        <span class="alert text-danger alerta">El campo municipio es requerido</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <textarea class="form-control campo-requerido" id="address" name="address" rows="3" required></textarea>
                                    @error('address')
                                        <span class="alert text-danger alerta">Ingrese la dirección de la casa</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="antes">Fotos antes de remodelación</label>
                                <input type="file" class="" id="antes" name="antes[]" accept="image/*"
                                    multiple>
                                @error('antes')
                                    <span class="alert text-danger alerta">Ingrese error en el antes</span>
                                @enderror

                                <div id="antes1" style="margin-top: 10px;"></div>
                            </div>

                            <div class="col-md-4">
                                <label for="antes">Fotos después de remodelación</label>
                                <input type="file" class="" id="despues" name="despues[]" accept="image/*"
                                    multiple>
                                @error('despues')
                                    <span class="alert text-danger alerta">Ingrese error en el despues</span>
                                @enderror


                                <div id="despues2" style="margin-top: 10px;"></div>
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

    <script src="{{ asset('assets/js/credits/addHouse.js') }}"></script>
    <script></script>
@stop
