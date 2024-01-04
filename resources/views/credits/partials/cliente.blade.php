

<div class="row">
    <div class="col-md-5">
        <b>Nombre:</b> {{ $cliente->nombre }}
    </div>
    <div class="col-md-3">
        <b>DUI:</b> {{ $cliente->dui }}
    </div>
    <div class="col-md-2">
        <b>Edad:</b> {{ $cliente->edad }} años
    </div>
 
    <div class="col-md-5">
        <b>Correo:</b> {{ $cliente->correo }}
    </div>
    <div class="col-md-3">
        <b>Teléfono:</b> {{ $cliente->telefono }}
    </div>
    <div class="col-md-4">
        <b>Ocupación:</b> {{ $cliente->oficio }}
    </div>
    <div class="col-md-5">
        <b>Domicilio:</b> {{ $cliente->direccion }}
    </div>
    <div class="col-md-3">
        <b>Departamento:</b> {{ $depto->departamento }}
    </div>
    <div class="col-md-4">
        <b>Municipio:</b> {{ $muni->municipio }}
    </div>
</div>

