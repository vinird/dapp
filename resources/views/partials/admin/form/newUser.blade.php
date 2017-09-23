@extends('layouts.app')

@section('content')
<div class="col-lg-12">

<form method="POST" action="{{ url('newUser') }}" >
       {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" name="name" placeholder="Nombre">
  </div>

  <div class="form-group">
    <label for="email">Correo electrónico</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" name="password" placeholder="Contraseña">
  </div>
  
  
  <button type="submit" class="btn btn-default btn-success">Crear usuario</button>
</form>
</div>
@endsection