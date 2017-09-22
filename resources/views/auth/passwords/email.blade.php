@extends('layouts.authentication')

@section('content')
<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="hidden-sm-up">
          <h3>Recuperar contraseña</h3>
      </div>
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6 hidden-xs-down">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Recuperar contraseña</h1>
              </div>
              <p>Ingrese su correo electrónico y le enviaremos un enlace de recuperación de contraseña.</p>
            </div>
          </div>
        </div>
        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          <div class="form d-flex align-items-center">
            <div class="content">
              <form id="login-form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="login-username" type="email" name="email" required="" value="{{ old('email') }}" class="input-material">
                  <label for="login-username" class="label-material">Correo electrónico</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button id="login" type="submit" href="index.html" class="btn btn-warning">Enviar enlace al correo</button>
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
