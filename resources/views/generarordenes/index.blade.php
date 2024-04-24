@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<div class="container">
    <h3 class="text-center text-dark bg bg-success">Generar ordenes</h3>
    <form action="{{ route('generarOrdenes') }}" method="POST">
        @csrf
        <select name="anl_id" id="anl_id" class="from-control text-center">
            @foreach ($periodos as $p)
                <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
            @endforeach
        </select>

        <select name="jor_id" id="jor_id" class="from-control text-center">
            @foreach ($jornadas as $j)
                <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
            @endforeach
        </select>
        <select name="mes" id="" class="from-control text-center">
            @foreach ($meses as $key => $m)
                <option value="{{ $key }}">{{ $m }}</option>
            @endforeach
        </select>
        <div>

            <!-- Contenido del formulario -->
            <button type="submit" class="btn btn-success">Generar</button>
    </form>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Secuencial</th>
            <th>Fecha</th>
            <th>Año lectivo</th>
            <th>Jornada</th>
            <th>Mes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ordenes as $o)
            <tr>
                <td>{{ $o->especial }}</td>
                <td>{{ $o->fecha }}</td>
                <td>{{ $o->anl_descripcion }}</td>
                <td>{{ $o->jor_descripcion }}</td>
                <td>{{ $o->mes }}</td>

                <td class="d-flex">
                    <a href="{{ route('ordenes_generadas.show', $o->especial) }}" class="btn btn-success me-1">
                        <span class="material-symbols-outlined">visibility</span>
                    </a>
                    <form action="{{ route('eliminaorden') }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE') <!-- Agregué este campo para el método DELETE -->
                        <input type="hidden" name="especial" value="{{ $o->especial }}">
                        <button type="submit" class="btn btn-danger btn-xs btn-delete" secuencial="{{ $o->especial }}">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                    <a href="{{ route('exportarOrdenes', $o->especial) }}" class="btn btn-success me-1"> <!-- Agregué "#" en el href -->
                    <span class="material-symbols-outlined">
                    upload_file
                    </span>
                </a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
