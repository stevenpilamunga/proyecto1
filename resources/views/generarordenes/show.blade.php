@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<div class="container">
    <h3 class="text-center text-dark bg-success">Generar órdenes</h3>
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('generar_ordenes') }}" class="btn btn-success me-1">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Cédula</th>
                <th>Estudiante</th>
                <th>Jornada/Curso/Paralelo</th>
                <th>Valor a Pagar</th>
                <th>Fecha Pago</th>
                <th>Valor Pagado</th>
                <th>Documento</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordenes as $index => $orden)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $orden->est_cedula }}</td>
                    <td>{{ $orden->est_apellidos }} {{ $orden->est_nombres }}</td>
                    <td>{{ $orden->jor_descripcion }} {{ $orden->esp_descripcion }} {{ $orden->cur_descripcion }} {{ $orden->mat_paralelot }}</td>
                    <td>{{ $orden->valor }}</td>
                    <td>{{ $orden->fecha }}</td>
                    <td>{{ $orden->vpagado }}</td>
                    <td>{{ $orden->numero_documento }}</td>
                    <td>{{ $orden->estado == 0 ? 'Pendiente' : 'Pagado' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
