@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<div class="container">
    <h2 class="text-center mb-4">Lista de Usuarios</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3"><i class="material-icons mr-1">add</i>Nuevo Usuario</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->rol_descripcion}}</td>
                    <td>{{$user->usu_nombres}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->usu_telefono}}</td>
                    <td>
                        <a href="{{ route('users.edit',$user->usu_id) }}" class="btn btn-success me-1 " title="Editar"><i class="material-icons">edit</i></a>
                        <form action="{{ route('users.destroy',$user->usu_id)}}" method="POST" style="display:inline;" onsubmit="return confirm('¿Desea eliminar el Usuario?')">
                            @csrf
                            
                            <button type="submit" class="btn btn-danger btn-xs btn-delete" title="Eliminar"><i class="material-symbols-outlined">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
