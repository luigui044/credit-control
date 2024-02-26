<label for="cobro">Cobros</label>
<select class="form-control campo-requerido" id="cobro" name="cobro" onchange="getMontoCobro()" required>
    <option>Seleccione el cobro a pagar</option>
    @foreach ($cobros as $item)
        <option value="{{ $item->id }}">{{ $item->desc_pago }}</option>
    @endforeach
</select>
@error('cobro')
    <span class="alert text-danger alerta">{{ $message }}</span>
@enderror
