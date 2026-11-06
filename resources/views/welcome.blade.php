@extends('layouts.app')

@section('title', 'Inicio - ' . $grupo)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-sadu p-4">
            <div class="card-body">
                <h2 class="brand-font text-sadu text-center mb-2">Desarrollo Web Usando Software Libre</h2>
                <h4 class="text-center text-muted mb-4">{{ $grupo }}</h4>

                <div class="list-group list-group-flush">
                    @foreach($integrantes as $int)
                        <div class="list-group-item bg-transparent d-flex justify-content-between align-items-center py-3">
                            <div>
                                <h6 class="mb-0 fw-bold fs-5">{{ $int['nombre'] }} {{ $int['apellido'] }}</h6>
                            </div>
                            <span class="badge bg-secondary rounded-pill px-3 py-2 fs-6">Carnet: {{ $int['carnet'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection