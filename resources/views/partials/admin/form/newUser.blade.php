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
<<<<<<< HEAD
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ old('password') }}">
=======
    <label for="email">Correo electrónico</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" name="password" placeholder="Contraseña">
>>>>>>> 918607bb897bcff24630bc4ae563141820d93d0a
  </div>
  
  
  <button type="submit" class="btn btn-default btn-success">Crear usuario</button>
</form>
</div>
@endsection