@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<h3 class="text-center">Esta es la vista de Cursos</h3>
<a href="{{ route('cursos.create') }}" class="btn btn-success">Nuevo Curso</a>
    
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Descripción</th>
            <th>Observación</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
        <tr>
            <td>{{ $curso->cur_id }}</td>
            <td>{{ $curso->descripcion }}</td>
            <td>{{ $curso->observacion }}</td>
            <td>{{ $curso->tipo }}</td>
            <td>
                <a href="{{ route('cursos.edit', $curso->cur_id) }}" class="btn btn-primary btn-sm">
                    <span class="material-symbols-outlined">edit</span>
                </a>
                <form action="{{ route('cursos.destroy', $curso->cur_id) }}" method="POST" onsubmit="return confirm('Desea eliminar el curso?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
