@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-4">
    <h3 class="text-center text-success">Generar órdenes</h3>
    <form action="{{ route('generarOrdenes') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <select name="anl_id" id="anl_id" class="form-control">
                    @foreach ($periodos as $p)
                        <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="jor_id" id="jor_id" class="form-control">
                    @foreach ($jornadas as $j)
                        <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="mes" id="mes" class="form-control">
                    @foreach ($meses as $key => $m)
                        <option value="{{ $key }}">{{ $m }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-success">Generar</button>
        </div>
    </form>

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
                           
                            <input type="hidden" name="especial" value="{{ $o->especial }}">
                            <button type="submit" class="btn btn-danger btn-xs btn-delete" secuencial="{{ $o->especial }}">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                        <a href="{{ route('exportarOrdenes', $o->especial) }}" class="btn btn-warning me-1">
                            <span class="material-symbols-outlined">upload_file</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
