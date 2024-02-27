<div>
    <div class="row ">
        <div class="form-group col-lg-3 ml-1">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control col-8" placeholder="Seleccione el tipo de evento">
                <option value="">-- Tipo de Evento --</option>
                <option value="PARTIDO" {{ old('type') == 'PARTIDO' ? 'selected' : '' }}>PARTIDO</option>
                <option value="SNP" {{ old('type') == 'SNP' ? 'selected' : '' }}>SNP</option>
                <option value="FAP" {{ old('type') == 'FAP' ? 'selected' : '' }}>FAP</option>
                <option value="ENTRENAMIENTO" {{ old('type') == 'ENTRENAMIENTO' ? 'selected' : '' }}>ENTRENAMIENTO
                </option>
                <option value="OTRO" {{ old('type') == 'OTRO' ? 'selected' : '' }}>OTRO</option>
            </select>

            @error('type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-3">
            <label for="state">Estado</label>
            <select name="state" id="state" class="form-control col-8"
                placeholder="Seleccione el estado del evento">
                <option value="">-- Indica el Estado --</option>
                <option value="RESERVADO" {{ old('state') == 'RESERVADO' ? 'selected' : '' }}>RESERVADO</option>
                <option value="ALQUILADO" {{ old('state') == 'ALQUILADO' ? 'selected' : '' }}>ALQUILADO</option>
                <option value="FIN" {{ old('state') == 'FIN' ? 'selected' : '' }}>FIN</option>
            </select>

            @error('state')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-2">
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" class="form-control col-6" value="{{ old('price') }}"
                placeholder="€" step="0.01">

            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-lg-3 ">
            <label for="court_id">Pista</label>
            <select name="court_id" id="court_id" class="form-control col-12">
                <option value="">-- Selecciona la Pista --</option>
                @foreach ($courts as $courtId => $court)
                    <option value="{{ $courtId }}"
                        {{ old('court_id') == $courtId  ? 'selected' : '' }}>
                        {{ $court }}</option>
                @endforeach
            </select>
            @error('court_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group col-12">
        <label for="user_id">Usuario</label>
        <select name="user_id" id="user_id" class="form-control col-lg-3">
            <option value="">Selecciona un usuario</option>
            @foreach ($users as $userId => $userName)
                <option value="{{ $userId }}" {{ (old('user_id') == $userId) ? 'selected' : '' }}>
                    {{ $userName }}</option>
            @endforeach
        </select>
        @error('user_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
