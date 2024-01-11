<label for="muni">Municipio</label>
                                
<select class="form-control campo-requerido" id="muni" name="muni" required>
    <option>Seleccione un municipio</option>
    @foreach ($munis as $item)
    <option value="{{ $item->id }}">{{ $item->municipio }}</option>

    @endforeach
  
</select>