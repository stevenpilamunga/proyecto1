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
            
               
   
    <!-- Contenido del formulario -->
    <button type="submit" class="btn btn-success">Generar</button>
</form>


   </div>

  
@endsection