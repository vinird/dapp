@extends('layouts.authentication')

@section('content')
<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="hidden-sm-up">
          <h3>Crear nueva contraseña</h3>
      </div>
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6 hidden-xs-down">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Crear nueva contraseña</h1>
              </div>
              <p>Ingrese una nueva contraseña para poder acceder al sistema.</p>
            </div>
          </div>
        </div>
        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          <div class="form d-flex align-items-center">
            <div class="content">
              <form id="login-form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="login-username" type="email" name="email" required value="{{ $email or old('email') }}" autofocus class="input-material">
                  <label for="login-username" class="label-material">Correo electrónico</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" name="password" required class="input-material">
                  <label for="password" class="label-material">Contraseña</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <input type="password" name="password_confirmation" required class="input-material">
                  <label for="password_confirmation" class="label-material">Confirmar contraseña</label>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <button id="login" type="submit" href="index.html" class="btn btn-success">Reiniciar contraseña</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyrights text-center">
    <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
  </div>
</div>

@endsection
