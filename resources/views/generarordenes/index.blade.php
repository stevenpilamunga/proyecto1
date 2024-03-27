@extends('layouts.app')
@section('content')
   <div class="container">
    <h3 class="text-center text-dark bg bg-success">Generar ordenes</h3>
    <form action="{{ route('generarOrdenes') }}" method="POST">
    @csrf
        <select name="anl_id" id="anl_id"  class="from-control text-center">
            @foreach ($periodos as $p)
         <option value="{{ $p->id }}">{{$p->anl_descripcion}}</option>
            @endforeach
            </select>

           
            <select name="jor_id" id="jor_id"  class="from-control text-center">
               
            @foreach ($jornadas as $j)
         <option value="{{ $j->id }}">{{$j->jor_descripcion}}</option>
            @endforeach
            </select>
            <select name="mes" id=""  class="from-control text-center">
            @foreach ($meses as $key=>$m)
    <option value="{{ $key }}">{{ $m }}</option>
@endforeach
            </select>
            <div>
            
    <button type="submit" class="btn btn-success btn-sm mt-3">Generar</button>
</form>



<table class="table">
<tr>
    <th>Ordenes Generadas</th>
</tr>

<tr>
    <th>secuencial</th>
    <th>fecha</th>
    <th>año lectivo</th>
    <th>jornada</th>
    <th>mes</th>
    <th>acciones</th>
</tr>
@foreach($ordenes as $o)
    <tr>
        <td>{{$o->especial}}</td>
        <td>{{$o->fecha}}</td>
        <td>{{$o->anl_descripcion}}</td>
        <td>{{$o->jor_descripcion}}</td>
        <td>{{$o->mes}}</td>

        <td>
    <button class="btn btn-primary btn-sm mt-2">
        <i class="fas fa-eye"></i> <!-- Icono para "Ver" -->
    </button>
    <button class="btn btn-success btn-sm mt-2">
        <i class="fas fa-edit"></i> <!-- Icono para "Editar" -->
    </button>
    <button class="btn btn-danger btn-sm mt-2">
        <i class="fas fa-trash-alt"></i> <!-- Icono para "Eliminar" -->
    </button>
</td>

    </tr>
    
@endforeach
</table>

@endsection('content')