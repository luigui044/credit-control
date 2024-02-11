@extends('adminlte::page')

@section('title', 'Escala Corporation')

@section('content_header')
    <h1><b>Detalle de casa</b></h1>
    <hr>
@stop
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-sm table-striped table-bordered text-center">
                <thead class="bg-dark">
                    <tr>
                        <th>
                            Block
                        </th>
                        <th>
                            Número
                        </th>
                        <th>
                            Pasaje
                        </th>
                        <th>
                            Precio
                        </th>
                        <th>
                            Monto Invertido
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $casa->block }}
                        </td>
                        <td>
                            {{ $casa->numero }}
                        </td>
                        <td>
                            {{ $casa->pasaje }}
                        </td>
                        <td>
                            ${{ number_format($casa->precio, 2, '.', ',') }}
                        </td>
                        <td>
                            ${{ number_format($casa->monto_invertido, 2, '.', ',') }}
                        </td>
                        </td>
                    </tr>

                </tbody>
                <thead class="bg-dark">
                    <tr>
                        <th>Dirección</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $casa->direccion }}
                        </td>
                        <td>
                            {{ $casa->id_depto }}
                        </td>
                        <td>
                            {{ $casa->id_muni }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-6">

            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">ANTES</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($imagenesCasa as $item)
                            @if ($item->tipo == false)
                                <div class="col-md-3 mx-1"> <img onclick="ampliar('{{ $item->img_url }}')"
                                        id="{{ $item->img_url }}" class="magnify"
                                        src="{{ asset('images/' . $item->img_url) }}"
                                        alt="imagen_antes_{{ $item->img_url }}" width="200px">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->





        </div>
        <div class="col-md-6">

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">DESPUÉS</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($imagenesCasa as $item)
                            @if ($item->tipo == true)
                                <div class="col-md-3 mx-1"> <img id="{{ $item->img_url }}"
                                        src="{{ asset('images/' . $item->img_url) }}" class="magnify"
                                        onclick="ampliar('{{ $item->img_url }}')" alt="imagen_antes_{{ $item->img_url }}"
                                        width="200px"> </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->




        </div>

    </div>


    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <img src="" class="modal-content" id="imagen-ampliada">
    </div>

    <script src="script.js"></script>
@stop
@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .close {
            color: #fff;
            position: absolute;
            top: 15px;
            right: 35px;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .imagen-clickable {
            cursor: pointer;
        }
    </style>

@stop

@section('js')
    <script src="{{ asset('assets/js/jquery.magnifier.js') }}"></script>
@stop
