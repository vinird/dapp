@extends('layouts.app')

@section('content')
<div class="col-lg-12">
  <form method="POST" action="{{ url('newEvent') }}" >
    {{ csrf_field() }}
    <div class="form-group">
      <label for="nombreEvento">Nombre de evento</label>
      <input type="text" class="form-control" name="nombreEvento" value="{{ old('nombreEvento') }}">
    </div>
   
   <div class="row">
     <div class="col-md-6">
       <label class="form-control-label">Fecha inicio</label>
       <div class="input-group date">
        <input id="dpFechaInicio" class="form-control" name="dpFechaInicio" value="{{ old('dpFechaInicio') }}" />
        <button type="button" class="btn btn-primary disabled"><i class="fa fa-calendar"></i></button>
      </div>
     </div>
     <div class="col-md-6">
      <label class="form-control-label">Fecha final</label>
      <div class="input-group date">
        <input id="dpFechaFinal" class="form-control" name="dpFechaFinal" value="{{ old('dpFechaFinal') }}" />
        <button type="button" class="btn btn-primary disabled"><i class="fa fa-calendar"></i></button>
      </div>
     </div>
   </div>
   <br/>

    <div class="form-group">
    <label class="form-control-label">Tipo de votacion</label>
      <select class="form-control target" name="tipo_votacion">
        <option value="1" selected="selected">Publica</option>
        <option value="2">Privada</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-control-label">Opciones de voto</label>
      <select id="sOpcionVoto" class="form-control target" name="opcion_voto" >
        <option value="1" selected="selected">Papeleta</option>
        <option value="2">Referéndum</option>
        <option value="3">Opciones múltiples</option>
      </select>
    </div> 

    @include('partials.admin.events.partials.eventPartial')

    <div class="form-group">
    <label class="form-control-label">Avances</label>
      <select class="form-control target" name="avance">
        <option value="si" selected="selected">Si</option>
        <option value="no">No</option>
      </select>
    </div>
    <br/>
    
    <button type="submit" class="btn btn-default btn-success">Crear Evento</button>
  </form>
</div>

<script src="{{ asset('js/libs/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('js/eventosVotacion.js') }}"></script>

@endsection