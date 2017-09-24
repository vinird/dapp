@extends('layouts.app')

@section('content')
<div class="col-lg-12">

<form method="POST" action="{{ url('newUser') }}" >
       {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
  </div>


  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ old('password') }}">
    <label for="email">Correo electrónico</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>


  
  <button type="submit" class="btn btn-default btn-success">Crear usuario</button>
</form>
</div>
@endsection