@extends('layouts.app')

@section('content')
<div class="col-lg-12">

<form method="POST" action="{{ url('userEdit') }}" >
       {{ csrf_field() }}
  <input type="hidden" name="id" value="{{ $user->id }}">

  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
  </div>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled=""> 
  </div>
  
  
  <button type="submit" class="btn btn-default btn-success">Actualizar informacion</button>
</form>
</div>
@endsection