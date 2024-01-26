<label for="monto">Monto a pagar($)</label>
<input type="text" class="form-control campo-requerido" value="{{ $cuota->cuota_mensual }}" id="monto" name="monto"
    required>
@error('monto')
    <span class="alert text-danger alerta">El Campo de monto es requerido</span>
@enderror
