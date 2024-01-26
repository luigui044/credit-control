<label for="credito">Crédito</label>
<select class="form-control campo-requerido" id="credito" name="credito" onchange="getCuota()" required>
    <option>Seleccione el Crédito</option>
    @foreach ($creditos as $item)
        <option value="{{ $item->id_credito }}">{{ $item->no_credito }}</option>
    @endforeach
</select>
@error('credito')
    <span class="alert text-danger alerta">{{ $message }}</span>
@enderror
