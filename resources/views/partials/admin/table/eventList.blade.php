@extends('layouts.app')

@section('content')

<div style="padding: 30px;">
<table class="table table-striped table-hover ">
  <thead>
    <th>Nombre</th>
    <th>Fecha inicio</th>
    <th>Fecha final</th>
    <th>Tipo de votación</th>
    <th>Avances</th>
    <th></th>
  </thead>
  <tbody>
    @if(isset($events))

      @foreach($events as $e)
        <tr>
          <th>{{ $e->nombreEvento }}</th>
          <th>{{ $e->fechaInicio }}</th>
          <th>{{ $e->fechaFinal }}</th>
          <th>{{ $e->tipoVoto }}</th>
          <th>{{ $e->avance }}</th>
          <th>  
            @if($e->correosAsignados == 1)
              <span>Ya se asignaron los correos</span>
              <a href="{{ url('notificarCorreos/'.$e->id) }}" class="btn btn-success" style="color: #fff;">Notificar a los participantes</a>
            @else
              <a href="{{ url('addMailsToEvents/'.$e->id) }}" class="btn btn-primary" style="color: #fff;">Asignar correos</a>
            @endif
          </th>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
</div>
@endsection