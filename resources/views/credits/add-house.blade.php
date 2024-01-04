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
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alerta">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="form1" action="{{ route('saveHouse') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="desc">Descripcion de casa</label>
                                    <textarea class="form-control campo-requerido" id="desc" name="desc" rows="3" required></textarea>
                                    @error('desc')
                                        <span class="alert text-danger alerta">Ingrese la descripción de la casa</span>
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
                                <div class="form-group">
                                    <label for="price">Precio($)</label>
                                    <input type="text" class="form-control campo-requerido" id="price" name="price"
                                        placeholder="Precio de casa" required>
                                    @error('price')
                                        <span class="alert text-danger alerta">Ingrese el precio de la casa</span>
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
@stop
