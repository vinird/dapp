@extends('layouts.app')

@section('content')
<div class="col-lg-12">

<form method="POST" action="{{ url('newEvent') }}" >
       {{ csrf_field() }}
  <div class="form-group">
    <label for="nameEvent">Nombre de evento</label>
    <input  type="text" class="form-control" name="nameEvent" placeholder="Nombre de evento" value="{{ old('nameEvent') }}">
  </div>

   <div class="form-group">
    <label for="name">Fecha</label>
    <input data-toggle="datepicker">
      <textarea data-toggle="datepicker"></textarea>
     <div data-toggle="datepicker"></div>
  </div>

<div class="form-group">
    <label for="name">Fecha</label>
    <input type="text" class="form-control" name="nameEvent" placeholder="Nombre de evento" value="{{ old('nameEvent') }}">
  </div>

  <div class="form-group">
  <label>Tipo de votacion</label>
    <select class="form-control target" name="tipo_votacion">
      <option value="1" selected="selected">Publica</option>
      <option value="2">Privada</option>
    </select>
  </div>

  <div class="form-group">
    <label>Opciones de voto</label>
    <select class="form-control target" name="opcion_voto">
      <option value="1" selected="selected">Papeleta</option>
      <option value="2">Referendum</option>
      <option value="3">Opciones multiples</option>
    </select>
  </div> 

  @include('partials.admin.events.partials.eventPartial')

  <div class="form-group">
  <label>Avances</label>
    <select class="form-control target">
      <option value="si" selected="selected">Si</option>
      <option value="no">No</option>
    </select>
  </div>

  
  <button type="submit" class="btn btn-default btn-success">Crear Evento</button>
</form>
</div>

<script type="text/javascript">
  
  $( ".target" ).change(function() {
      var str = "";
     $(this).each(function() {
      str += $(this.name+"option:selected").text() + " ";
        alert( "Handler for .change() called."+str );

    });


});
</script>
@endsection