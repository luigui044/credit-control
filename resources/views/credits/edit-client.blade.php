@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('clientes') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="col-md-11">
            <h1><b> Agregar de cliente</b></h1>
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
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        {{-- <span class="badge badge-primary">Label</span> --}}
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

                    <form id="form1" action="{{ route('updateClient', ['id' => $cliente->id_cliente]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control campo-requerido" id="name" name="name"
                                        placeholder="Ingrese Nombre Completo" value="{{ $cliente->nombre }}" required>
                                    @error('name')
                                        <span class="alert text-danger alerta">El Campo de Nombre es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dui">DUI</label>
                                    <input type="text" class="form-control campo-requerido" id="dui" name="dui"
                                        placeholder="Ingrese DUI" value="{{ $cliente->dui }}" required>
                                    @error('dui')
                                        <span class="alert text-danger alerta">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="age">Edad</label>
                                    <input type="number" max="99" min="18" class="form-control campo-requerido"
                                        id="age" name="age" placeholder="Edad" value="{{ $cliente->edad }}"
                                        required>
                                </div>
                                @error('age')
                                    <span class="alert text-danger alerta">El Campo de Edad es requerido</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control campo-requerido" id="email" name="email"
                                        placeholder="Ingrese Correo" value="{{ $cliente->correo }}" required>
                                    @error('email')
                                        <span class="alert text-danger alerta">El Campo de correo es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="text" class="form-control campo-requerido" id="phone" name="phone"
                                        placeholder="Teléfono" value="{{ $cliente->telefono }}" required>
                                    @error('phone')
                                        <span class="alert text-danger alerta">El Campo Teléfono es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ocupacion">Ocupación</label>
                                    <input type="text" class="form-control campo-requerido" id="ocupacion"
                                        name="ocupacion" placeholder="Ocupación" value="{{ $cliente->oficio }}" required>
                                    @error('ocupacion')
                                        <span class="alert text-danger alerta">El Campo de Ocupación es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="depto">Departamento</label>

                                    <select class="form-control campo-requerido" id="depto" name="depto" required>
                                        <option>Seleccione un departamento</option>
                                        @foreach ($deptos as $item)
                                            @if ($item->id == $cliente->depto)
                                                <option value="{{ $item->id }}" selected>{{ $item->departamento }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->departamento }}</option>
                                            @endif
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

                                    <select class="form-control campo-requerido" id="muni" name="muni" required>
                                        <option>Seleccione un municipio</option>

                                        @foreach ($munis as $item)
                                            @if ($item->id == $cliente->muni)
                                                <option value="{{ $item->id }}" selected>{{ $item->municipio }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->municipio }}</option>
                                            @endif
                                        @endforeach
                                    </select>


                                    @error('muni')
                                        <span class="alert text-danger alerta">El campo municipio es requerido</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Domicilio</label>
                                    <textarea class="form-control campo-requerido" id="address" name="address" rows="2" required>{{ $cliente->direccion }}</textarea>
                                    @error('address')
                                        <span class="alert text-danger alerta">El campo Domicilio es requerido</span>
                                    @enderror
                                </div>
                            </div>


                        </div>




                        <button type="button" id="btnSave" class="btn btn-primary btn-block">Registrar</button>
                    </form>
                </div>
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
    <script src="{{ asset('assets/js/credits/updateclient.js') }}"></script>
@stop
