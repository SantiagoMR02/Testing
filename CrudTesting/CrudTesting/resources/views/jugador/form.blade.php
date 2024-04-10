<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old('Nombre', $jugador?->Nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
            <input type="text" name="Apellido" class="form-control @error('Apellido') is-invalid @enderror" value="{{ old('Apellido', $jugador?->Apellido) }}" id="apellido" placeholder="Apellido">
            {!! $errors->first('Apellido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="posicion" class="form-label">{{ __('Posicion') }}</label>
            <input type="text" name="Posicion" class="form-control @error('Posicion') is-invalid @enderror" value="{{ old('Posicion', $jugador?->Posicion) }}" id="posicion" placeholder="Posicion">
            {!! $errors->first('Posicion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="dorsal" class="form-label">{{ __('Dorsal') }}</label>
            <input type="text" name="Dorsal" class="form-control @error('Dorsal') is-invalid @enderror" value="{{ old('Dorsal', $jugador?->Dorsal) }}" id="dorsal" placeholder="Dorsal">
            {!! $errors->first('Dorsal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>