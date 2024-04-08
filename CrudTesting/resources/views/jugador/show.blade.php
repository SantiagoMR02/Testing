@extends('layouts.app')

@section('template_title')
    {{ $jugador->name ?? __('Show') . " " . __('Jugador') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Jugador</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('jugadors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $jugador->Nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Apellido:</strong>
                            {{ $jugador->Apellido }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Posicion:</strong>
                            {{ $jugador->Posicion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dorsal:</strong>
                            {{ $jugador->Dorsal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
